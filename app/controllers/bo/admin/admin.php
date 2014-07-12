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
    
    public function menuAdmin(){
        // admin main page
        echo"<p>Wellcom Admin</p>";
    }
        
    public function emailerr($email){
        echo '<p class="bg-warning">'. LOGIN_ERROR_EMAIL_DONT_EXIST .'</p>';
    }
    
    public function newRestaurateur(){
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
          
//echo ('--'.$nom.'--'.$prenom.'--'.$datenaissance.'--'.$email.'--'.$password.'--'.$adresse.'--'.$telephone);
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
    
            $userid=$this->_adminModel->setUser($postdata); 
            
            if ($userid!=null){
                url::redirect('admin/addRestaurateur/info/'.$userid);
            }else{
                $errMsg ='<p class="bg-warning">'. MISSING_DATA .'</p>';     
                $this->index($errMsg);
            
            }
        }
    }

    public function displayListRestaurateurs() {
        
    }
    
    public function addResrtorant() {
        
    }

    public function displayListResrtorants() {
        
    }
}