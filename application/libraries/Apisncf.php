<?php

class Apisncf {
    
    
    protected $token_auth = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    protected $trainAffiche = 4;

    // NE PAS MODIFIER
    protected $url = 'https://api.sncf.com/v1/coverage/sncf/';
    
	public function __construct() {
		
    }
    
    protected function get_trains($commande, $params){   
        $url = $this->url . $commande . '/?' . http_build_query($params);
        set_time_limit(0);
        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $this->token_auth . ":''" );
        $execResult = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'KO';
        }else{
            curl_close ($ch);
            return json_decode($execResult, true);
        }
    }
    
    public function get_tab_trains($params){
        $resul = $this->get_trains('journeys', $params); 
        $tabTrains = [];
        $nbTrain = 0;
        foreach ($resul['journeys'] as $trains) {
            $tabuntrain = [];
            $tabuntrain['typetrain'] = $trains['sections'][1]['display_informations']['commercial_mode'];
            if(($tabuntrain['typetrain'] == 'TER' or $tabuntrain['typetrain'] == 'Intercités') and $nbTrain < $trainAffiche){
                $tabuntrain['heureDepart'] = substr(substr($trains['departure_date_time'],9,4),0,2) . 'h' . substr(substr($trains['departure_date_time'],9,4),2,2);
                $tabuntrain['heureArrive'] = substr(substr($trains['arrival_date_time'],9,4),0,2) . 'h' . substr(substr($trains['arrival_date_time'],9,4),2,2);
                $tabuntrain['duree'] = $trains['durations']['total'] / 60 . 'mn';
                $tabuntrain['numtrain'] = $trains['sections'][1]['display_informations']['headsign'];

                $tabuntrain['directrain'] = $trains['sections'][1]['display_informations']['direction'];      
                $tabuntrain['statusretard'] = '';
                $tabuntrain['newHeureDepart'] = '';
                $tabuntrain['retard'] = '' ;

                if($trains['status'] != ""){
                    $retard = '';
                    $tabuntrain['statusretard'] = $trains['status'];
                    if($trains['status'] == 'NO_SERVICE'){
                        continue;
                    }
                    $numdisrup = $trains['sections'][1]['display_informations']['links'][0]['id'];
                    $retards = $resul['disruptions'];
                    foreach ($retards as $retard) {
                        if($retard['disruption_id'] == $numdisrup){
                            foreach ($retard['impacted_objects'][0]['impacted_stops'] as $impactStop ) {
                                if(substr($impactStop['base_departure_time'],0,4) == substr($trains['departure_date_time'],9,4)){
                                    $updatetime = $impactStop['amended_departure_time'];
                                    $tabuntrain['newHeureDepart'] = substr($updatetime,0,2) . 'h' . substr($updatetime,2,2);
                                    $retard = (intval(substr($updatetime,0,2)) * 60 + intval(substr($updatetime,2,2))) - (intval(substr(substr($trains['departure_date_time'],9,4),0,2)) * 60 + intval(substr(substr($trains['departure_date_time'],9,4),2,2)));
                                    $tabuntrain['retard'] = $retard . 'mn';  
                                    break;
                                }
                            }
                        }
                    }
                }
                array_push($tabTrains, $tabuntrain);
                $nbTrain++;
            }
        }
        return $tabTrains;           
    }
}

