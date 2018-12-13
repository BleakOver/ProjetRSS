<?php

class UserControl {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales

		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action) {

				//pas d'action, on affiche les news
				case NULL:

                    $this->Articles();
					break;

                case 'connection':
                	$this->Connection();
                	break;

				case "validationFormulaire":
					$this->ValidationFormulaire($dVueEreur);
					break;

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['vuephp1']);
					break;
			}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue PDO!!! ";
			$dVueEreur[] =	$e->getMessage();
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
			{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
			}


		//fin
		exit(0);
	}//fin constructeur


	function Connection(){
        global $rep, $vues;
        require ($rep.$vues['connection']);
	}

	function Articles(){
	    global $rep, $vues, $base, $login, $mdp;
        $page=$_REQUEST['page'];
        if(!isset($page) || $page<=0){
            $page=1;
        }
        $tabNews=Model::getNewsAtPage($page);
		require ($rep.$vues['userView']);
	}

}//fin class

?>
