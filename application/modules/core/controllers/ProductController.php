<?php

class ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
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

    public function showAction()
    {
        
    }

    public function createAction()
    {
        
    }

}