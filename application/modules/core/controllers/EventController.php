<?php

class EventController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $table = new Core_Model_Event();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'libelle', 'dateDebut', 'dateFin');
        
        if(count($table->indexEvents()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexEvents() as $product){
                echo "<tr>";
                foreach($keysDisplayed as $key){      
                    if ($key == "dateDebut" || $key == "dateFin"){
                        echo "<td>". $product[$key]."</td>";
                        
                    }
                    else
                    {
                       echo "<td> $product[$key] </td>";
                    }
                }

                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Encore aucun evenement d'enregistré";
        }
        
        if ($this->_getParam('type') == 'create') {
            $user = new Core_Model_Event();

            $libelle = $_POST['libelle'];
            
            $jourDebut = $_POST['jourDebut'];
            $moisDebut = $_POST['moisDebut'];
            $anneeDebut = $_POST['anneeDebut'];
            $heureDebut = $_POST['heureDebut'];
            $minuteDebut = $_POST['minuteDebut'];
            
            $dateDebut = $anneeDebut.'-'.$moisDebut.'-'.$jourDebut.' '. $heureDebut.':'. $minuteDebut. ":00";
            $dateDebut = new DateTime($dateDebut);
            
            $jourFin = $_POST['jourFin'];
            $moisFin = $_POST['moisFin'];
            $anneeFin = $_POST['anneeFin'];            
            $heureFin = $_POST['heureFin'];
            $minuteFin = $_POST['minuteFin'];

            $dateFin = $anneeFin.'-'.$moisFin.'-'.$jourFin.' '. $heureFin.':'. $minuteFin. ":00";
            $dateFin = new DateTime($dateFin);

            $stat = $user->ajoutEvenement($libelle, $dateDebut, $dateFin);
            $this->_redirect($this->view->url(array('controller' => 'event', 'action' => 'index'), null, true));

            if ($stat != -1) {
                echo "L'evenement a bien été ajouté";
            } else {
                echo "Erreur lors de l'ajout de l'evenement";
            }
            
        }
    }

    public function showAction()
    {
        
    }

    public function createAction()
    {
        
    }


}