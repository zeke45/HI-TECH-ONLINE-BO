<?php

class Core_Model_Event extends Zend_Db_Table_Abstract
{
    protected $_name = "evenements";
    
    public function indexEvents(){
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
    
    public function ajoutEvenement($libelle, $dateDebut, $dateFin)
    {
        //var_dump($dateDebut->format('Y-m-d H:i:s'));exit;
        try {                       
            $data = array(
                'libelle' => $libelle,
                'dateDebut' => $dateDebut->format('Y-m-d H:i:s'),
                'dateFin' => $dateFin->format('Y-m-d H:i:s')
            );
            var_dump($data); exit;
            return $this->insert($data);    
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }        
    }
    
}