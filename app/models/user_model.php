<?php

class User_model extends Model {
    private $userDbTab = 'utilisateur' ;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function emailExist($email) {
        $data = $this->_db->select("SELECT mdp FROM " . PREFIX . $this->userDbTab ." where email = :email", array(':email' => "$email"));
        if ($data . next) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getUser($email, $password) {
        $pas = hash('sha256', $password); // On hash le mot de passe en sha256
        return $this->_db->select("SELECT * FROM " . PREFIX . $this->userDbTab ." WHERE email = :email AND mdp= :password;", array(':email' => "$email", ':password' => "$pas"));
    }

    public function getUserRol($email) {
        $data = $this->_db->select("select role from " . PREFIX . $this->userDbTab ." where email = :email", array(':email' => $email));
        return $data[0]->role;
    }

    public function insertUser($user) {

        $user['mdp'] = hash('sha256', $user['mdp']); // On hash le mot de passe en sha256
        $this->_db->insert(PREFIX.'utilisateur',$user);
        return $this->_db->lastInsertId('id');

    }

    public function getUserById($id){
        return $this->_db->select("select * from " . PREFIX . $this->userDbTab ." where id = :id", array(':id' => $id)); 
    }
    public function getUsersByRang($rang){
        return $this->_db->select("select * from " . PREFIX . $this->userDbTab ." where rang = :rang", array(':rang' => $rang));
    }
    public function getUserByEmail($email){
        return $this->_db->select("select * from " . PREFIX . $this->userDbTab ." where email = :email", array(':email' => $email));
    }
    public function update_user($data, $where){
        echo ('<BR>----- req------<BR>
                    nom : '          .$data['nom'].'<br>'
            .'prenom : '        .$data['prenom'].'<br>'
            .'mdp : '           .$data['mdp'].'<br>'
            .'email : '         .$data['email'].'<br>'
            .'telephone : '     .$data['telephone'].'<br>'
            .'adresse : '       .$data['adresse'].'<br>'
            .'datenaissance : ' .$data['datenaissance']
            .'where id : ' . $where['id']);
//--------
        $data['mdp'] = hash('sha256', $data['mdp']); // On hash le mot de passe en sha256
        $this->_db->update(PREFIX.$this->userDbTab,$data, $where);
//--------
    }
    
}
