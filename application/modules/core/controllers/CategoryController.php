<?php

class CategoryController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $table = new Core_Model_Category();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'nomCategorie', 'description');
        
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
            echo "Encore aucun produit d'enregistré";
        }
        
        if ($this->_getParam('type') == 'create') {
            $user = new Core_Model_Category();

            $nomCategorie = $_POST['nomCategorie'];
            $description = $_POST['description'];
            
            
            $stat = $user->ajoutCategorie($nomCategorie, $description);
            $this->_redirect($this->view->url(array('controller' => 'category', 'action' => 'index'), null, true));

            if ($stat != -1) {
                echo "La catégorie a bien été ajouté";
            } else {
                echo "Erreur lors de l'ajout de la categorie";
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
