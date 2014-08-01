<?php

class User extends Controller
{

    protected $DisplayLang = 'fr';
    private $_adminModel;

    public function __construct()
    {
        parent::__construct();
        session::get("lang");
    }

    /*
     * display users' info
     */
    public function userInfo($id = null, $error = null)
    {
        $activeUser = session::get('user');
        if($activeUser==null){
            url::redirect("accountcreated");
        }
        $_adminModel = $this->loadModel('User_model');
        $apdated_User = $_adminModel->getUserById($id);

        if ($apdated_User != null) {
            if ($activeUser['id'] == $apdated_User['id']) {
                $this->displayUserInfo($apdated_User, $error);
            } elseif ($activeUser['rang'] == 3) {
                $this->displayUserInfo($apdated_User, $error);
            }
        } else {
            $this->displayUserInfo($activeUser, $error);
        }
    }

    public function displayUserInfo($user = null, $error = null)
    {
        //TODO: gestion des erreurs
        $data['displayedUser'] = $user;
        $data['loginError'] = $error;
        $this->view->rendertemplate('header', $data);

        $data['Title'] = ACCOUNT . ' ' . $user['prenom'] . ' ' . $user['nam'];
        $activeUser = SESSION::get('user');
        switch ($activeUser[0]->rang) {
          case 0: //coustomer
              $this->view->render('fo/clt/clt_menu', $data);
              $this->view->render('user/userInfo', $data);
              break;
          case 2: //user is restorateur
              $this->view->render('fo/restaurateur/menu_restaurateur', $data);
              //$this->view->render('user/userInfo', $data);
              break;
          case 3: //user is the invester
              $this->view->render('bo/admin/menu_admin', $data);
              //$this->view->render('user/userInfo', $data);
              break;

        }
        $this->view->rendertemplate('footer', $data);
    }

    /*
      main Public page , containe the maine menu tocontrol the app
     */

    public function main($error = null)
    {
        $this->userInfo(null);
    }

    public function index($error = null)
    {

        $data['loginError'] = $error;
        $data['Title'] = NEW_RESTORATEUR_FORM;
        $this->view->rendertemplate('header', $data);
        $this->view->render('fo/general/menu_general', $data);
        $this->view->render('error/generalErr', $data);
        $this->view->rendertemplate('footer', $data);
    }

    public function checkEmail($email)
    {
        echo $this->_adminModel->emailExist($email);
    }

    /*
     * Add a new user account by new user him self
     */
    public function newUser($error = null)
    {
        $data['loginError'] = $error;
        $this->view->rendertemplate('header', $data);
        $data['Title'] = NEW_USER_FORM;
        $this->view->render('fo/general/menu_general', $data);
        $this->view->render('frm_Add_User', $data);
        $this->view->rendertemplate('footer', $data);
    }

    public function addUser()
    {

        if (isset($_POST['submit'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $datenaissance = $_POST['datenaissance'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

            $this->_adminModel = $this->loadModel('User_model');
            $postdata = array(
                'nom' => $nom,
                'prenom' => $prenom,
                'mdp' => $password,
                'email' => $email,
                'id' => null,
                'datenaissance' => $datenaissance,
                'rang' => 0,
                'telephone' => $telephone,
                'adresse' => $adresse
            );

            $userid = $this->_adminModel->insertUser($postdata);
            SESSION::set('user',$userid);
            if ($userid != null) {
                url::redirect("user/info/$userid");
            } else {
                $errMsg = '<p class="bg-warning">' . MISSING_DATA . '</p>';
                $this->index($errMsg);
            }
        }
    }

    /*
     * modifir un utilisateur
     */
    public function updateUser($id = null, $error = null)
    {
        $activeUser = session::get('user');
        $this->_adminModel = $this->loadModel('User_model');

        $userToUpdate=null;




        if ($activeUser[0]->rang==3){
            $userToUpdate = $this->_adminModel->getUserById($id);
        }else{
            $userToUpdate = $activeUser;
        }

        $this->_adminModel = $this->loadModel('User_model');
        if (isset($_POST['submit'])) {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $datenaissance = $_POST['datenaissance'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];

                $postdata = array(
                    'id' => $id,
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'mdp' => $password,
                    'email' => $email,
                    'rang' => 0,
                    'telephone' => $telephone,
                    'adresse' => $adresse,
                    'datenaissance' => $datenaissance
                );

                $user = $this->_adminModel->getUserById($postdata['id']);

                if ($user['rang']==3 ){
                    $userToUpdate=$user['id'];
                }else{
                    $userToUpdate = SESSION::get('user');
                }

                switch ($activeUser['rang']) {
                    case 0: //coustomer
                        $postdata['rang']=0;
                        break;
                    case 2: //user is restorateur
                        $postdata['rang']=2;
                        break;
                    case 3: //user is the invester
                        $postdata['rang']=$user['rang'];
                        break;
                }

                $where = array('id' => $userToUpdate[0]->id);
                $this->_adminModel->update_user($postdata, $where);

                //$user = $this->_adminModel->getUserByEmail($postdata['email']);
                //TODO : corect the update
    /*
                session::set('user', $user);

                if ($user != null) {
                   url::redirect("user/info/".$userToUpdate[0]->id);
                } else {
                    $errMsg = '<p class="bg-warning">' . MISSING_DATA . '</p>';
                    url::redirect("user");
                }*/
        } else {
            /*echo "<br> userToUpdate= ".$userToUpdate[0]->id;
            echo "<br> activeUser= "   .$activeUser[0]->id . " -- rang= "   .$activeUser[0]->rang;
            */
            $data['userToUpdate'] = $userToUpdate;
            $data['loginError'] = $error;
            $data['Title'] = USER_RESTORATEUR_FORM;
            $this->view->rendertemplate('header', $data);
            switch ($activeUser[0]->rang) {
                case 0: //coustomer
                    $this->view->render('fo/clt/clt_menu', $data);
                    break;
                case 2: //user is restorateur
                    $this->view->render('bo/restaurateur/menu_restaurateur', $data);
                    break;
                case 3: //user is the invester
                    $this->view->render('bo/admin/menu_admin', $data);
                    break;
            }
            $this->view->render('frm_Update_User', $data);
            $this->view->rendertemplate('footer', $data);
        }
    }

    public function displayListMenus()
    {

    }

    public function displayListResrtorants($p=0) {
    //TODO : finire  restaurant/list
        $restau= $this->loadModel('Restaurant_Model');
        // setting up the pagination :
        $url=DIR.'restaurants/List';
        $nbr_Rows_To_Display='5';
        $pages = new an_paginator($url,$nbr_Rows_To_Display,$p);
        $pages->set_total( count($restau->get_all()));
        $pages->set_Nav_Tag(NEXT,PREVIOUS);
        $data['page_links'] = $pages->page_links();

        $data['listResto'] = $restau->get_Restaurants_List( $pages->get_limit() );
        $data['Title']= RESTORANT_LIST;

        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/clt/clt_menu',$data);
        $this->view->render('fo/clt/view_restorants_list',$data);
        $this->view->rendertemplate('footer',$data);

    }

}
