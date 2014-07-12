<?php

/**
 * This is the entry to the system
 *
 * @author anass
 */
class MainController extends Controller {
    //put your code here
    protected $DisplayLang = 'fr';
    
    
    public function __construct() {
        parent::__construct ();
        session::set('lang', 'fr');  
    }
    
    public function index($error=null){
        //if logged ingo to admin front page
        if (session::get('loggin')==true){ 
            $this->routeUser();    
        }
        //TODO: gestion des erreurs
        // this is displayed as defaut if user is not loged in
        $data['loginError']=$error;
        $data['Title']=MAIN_LOGIN;
        $this->view->rendertemplate('header',$data);
        $this->view->render('fo/deliveryman/menu_delevery',$data);
        $this->view->render('loginPg',$data);
        $this->view->rendertemplate('footer',$data);
    }
    
    public function login($loginerror=null) {
        //if logged ingo to admin front page
        if (session::get('loggin')==true){ 
            $this->routeUser();
        }
        // If not logged yet    
        if(isset($_POST['submit'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
             //echo("login: ". $email ."<br> pass :".hash('sha256', $password));

            $this->_adminModel= $this->loadModel('User_model');
            $user=$this->_adminModel->getUser($email,$password);      
            if ($user!=null){
                session::set('loggin', true);
                session::set('user', $user);
                $this->routeUser();
            }else{
                $errMsg ='<p class="bg-warning">'. WRONG_PASSWORD_MSG .'</p>';     
                $this->index($errMsg);
            }
        }
    }
    
    public function routeUser() {
        $user=session::get('user');
        switch ($user[0]->rang) {
           case 0:
               url::redirect('fo/clt/main');
               break;
           case 1:
               url::redirect('fo/delivry/main');
               break;
           case 2:
               url::redirect('bo/Restaurateur/main');
               break;
           case 3: 
               url::redirect('admin/main');
               break;
           default:
               url::redirect('main');
               break;
       }     
    }
    
    public function logout() {
            echo (session::display());
            session::destroy();                
            header( "Location:".DIR);
    }
    
    
    
    
}
