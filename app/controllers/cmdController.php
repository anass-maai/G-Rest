<?php
/**
 * Controleur des commande
 */
class CmdController extends Controller {
    protected $DisplayLang = 'fr';
    protected $_tax = 0.15;

    public function __construct() {
            parent::__construct ();
            
    }

    public function displayListResrtorants($p=0) {
        $restau= $this->loadModel('Restaurant_Model');
        // setting up the pagination :
        $url=DIR.'order/step1';
        //Todo : set default nbr pages per display
        $nbr_Rows_To_Display='4';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total(count($restau->get_all()));
        $pages->set_Nav_Tag(NEXT,PREVIOUS);

        $data['listResto'] = $restau->get_Restaurants_List($pages->get_limit() );
        $data['page_links'] = $pages->page_links();
        $data['Title']= RESTORANT_LIST;

        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/clt/clt_menu',$data);
        $this->view->render('fo/clt/view_Restaurants_List',$data);
        $this->view->rendertemplate('footer',$data);

    }

    public function displayListMenu($idRestaurant=null,$p=0) {

        if ($idRestaurant!=null){
            $menu= $this->loadModel('Menu_Model');
            // setting up the pagination :

            $url=DIR.$url=DIR."order/step2/$idRestaurant";
            $nbr_Rows_To_Display='4';

            $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
            $pages->set_total( count($menu->get_Menus_By_Restaurant($idRestaurant)));
            $pages->set_Nav_Tag(NEXT,PREVIOUS);

            $data['listMenu'] = $menu->get_Menus_List_By_Restaurant($idRestaurant , $pages->get_limit());
            $data['page_links'] = $pages->page_links();
            //$data['Title']= RESTORANT_LIST;
            $this->view->render('fo/clt/view_menu_list',$data);

        }

    }

    public function displayListPlats($idMenu,$p=0) {

        $_platModel= $this->loadModel('Plat_Model');
        $_menuModel= $this->loadModel('Menu_Model');

        $plats = $_platModel->get_Plats_By_Menu($idMenu);
        // setting up the pagination :

        $url=DIR.'order/step2/$idMenu';
        //Todo : set default nbr pages per display
        $nbr_Rows_To_Display='10';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total( count($plats));

        $pages->set_Nav_Tag(NEXT,PREVIOUS);

        $data['page_links'] = $pages->page_links();

        $plats  = $_platModel->get_Plats_List_By_Menu($idMenu,$pages->get_limit());
        $menu = $_menuModel->get_Menu_By_Id($idMenu);

        $data['menu']  = $menu;
        SESSION::set('CmdRestaurant',$menu[0]->idRestaurant);
        $data['plats'] = $plats;

        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/clt/clt_menu',$data);
        $this->view->render('fo/clt/view_Plat_List', $data);
        $this->view->rendertemplate('footer',$data);

    }

    function newCmd($idMenu=null) {
        $_platModel= $this->loadModel('Plat_Model');

        if(isset($_POST['submit'])){

            $selected_Plates= array();
            for ($i = 0; $i < $_POST['nbrPlat']; $i++) {

               // $row=  array('index'=>$i ,"plat" => $_POST["plat$i"],"qt" => $_POST["qt$i"]);
                $prixPlat=$_platModel->get__Plat_By_Id($_POST["plat$i"]);
                $row=  array('index'=>$i ,"plat" => $prixPlat,"qt" => $_POST["qt$i"]);

                array_push($selected_Plates, $row);
               // var_dump($row);
            }
            SESSION::set('selected_Plates',$selected_Plates);

            $data['Title'] = ADD_NEW_MENU;
            $data['selected_Plates'] = SESSION::get('selected_Plates');

            $totalPric=0;
            $i=0;
            foreach($data['selected_Plates'] as $row){
                $totalPric =($totalPric + ( $row['qt'] * $row['plat'][0]->prixPlat ));
            }

            $data['Total']=$totalPric;
            $data['tax']=$this->_tax;
            $data['selected_Plates']=$selected_Plates;
            $this->view->rendertemplate('header',$data);
            $this->view->render('fo/clt/clt_menu',$data);
            $this->view->render('fo/clt/view_Confirm_Order', $data);
            $this->view->rendertemplate('footer',$data);
        }else{
            $data['Title'] = ADD_NEW_MENU;
            $selected_Plates = SESSION::get('selected_Plates');

            $totalPric=0;
            $i=0;
            foreach($selected_Plates as $row){
                $totalPric =($totalPric + ( $row['qt'] * $row['plat'][0]->prixPlat ));
            }

            $data['Total']=$totalPric;
            $data['tax']=$this->_tax;
            $data['selected_Plates']=$selected_Plates;
            $this->view->rendertemplate('header',$data);
            $this->view->render('fo/clt/clt_menu',$data);
            $this->view->render('fo/clt/view_Confirm_Order', $data);
            $this->view->rendertemplate('footer',$data);
        }
    }

    function cmdReview($idMenu=null) {
        $data['Title'] = ADD_NEW_MENU;
        $selected_Plates = SESSION::get('selected_Plates');
        $totalPric=0;
        $i=0;
        foreach($selected_Plates as $row){
            $totalPric =($totalPric + ( $row['qt'] * $row['plat'][0]->prixPlat ));
        }
        $data['Total']=$totalPric;
        $data['tax']=$this->_tax;
        $data['selected_Plates']=$selected_Plates;
        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/clt/clt_menu',$data);
        $this->view->render('fo/clt/view_CmdReview_Order', $data);
        $this->view->rendertemplate('footer',$data);
    }
    function checkOut($idMenu=null) {
        $selected_Plates = SESSION::get('selected_Plates');
        $address_Model= $this->loadModel('address_Model');
        $user_Model= $this->loadModel('User_model');
        $data['Title'] = ADD_NEW_MENU;
        $totalPric=0;
        $i=0;
        foreach($selected_Plates as $row){
            $totalPric =($totalPric + ( $row['qt'] * $row['plat'][0]->prixPlat ));
        }

        $data['Total']=$totalPric;
        $data['tax']=$this->_tax;
        $data['selected_Plates']=$selected_Plates;
        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/clt/clt_menu',$data);
        $this->view->render('fo/clt/view_check_out', $data);
        $this->view->rendertemplate('footer',$data);
    }

    function display_address_list($iduser=null) {
        $user=SESSION::get('user');
        $addressModel= $this->loadModel('address_Model');
        $addressList = $addressModel->get_Address_By_user($iduser);

        if(isset($_POST['submit'])){
            $address         =$_POST['address'];
            echo "bbbbb $user->id";
            $postdata = array(
                'address'    => $address,
                'iduser'     => $user->id,
                );
            $where = array('iduser' => $user->id);
            $addressModel->set_Plat($postdata,$where);
            $addressList=$addressModel->get_Address_By_user($user->id);
            $data['addressList'] = $addressList;
            $this->view->render('fo/clt/view_Address_List', $data);

        }else{

        $data['addressList'] = $addressList;
        $this->view->render('fo/clt/view_Address_List', $data);

        }

    }

    function saveCmd($iduser=null) {
        $user=SESSION::get('user');
        $cmdModel= $this->loadModel('Order_Model');
        $restau= $this->loadModel('Restaurant_Model');
        $restaurant= SESSION::get('CmdRestaurant');
        if(isset($_POST['submit'])){

            $dateLivraison   =$_POST['dateLivraison'];
            $heurLivraison   =$_POST['heurLivraison'];
            $address         =$_POST['address'];
         // insert in the plate table first
            $postdata = array(
                'id_cmd' =>null,
                'address'           => $address,
                'cmd_status'       => 1 ,
                'dateLivraison'    => $dateLivraison,
                'heurLivraison'    => $heurLivraison,
                'iduser'           => $user[0]->id ,
                'idrestau'         => $restaurant
            );
            $cmd=$cmdModel->insertNew($postdata);
            $cmdResto=$restau->get_Restaurant_By_Id($restaurant);

            $selected_Plates = SESSION::get('selected_Plates');
            foreach($selected_Plates as $row){

                $postdata = array(
                    'id_cmd'        => $cmd,
                    'idPlat'        => $row['plat'][0]->idPlat,
                    'quantity'      => $row['qt']
                );
                $item=$cmdModel->insertNew_ommande_items($postdata);

            }
            $data['Title'] = ORDER_DONE;
            $this->view->rendertemplate('header',$data);
            $this->view->render('fo/clt/clt_menu',$data);

            echo ("<p class='alert alert-warning'> " . ORDER_DONE . $cmd ." </p> ");


            $this->view->rendertemplate('footer',$data);
        }

    }



}
