<?php

class Core_Model_Product extends Zend_Db_Table_Abstract {
    
    protected $_name = "produits";
    
    public function indexProducts(){
        $select = $this->select();
        $row = $this->fetchAll($select)->toArray();
        
        return $row;
    }
    
    public function ajoutProduit($nomProduit, $prixUnitaire, $stock, $codeProduit, $categorie)
    {
        try {                       
            $data = array(
                'nom' => $nomProduit,
                'prixUnitaire' => $prixUnitaire,
                'stock' => $stock,
                'codeProduitGenerique' => $codeProduit,
                'idProduitCategorie' => $categorie,
            );
            return $this->insert($data);    
        } 
        catch (Exception $ex) {
            echo $ex->getMessage();
        }        
    }
    
    public function deleteProduct($id) {

        try {
            $nbRowsDeleted = $this->delete('id = ' . $id);
        } catch (Exception $ex) {

            echo 'ERROR_DELETE_DELETEARTICLE : ' . $ex->getMessage();
            return false;
        }

        return $nbRowsDeleted;
    }
}
