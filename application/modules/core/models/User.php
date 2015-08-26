<?php

class Core_Model_User extends Zend_Db_Table_Abstract {
    
    /*protected $_dbname = DB_NAME_HITECH;
    public $data = array();     */
    
    protected $_name = "utilisateurs";
    
    public function show($id){
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
    
    public function inscription($login, $mdp, $firstname, $lastname, $mail, $phone, $address, $codePostal, $pays, $newsletter, $admin) {
        try {                       
            $data = array(
                'pseudonyme' => $login,
                'password' => $password,
                'nom' => $lastname,
                'prenom' => $firstname,
                'mail' => $mail,
                'adresse' => $address,
                'codePostal' => $codePostal,
                'pays' => $pays,
                'newsletter' => $newsletter,
                'telephone' => $phone,
                'admin' => $admin
            );
            return $this->insert($data);    
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }
    
    public function loginExist($login) {
        try {
            
            $select = $this->select()
                    ->setIntegrityCheck(false)
                    ->from(array('u' => DB_TABLE_USER))   
                    ->where('u.pseudonyme = ?', $login);
            $row = $this->fetchAll($select)->toArray();
            $this->data = $row[0];      
            $flag = false;
            return sizeof($this->data);
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
         
        }
        
    }
}