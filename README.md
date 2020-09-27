# Horaires_retars_API_SNCF
Code en PHP avec  CodeIgniter Web Framework V3 qui indique les horaires des prochains trains entre deux villes. Ainsi que les retards

Il utilise l'API SNCF pour l'utiliser il vous faudra une clé qu'il faut demander ICI :  https://www.digital.sncf.com/startup/api il y a un formulaire à compléter et la clé arrive par mail.

Cette clé doit être indiqué dans le fichier : \application\libraries/Apisncf.php avec la variable : protected $token_auth = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
Dans le même fichier il est possible d'indiquer le nombre de train affiché dans le tableau avec : protected $trainAffiche = 4; dans ce cas il affichera dans le tableau les 4 trains suivants après l'horaire de la demande.

Dans le fichier application\config/config.php vous devez indiquer l'URL utilisé pour le code.

Dans le fichier application\controllers/Ajax.php il faut indiquer les gares aller et retour en changeant les deux variables $this->Gare1 = "admin:fr:30189";  
        $this->Gare2 = "admin:fr:34172"; Ici j'ai la gare de Nîmes et de Montpellier. Vous pouvez utiliser le fichier trouverGare. py sur ce dépot : https://github.com/Michelgard/Horaires_train_API_SNCF
        

        
        
