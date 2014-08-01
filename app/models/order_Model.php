<?php
class Order_Model extends Model {

    private $_commande_DbTab = 'commande' ;
    private $_commande_items = 'commande_items' ;

    public function __construct() {
        parent::__construct();
    }

    public function get_Commande_By_Id($id){
        $req="select * FROM (" . PREFIX . $this->_commande_DbTab .") WHERE (idCommande = $id)";
        return $this->_db->select($req);
    }

    public function get_Commande_By_user($idUser){
        $req="SELECT * FROM (" . PREFIX . $this->_commande_DbTab .  ")
                WHERE ( " . PREFIX . $this->_commande_DbTab .".iduser = $idUser)" ;
        //echo $req;
        return $this->_db->select($req);
    }

    public function get_all(){
        return $this->_db->select("SELECT * FROM  $this->_commande_DbTab " );
    }

    public function insertNew($Commande){
        $this->_db->insert(PREFIX.$this->_commande_DbTab, $Commande );
        return $this->_db->lastInsertId('idPlat');
    }

    public function set_Commande($data,$where){
        $this->_db->update(PREFIX.$this->_commande_DbTab,$data, $where);
    }

    public function delete_Commande($where){
        $this->_db->delete(PREFIX.$this->_commande_DbTab, $where);
    }

    public function insertNew_ommande_items($Commande){
        $this->_db->insert(PREFIX.$this->_commande_items, $Commande );
        return $this->_db->lastInsertId('idPlat');
    }




}
