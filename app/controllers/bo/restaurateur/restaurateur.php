<?php

class Restaurateur extends Controller {
    //put your code here
    protected $DisplayLang = 'fr';
    
    
    public function __construct() {
        parent::__construct ();
        session::set('lang', 'fr');  
    }
    
    /*
      main Admin page , containe the maine menu tocontrol the app
    */
    public function main($error=null){
        //TODO: gestion des erreurs
        $data['loginError']=$error;
        $data['Title']=GENERAL_MENU;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/restaurateur/menu_restaurateur',$data);
        $this->view->render('bo/restaurateur/main',$data);
        $this->view->rendertemplate('footer',$data);
         
    }

    function addPlat($idMenu=null) {

        $_menuModel= $this->loadModel('Menu_Model');
        $_platModel= $this->loadModel('Plat_Model');

        if(isset($_POST['submit'])){

            $idMenu         =$_POST['idMenu'];
            $nomPlat_fr     =$_POST['nomPlat_fr'];
            $description_fr =$_POST['description_fr'];
            $nomPlat_en     =$_POST['nomPlat_en'];
            $description_en =$_POST['description_en'];
            $prixPlat       =$_POST['txtPrix'];

            // insert in the plate table first
            $postdata = array(
                'idPlat'            => null,
                'nomPlat_fr'        => $nomPlat_fr,
                'description_fr'    => $description_fr,
                'nomPlat_en'        => $nomPlat_en,
                'description_en'    => $description_en,
                'prixPlat'         =>  $prixPlat
            );

            $plat=$_platModel->insertNew($postdata);
            // insert in the menu_plate table to link the plate to the menu
            $postdata = array(
                'idPlat'        => $plat,
                'idMenu'        => $idMenu
            );
            $plate=$_platModel->addToMenu($postdata);

            if ($plate!=null){
                url::redirect('restaurateur/plates/addnew/'.$idMenu);
            }else{
                $errMsg ='<p class="bg-warning">'. MISSING_DATA .'</p>';
                $this->index($errMsg);
            }
        }else{
            $menu = $_menuModel->get_Menu_By_Id($idMenu);
            $plats = $_platModel->get_Plats_By_Menu($idMenu);

            $data['Title'] = ADD_NEW_MENU;
            $data['menu']  = $menu;
            $data['plats'] = $plats;

            $this->view->rendertemplate('header',$data);
            $this->view->render('bo/restaurateur/menu_restaurateur',$data);
            $this->view->render('bo/restaurateur/view_Add_New_Plat', $data);
            $this->view->rendertemplate('footer',$data);

        }
    }

    function updatePlat($idPlat=null) {
        $_menuModel= $this->loadModel('Menu_Model');
        $_platModel= $this->loadModel('Plat_Model');

        if(isset($_POST['submit'])){

            $idPlat         =$_POST['idPlat'];
            $nomPlat_fr     =$_POST['nomPlat_fr'];
            $description_fr =$_POST['description_fr'];
            $nomPlat_en     =$_POST['nomPlat_en'];
            $description_en =$_POST['description_en'];
            $prixPlat       =$_POST['txtPrix'];

            $postdata = array(
                'nomPlat_fr'        => $nomPlat_fr,
                'description_fr'    => $description_fr,
                'nomPlat_en'        => $nomPlat_en,
                'description_en'    => $description_en,
                'prixPlat'         =>  $prixPlat
            );
            $where = array('idPlat' => $idPlat);
            $_platModel->set_Plat($postdata,$where);
            echo "bbbbb $idPlat";
            url::redirect('restaurateur/plates/update/'.$idPlat);
        }else{
            $menu  = $_menuModel->get_Menu_By_Plat($idPlat);
            $plats = $_platModel->get_Plats_By_Menu($menu[0]->idMenu);
            $plat  = $_platModel->get__Plat_By_Id($idPlat);
            $data['Title'] = UPDATE_A_PLAT;
            $data['menu']  = $menu;
            $data['plats'] = $plats;
            $data['plat']  = $plat;

            $this->view->rendertemplate('header',$data);
            $this->view->render('bo/restaurateur/menu_restaurateur',$data);
            $this->view->render('bo/restaurateur/view_Update_Plat', $data);
            $this->view->rendertemplate('footer',$data);
        }
    }

    function deletePlat($idPlat=null) {
        $_platModel= $this->loadModel('Plat_Model');
        $_menuModel= $this->loadModel('Menu_Model');

        if($idPlat!=null){
            //check if the plat exicte in plattab
            $_platModel->get__Plat_By_Id($idPlat);
            $menu  = $_menuModel->get_Menu_By_Plat($idPlat);
            if ($_platModel != null ){
                $where = array('idPlat' => $idPlat);
                $_platModel->delete_Plat($where);
            }
        }
        url::redirect("restaurateur/plates/list/".$menu[0]->idMenu);
    }

    public function displayPlatesList($idMenu,$p=0) {
        $_platModel= $this->loadModel('Plat_Model');
        $_menuModel= $this->loadModel('Menu_Model');

        $plats = $_platModel->get_Plats_By_Menu($idMenu);
        // setting up the pagination :

        $url=DIR.'restaurateur/restaurants/List/$idMenu';
        //Todo : set default nbr pages per display
        $nbr_Rows_To_Display='10';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total( count($plats));

        $pages->set_Nav_Tag(NEXT,PREVIOUS);

        $data['page_links'] = $pages->page_links();

        $plats  = $_platModel->get_Plats_List_By_Menu($idMenu,$pages->get_limit());
        $menu = $_menuModel->get_Menu_By_Id($idMenu);

        $data['Title'] = ADD_NEW_MENU;
        $data['menu']  = $menu;
        $data['plats'] = $plats;

        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/restaurateur/menu_restaurateur',$data);
        $this->view->render('bo/restaurateur/view_Plat_List', $data);
        $this->view->rendertemplate('footer',$data);

    }

    function addMenu($idRestaurant=null) {
        $_menuModel= $this->loadModel('Menu_Model');
        $restaurateur=SESSION::get('user');

        if(isset($_POST['submit'])){
            $nomMenu_fr     =$_POST['nomMenu_fr'];
            $nomMenu_en     =$_POST['nomMenu_en'];
            $idRestaurant   =$_POST['idRestaurant'];

            //$this->_MenuModel= $this->loadModel('Menu_Model');
            $postdata = array(

                'nomMenu_en'    => $nomMenu_en,
                'nomMenu_fr'    => $nomMenu_fr,
                'idRestaurateur'=> $restaurateur[0]->id,
                'idMenu'        => null,
                'idRestaurant'  => $idRestaurant
            );
            $idLastInsertedMenu=$_menuModel->insertNew($postdata);
            if ($idLastInsertedMenu!=null){
                url::redirect('restaurateur/plates/addnew/'.$idLastInsertedMenu);
            }else{
                $errMsg ="<p class='bg-warning alert alert-danger' role='alert'>". MISSING_DATA ."</p>";
                $this->index($errMsg);
            }
        }else{

            $_restauModel= $this->loadModel('Restaurant_Model');
            $restaurant = $_restauModel->get_Restaurant_By_Id($idRestaurant);

            $data['Title'] = ADD_NEW_MENU;
            $data['restaurant'] = $restaurant;

            $this->view->rendertemplate('header',$data);
            $this->view->render('bo/restaurateur/menu_restaurateur',$data);
            $this->view->render('bo/restaurateur/view_Add_New_Menu', $data);
            $this->view->rendertemplate('footer',$data);

        }

    }


    function ListCommandes($param=null) {


    }

    function changeCmdState($idCmd) {


    }

    public function displayListResrtorants($p=0) {
        $activeUser = session::get('user');
        $restau= $this->loadModel('Restaurant_Model');
        // setting up the pagination :

        $url=DIR.'restaurateur/restaurants/List';
        //Todo : set default nbr pages per display
        $nbr_Rows_To_Display='2';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total( count($restau->get_Restaurants_By_Restaurateur($activeUser[0]->id)));

        $pages->set_Nav_Tag(NEXT,PREVIOUS);

        $data['listResto'] = $restau->get_Restaurants_List_By_Restaurateur($activeUser[0]->id , $pages->get_limit() );
        $data['page_links'] = $pages->page_links();

        $data['Title']= RESTORANT_LIST;
        $this->view->rendertemplate('header',$data);
        $this->view->render('bo/restaurateur/menu_restaurateur',$data);
        $this->view->render('bo/restaurateur/view_restorants_list',$data);
        $this->view->rendertemplate('footer',$data);

    }

    public function displayMenuList($idRestaurant=null,$p=0) {

        if ($idRestaurant!=null){

            $menu= $this->loadModel('Menu_Model');
            // setting up the pagination :

            $url=DIR.$url=DIR."restaurateur/menu/List/$idRestaurant";
            $nbr_Rows_To_Display='4';

            $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
            $pages->set_total( count($menu->get_Menus_By_Restaurant($idRestaurant)));
            $pages->set_Nav_Tag(NEXT,PREVIOUS);

            $data['listMenu'] = $menu->get_Menus_List_By_Restaurant($idRestaurant , $pages->get_limit());
            $data['page_links'] = $pages->page_links();


            //$data['Title']= RESTORANT_LIST;

            $this->view->render('bo/restaurateur/view_menu_list',$data);

        }

    }
}