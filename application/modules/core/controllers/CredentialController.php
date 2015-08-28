<?php

class CredentialController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $table = new Core_Model_Credential();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('iddroits', 'droit', 'libelle', 'actif');
        
        if(count($table->indexCredentials()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexCredentials() as $product){
                echo "<tr>";
                foreach($keysDisplayed as $key){      
                    echo "<td> $product[$key] </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Encore aucun panier d'enregistré";
        }
        
       
    }

    public function showAction()
    {
        
    }

    public function createAction()
    {
        
    }
}
