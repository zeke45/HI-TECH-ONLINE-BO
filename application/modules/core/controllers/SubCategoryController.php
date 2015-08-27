<?php

class SubCategoryController extends Zend_Controller_Action{
    
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        /*$table = new Core_Model_Category();

        /*Declaration des champs qui seront affichés lors du listing*/
        /*$keysDisplayed = array('id', 'nomCategorie', 'Categorie Parente', 'description');
        
        if(count($table->indexCategories()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexCategories() as $product){
                echo "<tr>";
                foreach($keysDisplayed as $key){      
                    echo "<td";
                    if ($key == "description"){
                        echo " class=\"col-md-7\"";
                    }
                    echo "> $product[$key] </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Encore aucune sous-categorie d'enregistré";
        }*/
    }
}
