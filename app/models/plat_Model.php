<?php
class plat_Model extends Model {

    private $_platDbTab         = 'plattab' ;
    private $_Menu_PlatDbTab    = 'menu_plat' ;

    public function __construct() {
        parent::__construct();
    }

    public function get__Plat_By_Id($id){
        $req="select * FROM (" . PREFIX . $this->_platDbTab .") WHERE (idPlat = $id)";
        return $this->_db->select($req);
    }

    public function get_Plat_By_Restaurant($idRestau){
        $req="SELECT * FROM (" . PREFIX . $this->_platDbTab .  " , " . PREFIX . $this->_platDbTab .  " )
                WHERE ( " . PREFIX . $this->_platDbTab .  ".idRestaurant = $idRestau)" ;
        //echo $req;
        return $this->_db->select($req);
    }

    public function get_Plats_By_Menu($idMenu){
        $req="SELECT * FROM (" . PREFIX . $this->_platDbTab .  " , " . PREFIX . $this->_Menu_PlatDbTab .  " )
                WHERE ( " . PREFIX . $this->_Menu_PlatDbTab .".idMenu = $idMenu
                and " . PREFIX . $this->_Menu_PlatDbTab .".idPlat = " . PREFIX . $this->_platDbTab . ".idPlat )" ;
       // echo $req;
        return $this->_db->select($req);
    }

    public function get_Plats_List_By_Menu($idMenu,$limit){
        $req="SELECT * FROM (" . PREFIX . $this->_platDbTab .  " , " . PREFIX . $this->_Menu_PlatDbTab .  " )
                WHERE ( " . PREFIX . $this->_Menu_PlatDbTab .".idMenu = $idMenu
                and " . PREFIX . $this->_Menu_PlatDbTab .".idPlat = " . PREFIX . $this->_platDbTab . ".idPlat )
                $limit" ;
        // echo $req;
        return $this->_db->select($req);
    }


    public function get_all(){
        return $this->_db->select("SELECT * FROM  $this->_platDbTab " );
    }

    public function insertNew($plat){
        $this->_db->insert(PREFIX.$this->_platDbTab, $plat);
        return $this->_db->lastInsertId('idPlat');
    }

    public function insertNewInMenuPlat($plat){
        $this->_db->insert(PREFIX.$this->_platDbTab, $plat);
        return $this->_db->lastInsertId('idPlat');
    }

    public function set_Plat($data,$where){
        $this->_db->update(PREFIX.$this->_platDbTab,$data, $where);
    }

    public function delete_Plat($where){
        $this->_db->delete(PREFIX.$this->_Menu_PlatDbTab, $where);
        $this->_db->delete(PREFIX.$this->_platDbTab, $where);
    }


    public function addToMenu($data){
        $this->_db->insert(PREFIX.$this->_Menu_PlatDbTab, $data);
        return $this->_db->lastInsertId('idPlat');
    }








}
