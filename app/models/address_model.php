<?php
class address_Model extends Model {

    private $_addressDbTab = 'address' ;

    public function __construct() {
        parent::__construct();
    }

    public function get_Address_By_Id($id){
        $req="select * FROM (" . PREFIX . $this->_addressDbTab .") WHERE (idaddress = $id)";
        return $this->_db->select($req);
    }

    public function get_Address_By_user($idUser){
        $req="SELECT * FROM (" . PREFIX . $this->_addressDbTab .  ")
                WHERE ( " . PREFIX . $this->_addressDbTab .".iduser = $idUser)" ;
        //echo $req;
        return $this->_db->select($req);
    }

    public function get_all(){
        return $this->_db->select("SELECT * FROM  $this->_addressDbTab " );
    }

    public function insertNew($address){
        $this->_db->insert(PREFIX.$this->_addressDbTab, $address);
        return $this->_db->lastInsertId('idPlat');
    }

    public function set_Address($data,$where){
        $this->_db->update(PREFIX.$this->_addressDbTab,$data, $where);
    }

    public function delete_Address($where){

        $this->_db->delete(PREFIX.$this->_addressDbTab, $where);
    }








}
