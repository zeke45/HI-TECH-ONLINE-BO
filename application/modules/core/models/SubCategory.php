<?php

class Core_Model_SubCategory extends Zend_Db_Table_Abstract{
    
    protected $_name = "souscategories";
    
    public function indexSubCategories()
    {
        
        
         
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
    
    public function ajoutSousCategorie($nomCategorie, $description, $categorie_id)
    {
        try {                       
            $data = array(
                'nomCategorie' => $nomCategorie,
                'description' => $description,
                'categorie_id' => $categorie_id
            );
            return $this->insert($data);    
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }        
    }
}
