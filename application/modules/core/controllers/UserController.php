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
        
        /*Declaration des champs qui seront affichés lors du listing*/
        $keysDisplayed = array('id', 'pseudonyme', 'email', 'prenom', 'nom','ville','pays');
        
        /* Initialisation du tableau de listing,
         * Verifie si au moins un utilisateur a été enregistré, sinon retourne message indicatif
         */
        if(count($table->indexUsers()) > 0){
            echo "<table class=\"table table-bordered\"> <tr>";
            foreach($keysDisplayed as $key)
            {
                echo "<th>".$key."</th>";
            }
            echo "</tr>";
            foreach($table->indexUsers() as $user){
                echo "<tr>";
                foreach($keysDisplayed as $key){      
                    echo "<td> $user[$key] </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Encore aucun Utilisateur d'enregistré";
        }
        
        /*Appeler lors de l'inscription par le backoffice*/
                           
        if ($this->_getParam('type') == 'signup') {
            $user = new Core_Model_User();

            $login = $_POST['pseudonyme'];
            $password = $_POST['password'];
            $firstname = $_POST['prenom'];
            $lastname = $_POST['nom'];
            $mail = $_POST['email'];
            $phone = $_POST['telephone'];
            $address = $_POST['adresse'];
            $ville = $_POST['ville'];
            $codePostal = $_POST['codePostal'];
            $pays = $_POST['pays'];
            

            //Verifie si les checkbox sont cochés pour droits admin ou abonnement newsletter
            if(defined($_POST['admin'])){
                $admin = true;
            }
            else{
                $admin = false;
            }     
            
            if(defined($_POST['newsletter'])){
                $newsletter = true;
            }
            else{
                $newsletter = false;
            }

            $verif = $user->loginExist($login);
            if($verif > 0)
            {
                $this->_redirect($this->view->url(array('controller' => 'user', 'action' => 'index','login'=>false), null, true));
            }
            else
            {
                $stat = $user->inscription($login, $mdp, $firstname, $lastname, $mail, $phone, $address, $ville, $codePostal, $pays, $newsletter, $admin);
                $this->_redirect($this->view->url(array('controller' => 'user', 'action' => 'index'), null, true));


                if ($stat != -1) {
                    echo "Inscription complête";
                } else {
                    echo "Un problème a surgit lors de l'inscription";
                }
            
            }
        }   
    }

    public function showAction()
    {
        
    }

    
    public function createAction()
    {
        
    }

    public function indexUsers()
    {
        $table = new Core_Model_User();
        
        foreach($table->indexUsers() as $user){
            echo key($user);
        }
    }
}