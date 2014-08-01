<?php


class Menu_Model extends Model {
    private $_menuDbTab         = 'menu' ;
    private $_menu_plat_DBTAB   = 'menu_plat' ;

    public function __construct() {
        parent::__construct();
    }

    public function get_Menu_By_Id($id){
        $req="select * FROM (" . PREFIX . "menu ) WHERE (idMenu = $id)";
        //echo $req;
        return $this->_db->select($req);
    }

    public function get_Menu_By_Plat($idPlat){

        $req="SELECT * FROM (" . PREFIX . $this->_menuDbTab . ", " . PREFIX . $this->_menu_plat_DBTAB .  ")
                where (" . PREFIX . $this->_menu_plat_DBTAB .  ".idPlat=1
                and " . PREFIX . $this->_menuDbTab . ".idmenu=" . PREFIX . $this->_menu_plat_DBTAB .  ".idMenu)";
        return $this->_db->select($req);
    }

    public function get_Menus_By_Restaurant($idRestaurant){
        $req="SELECT * FROM (" . PREFIX . $this->_menuDbTab .  " )
                WHERE ( idRestaurant = $idRestaurant)" ;
        return $this->_db->select($req);
    }

    public function get_all(){
        return $this->_db->select("SELECT * FROM  $this->_menuDbTab " );
    }

    public function insertNew($menu){
        $this->_db->insert(PREFIX.$this->_menuDbTab, $menu);
        return $this->_db->lastInsertId('idMenu');
    }

    public function set_Menu($data,$where){
        $this->_db->update(PREFIX.$this->_menuDbTab,$data, $where);
    }

    public function delete_Menu($where){
        $this->_db->delete(PREFIX.$this->_menuDbTab, $where);
    }

    public function get_Menus_List_By_Restaurant($idRestaurant,$limit){
        $req="SELECT " . PREFIX . $this->_menuDbTab . ".`nomMenu_fr`, " . PREFIX . $this->_menuDbTab . ".`nomMenu_en`, " . PREFIX . $this->_menuDbTab . ".idMenu," . PREFIX . $this->_menuDbTab . ".idRestaurant
                FROM (" . PREFIX . $this->_menuDbTab . " )
                WHERE ( " . PREFIX . $this->_menuDbTab . ".idRestaurant = $idRestaurant )
                $limit" ;
        //echo "<br>$req<br>";
        return $this->_db->select($req);
    }

}
