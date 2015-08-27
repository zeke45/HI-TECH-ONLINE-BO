<?php

class Core_Model_Category extends Zend_Db_Table_Abstract
{
    protected $_name = "categories";
    
    public function indexCategories()
    {
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
    public function ajoutCategorie($nomCategorie, $description)
    {
        try {                       
            $data = array(
                'nomCategorie' => $nomCategorie,
                'description' => $description
            );
            return $this->insert($data);    
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }        
    }
    
    //put your code here
}
