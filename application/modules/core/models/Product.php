<?php

class Core_Model_Product extends Zend_Db_Table_Abstract {
    
    protected $_name = "produits";
    
    public function indexProducts(){
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }

}
