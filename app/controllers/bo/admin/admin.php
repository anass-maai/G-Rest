<?php
class Admin extends Controller {
    protected $DisplayLang = 'fr';
    private $_adminModel;
        
    public function __construct() {
            parent::__construct ();
    }

    /*
      main Admin page , containe the maine menu tocontrol the app
    */
    public function main($error=null){
        //TODO: gestion des erreurs
        $data['loginError']=$error;
        $data['Title']=GENERAL_MENU;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/admin/menu_admin',$data);
        $this->view->render('bo/admin/mainAdmin',$data);
        $this->view->rendertemplate('footer',$data);
         
    }
    public function checkEmail($email){
        echo $this->_adminModel->emailExist($email);
    }

    public function newRestaurateur($error=null){
        $data['loginError']=$error;
        $data['Title']=NEW_RESTORATEUR_FORM;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/admin/menu_admin',$data);
        $this->view->render('frm_Add_User',$data);
        $this->view->rendertemplate('footer',$data);
    }
    public function addRestaurateur(){
        
        // INSERT INTO `restau`.`utilisateur` (`nom`, `prenom`, `mdp`, `email`, `id`, `rang`, `telephone`, `adresse`, `datenaissance`) 
        // VALUES ('wwww', 'wwww', 'werwer', 'ewewew', NULL, '1', '121112', 'wqwqwqee', '2014-07-09');
        //echo 'ok';
        
        if(isset($_POST['submit'])){
            
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $datenaissance=$_POST['datenaissance'];  
            $email=$_POST['email'];
            $password=$_POST['password'];
            $adresse=$_POST['adresse'];
            $telephone=$_POST['telephone'];

            $this->_adminModel= $this->loadModel('User_model');            
            $postdata = array(               
                'nom'           => $nom,
                'prenom'        => $prenom,
                'mdp'           => $password,
                'email'         => $email,
                'id'            => null,
                'datenaissance' => $datenaissance,
                'rang'          => 2,
                'telephone'     => $telephone,
                'adresse'       => $adresse   
            );
    
            $userid=$this->_adminModel->insertUser($postdata);
            
            if ($userid!=null){
                url::redirect('admin/addRestaurateur/info/id/'.$userid);
            }else{
                $errMsg ='<p class="bg-warning">'. MISSING_DATA .'</p>';     
                $this->index($errMsg);
            
            }
        }
    }

    public function displayListRestaurateurs() {
        
    }


    public function newResrtorant($error=null) {

        $this->_adminModel= $this->loadModel('User_model');
        $data['RestaurateurList']= $this->_adminModel->getUsersByRang(2);
        $data['Error']=$error;
        $data['Title']=NEW_RESTORANT_FORM;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/admin/menu_admin',$data);
        $this->view->render('bo/restaurant/frm_add_restaurant',$data);
        $this->view->rendertemplate('footer',$data);
    }

    public function addResrtorant(){
        if(isset($_POST['submit'])){
            $nom=$_POST['nom'];
            $description_en=$_POST['description_en'];
            $description_fr=$_POST['description_fr'];
            $specialite=$_POST['specialite'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $idrestaurateur = $_POST['restaurateur'];


       //TODO: si restorateur n'est pa entrer, ne rien faire + afficher Message erreur
            if ($idrestaurateur == null ){

                $errMsg="<div class='alert alert-danger' role='alert'><p >".ERR_MISSING_RESTEURATEUR."</p></div>";
                $this->newResrtorant($errMsg);
            }
            else{
                $restau= $this->loadModel('Restaurant_Model');
                $postdata = array(
                    'nom'               => $nom,
                    'en_description'    => $description_en,
                    'fr_description'    => $description_fr,
                    'specialite'        => $specialite,
                    'idrestaurant'      => null,
                    'telephone'         => $telephone,
                    'adresse'           => $adresse,
                    'idrestaurateur'    => $idrestaurateur
                );

                echo("$nom<br> $idrestaurateur <br>");

                $restauId=$restau->insertNew($postdata);

                if ($restauId!=null){
                    url::redirect('admin/restaurants/List');
                   //todo: AJOUTER LE SUPORT D'AFFICHAGE DE MENU EN TEMBNAILE

                }else{
                    $errMsg ='<p class="bg-warning">'. MISSING_DATA .'</p>';
                    $this->index($errMsg);
                }
            }
        }
    }

    public function displayListResrtorants($p=0) {

        $restau= $this->loadModel('Restaurant_Model');
        // setting up the pagination :
        $url=DIR.'admin/restaurants/List';
        $nbr_Rows_To_Display='5';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total( count($restau->get_all()));

        $data['listResto'] = $restau->get_Restaurants_List( $pages->get_limit() );
        $data['page_links'] = $pages->page_links();

        $data['Title']= RESTORANT_LIST;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/admin/menu_admin',$data);
        $this->view->render('bo/restaurant/view_restorants_list',$data);
        $this->view->rendertemplate('footer',$data);

       }
}