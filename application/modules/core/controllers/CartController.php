<?php

class CartController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $table = new Core_Model_Cart();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'client_id', 'prixTotal', 'date', 'is_payed');
        
        if(count($table->indexCarts()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexCarts() as $product){
                echo "<tr>";
                foreach($keysDisplayed as $key){ 
                    if($key == "is_payed"){
                        if ($product[$key] == 1) {
                            echo "<td> <i class=\"fa fa-fw fa-check\"></i></td>";
                         }
                         else{
                             echo "<td> <i class=\"fa fa-fw fa-remove\"></i></td>";
                         }
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
            echo "Encore aucun panier d'enregistré";
        }
        
       
    }

    public function showAction()
    {
        
    }

}

