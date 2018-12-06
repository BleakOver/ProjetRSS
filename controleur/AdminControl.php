<?php
/**
 * Created by PhpStorm.
 * User: enmora
 * Date: 06/12/18
 * Time: 07:33
 */

class AdminControl
{

    function __construct()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
		// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
		session_start();


		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			$action=$_GET['action'];

			switch($action) {

                case "ajout":
                    $this->ajouterFlux();
                    break;

                case "flux":
                    $this->gestionFlux();
                    break;


				case NULL:
					new UserControl();
					break;

                case "delete":
                    $urlFlux=$_GET['urlFlux'];
					if(!isset($urlFlux)){
						break;
					}
                    $this->deleteFlux($urlFlux);
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
            $dVueEreur[] =	$e2->getMessage();
			require ($rep.$vues['erreur']);
			}


		//fin
		exit(0);
    }

    function ajouterFlux(){
        global $rep, $vues, $base, $login, $mdp;
        $urlAAJouter=$_POST['urlToAdd'];
        if(!isset($urlAAJouter)){
            header('Location: '.$rep.$vues['formAjout']);
        }
        $fluxG=new FluxGateway(new Connection($base, $login, $mdp));
        $fluxG->insert($url);
        $_REQUEST['action']="flux";
        new AdminControl();
    }

    function deleteFlux($urlFlux){
        global $rep, $vues, $base, $login, $mdp;

		$fluxG=new FluxGateway(new Connection($base, $login, $mdp));
		$fluxG->delete($urlFlux);
		//require ($rep."/index.php"); soit header (Location index.php);
        $_REQUEST['action']="flux";
        new AdminControl();
    }

    function gestionFlux(){
        global $rep, $vues, $base, $login, $mdp;

		$fluxG=new FluxGateway(new Connection($base, $login, $mdp));
		$tabFlux=$fluxG->findAll();
		require ($rep.$vues['adminView']);
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

}

?>