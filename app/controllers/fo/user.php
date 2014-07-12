<?php

class User extends Controller {

    protected $DisplayLang = 'fr';
    private $_adminModel;

    public function __construct() {
        parent::__construct();
        session::get("lang");
    }

    public function userInfo($id = null) {
        $activeUser = session::get('user');
        $this->_adminModel = $this->loadModel('User_model');
        $apdatedUser = $this->_adminModel->getUserById($id);
        
        if ($apdatedUser != null) {
            if ($activeUser['id'] == $apdatedUser['id']) {
                $this->displayUserInfo($apdatedUser);
            } elseif ($activeUser['id'] == 3) {
                $this->displayUserInfo($apdatedUser);
            }
        } else {
            $this->displayUserInfo($activeUser);
        }

        $this->view->rendertemplate('footer', $data);
    }

    public function displayUserInfo($user) {
         //TODO: gestion des erreurs
        $data['displayedUser'] = $user;
        $data['loginError'] = $error;
        $data['Title'] = GENERAL_MENU;
        $this->view->rendertemplate('header', $data);
        $this->view->render('fo/general/menu_general', $data);
        $this->view->render('user/userInfo', $data);
    }

    /*
      main Public page , containe the maine menu tocontrol the app
     */

    public function main($error = null) {
        $this->userInfo(null);
    }

    public function index($errMsg = null) {

        $data['loginError'] = $error;
        $data['Title'] = NEW_RESTORATEUR_FORM;
        $this->view->rendertemplate('header', $data);
        $this->view->render('fo/general/menu_general', $data);
        $this->view->render('error/generalErr', $data);
        $this->view->rendertemplate('footer', $data);
    }

    public function checkEmail($email) {
        echo $this->_adminModel->emailExist($email);
    }

    public function newUser() {
        $data['loginError'] = $error;
        $data['Title'] = NEW_RESTORATEUR_FORM;
        $this->view->rendertemplate('header', $data);
        $this->view->render('fo/general/menu_general', $data);
        $this->view->render('frm_Update_User', $data);
        $this->view->rendertemplate('footer', $data);
    }

    public function addUser() {

        if (isset($_POST['submit'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $datenaissance = $_POST['datenaissance'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];

//echo ('--'.$nom.'--'.$prenom.'--'.$datenaissance.'--'.$email.'--'.$password.'--'.$adresse.'--'.$telephone);
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

            $userid = $this->_adminModel->setUser($postdata);

            if ($userid != null) {
                url::redirect("user/info/$userid");
            } else {
                $errMsg = '<p class="bg-warning">' . MISSING_DATA . '</p>';
                $this->index($errMsg);
            }
        }
    }

    public function updateUser() {
        $user = session::get('user');
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

            $where = array('email' => $user[0]->email);
            $this->_adminModel->update_user($postdata, $where);

            $user = $this->_adminModel->getUserByEmail($postdata['email']);
            session::set('user', $user);

            if ($user != null) {
                url::redirect('user/info');
            } else {
                $errMsg = '<p class="bg-warning">' . MISSING_DATA . '</p>';
                url::redirect("user");
            }
        } else {
            $data['loginError'] = $error;
            $data['Title'] = NEW_RESTORATEUR_FORM;
            $this->view->rendertemplate('header', $data);
            $this->view->render('fo/general/menu_general', $data);
            $this->view->render('frm_Update_User', $data);
            $this->view->rendertemplate('footer', $data);
        }
    }

    public function displayListRestaurants() {
        
    }

    public function displayListMenus() {
        
    }

    //TODO : ADD DISPLAY LIST BASED ON POSTAL CODE
}
