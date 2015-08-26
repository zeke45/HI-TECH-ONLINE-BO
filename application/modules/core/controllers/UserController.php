<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $table = new Core_Model_User();
        
                
        if ($this->_getParam('type') == 'signup') {
            $user = new Core_Model_User();

            $login = $_POST['pseudonyme'];
            $mdp = $_POST['password'];
            $firstname = $_POST['prenom'];
            $lastname = $_POST['nom'];
            $mail = $_POST['email'];
            $phone = $_POST['telephone'];
            $address = $_POST['adresse'];
            $codePostal = $_POST['codePostal'];
            $pays = $_POST['pays'];
            $admin = $_POST['admin'];
            $newsletter = $_POST['newsletter'];

            /*$verif = $user->loginExist($login);
            if($verif > 0)
            {
                $this->_redirect($this->view->url(array('controller' => 'user', 'action' => 'index','login'=>false), null, true));
            }*/
            $stat = $user->inscription($login, $mdp, $firstname, $lastname, $mail, $phone, $address, $codePostal, $pays, $newsletter, $admin);
            $this->_redirect($this->view->url(array('controller' => 'index', 'action' => 'index'), null, true));
            if ($stat != -1) {
                echo "vous êtes inscrit";
            } else {
                echo "erreur lors de l'enregistrement";
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