<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('assets'))
{
	function assets($nom)
	{
		return base_url() . 'assets/' . $nom;
	}
}

if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/js/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/images/' . $nom;
	}
}

if ( ! function_exists('img'))
{
	function img($nom, $alt = '',$width = '', $height = '', $class= '', $id= '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" width="'. $width .'" height="' . $height . '" ' . 'class="'. $class . '" id="'. $id . '" />';
	}
}

if ( ! function_exists('tabtrain'))
{
    function tabtrain($trains){
        $tableTrains = '<table class="table table-hover" style="width:100%"> 
                            <thead>
                                <tr class="table-active">
                                    <th scope="col">Heure de départ</th>
                                    <th scope="col">Heure d\'arrivée</th>
                                    <th scope="col">Durée</th>
                                    <th scope="col">N°</th>                                
                                    <th scope="col">Type</th>
                                    <th scope="col">Direction</th>
                                    <th scope="col">Info retard</th>
                                </tr>
                            </thead>
                            <tbody>';
        
        foreach ($trains as $train) {
            if($train['statusretard'] == ''){
                $info = '';
                $colClass = '';
            }else{
                $info = 'Heure Départ : ' . $train['newHeureDepart'] . '<BR>' . 'Retard : ' . $train['retard'];
                $colClass = 'class="table-warning"';
            }
            $tableTrains .= '<tr ' . $colClass . '>
                                <td>' . $train['heureDepart'] . '</td>
                                <td>' . $train['heureArrive'] . '</td>
                                <td>' . $train['duree'] . '</td>
                                <td>' . $train['numtrain'] . '</td>
                                <td>' . $train['typetrain'] . '</td>
                                <td>' . $train['directrain'] . '</td>
                                <td>' . $info . '</td>
                                                
                            </tr>';
        }
        $tableTrains .= '</tbody></table> ';
        return $tableTrains ;
    }
}
