<?php

class Core_Model_Cart extends Zend_Db_Table_Abstract
{
      protected $_name = "paniers";
      
      public function indexCarts()
    {
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
}
