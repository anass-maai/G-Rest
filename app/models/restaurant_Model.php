<?php
/**
 * Created by PhpStorm.
 * User: anas
 * Date: 24/07/14
 * Time: 11:48 PM
 */

class Restaurant_Model extends Model {

    private $restauDbTab    = 'restaurant' ;
    private $userDbTab      = 'utilisateur' ;

    public function __construct() {
        parent::__construct();
    }

    public function get_Restaurant_By_Id($id){
       return $this->_db->select("SELECT * FROM " . PREFIX . $this->userDbTab ." WHERE idrestaurant  = :id;", array(':id' => "$id"));
    }
    public function get_all_count(){
        return $this->_db->select("SELECT count( * )FROM  restaurant " );
    }
    public function get_all(){
        return $this->_db->select("SELECT * FROM  restaurant " );
    }

    public function get_Restaurants_List($limit){
        $req="SELECT `idrestaurant`, restaurant.nom AS restau_name, `fr_description`, `en_description`, restaurant.`adresse`, restaurant.`telephone`, utilisateur.nom, utilisateur.prenom  FROM (" . PREFIX . "restaurant, utilisateur )
                WHERE ( utilisateur.id = restaurant.idrestaurateur) $limit" ;
        return $this->_db->select($req);
    }

    public function insertNew($restau){
        $this->_db->insert(PREFIX.'restaurant',$restau);
        return $this->_db->lastInsertId('id');
    }


    public function set_Restaurant($id){

    }

}
