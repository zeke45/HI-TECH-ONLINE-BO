<?php

class SubCategoryController extends Zend_Controller_Action{
    
    
    public function init()
    {
        /* Initialize action controller here */
    }
    
    public function indexAction()
    {
        $table = new Core_Model_SubCategory();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'nomCategorie', 'description', 'categorie_id');
        
        if(count($table->indexSubCategories()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexSubCategories() as $product){
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
        }
        
        if ($this->_getParam('type') == 'create') {
            $user = new Core_Model_SubCategory();

            $nomCategorie = $_POST['nomCategorie'];
            $description = $_POST['description'];
            $categorie_id = $_POST['categorie_id'];
            
            $stat = $user->ajoutSousCategorie($nomCategorie, $description,  $categorie_id);
            $this->_redirect($this->view->url(array('controller' => 'subcategory', 'action' => 'index'), null, true));

            if ($stat != -1) {
                echo "La sous-catégorie a bien été ajouté";
            } else {
                echo "Erreur lors de l'ajout de la sous-categorie";
            }
            
        }
    }
    
    public function createAction()
    {
         
    }
}
