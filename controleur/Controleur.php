<?php

class Controleur {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
		session_start();


		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			$action=$_REQUEST['action'];

			switch($action) {

				//pas d'action, on r�initialise 1er appel
				case NULL:
					$this->Reinit();
					break;

                case "articles":
                	$this->Articles();
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


	function Articles(){
	    global $rep, $vues;

		$news=new NewsGateway(new Connection("mysql:host=localhost;port=3306;dbname=dbenmora", "enmora", "enmora"));
		$tabNews=$news->findAll();
		require ($rep.$vues['userView']);
	}

	function Reinit() {
		global $rep,$vues; // nécessaire pour utiliser variables globales

		$dVue = array (
			'nom' => "",
			'age' => 0,
			);
		require ($rep.$vues['vuephp1']);
	}

	function ValidationFormulaire(array $dVueEreur) {
		global $rep,$vues;


		//si exception, ca remonte !!!
		$nom=$_POST['txtNom']; // txtNom = nom du champ texte dans le formulaire
		$age=$_POST['txtAge'];
		Validation::val_form($nom,$age,$dVueEreur);

		$model = new Simplemodel();
		$data=$model->get_data();

		$dVue = array (
			'nom' => $nom,
			'age' => $age,
				'data' => $data,
			);
			require ($rep.$vues['vuephp1']);
	}

}//fin class

?>
