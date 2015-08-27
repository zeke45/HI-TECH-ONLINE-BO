<?php

class ProductController extends Zend_Controller_Action
{
    

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
<<<<<<< HEAD
        $table = new Core_Model_Product();

        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'nom', 'prixUnitaire', 'stock', 'codeProduitGenerique', 'idProduitCategorie');
        
        if(count($table->indexProducts()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexProducts() as $product){
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
            echo "Encore aucun produit d'enregistré";
        }
        
        if ($this->_getParam('type') == 'create') {
            $user = new Core_Model_Product();

            $nomProduit = $_POST['nom'];
            $prixUnitaire = $_POST['prixUnitaire'];
            $stock = $_POST['stock'];
            $codeProduit = $_POST['codeProduitGenerique'];
            $categorie = $_POST['idProduitCategorie'];
=======
        if ($this->_getParam('type') == 'create') 
        {
            $nom = $_POST['nomProduit'];
            $nom = $_POST['categorie'];
            
            $stat = $user->inscription($nom);
            $this->_redirect($this->view->url(array('controller' => 'product', 'action' => 'index'), null, true));
            if ($stat != -1) {
                echo "Le produit n'a pu s'ajouter";
            } else {
                echo "Un problème a surgit lors de l'inscription";
            }
        }
    }
>>>>>>> origin/master

            
            $stat = $user->ajoutProduit($nomProduit, $prixUnitaire, $stock, $codeProduit, $categorie);
            $this->_redirect($this->view->url(array('controller' => 'product', 'action' => 'index'), null, true));

            if ($stat != -1) {
                echo "Le produit a bien été ajouté";
            } else {
                echo "Erreur lors de l'ajout de produit";
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