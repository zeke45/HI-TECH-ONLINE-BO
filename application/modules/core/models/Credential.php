<?php

class Core_Model_Credential extends Zend_Db_Table_Abstract
{
      protected $_name = "roles";
      
      public function indexCredentials()
    {
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
}
