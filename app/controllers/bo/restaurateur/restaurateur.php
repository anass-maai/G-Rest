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
    
    function newPlat($param) {

        
    }
    
    function addPlat($menuid) {
              
        if(isset($_POST['submit'])){
            
            $idPlat=$_POST['idPlat'];
            $nomPlat=$_POST['nomPlat'];
            $descriptionPlat=$_POST['descriptionPlat'];  
            $prixPlat=$_POST['prixPlat'];
          
//echo ('--'.$nom.'--'.$prenom.'--'.$datenaissance.'--'.$email.'--'.$password.'--'.$adresse.'--'.$telephone);
            $this->_platModel= $this->loadModel('plat_Model');            
            $postdata = array(               
                'idPlat'            => $idPlat,
                'nomPlat'           => $nomPlat,
                'descriptionPlat'   => $descriptionPlat,
                '$prixPlat'         => $prixPlat,
            );
    
            $userid=$this->_platModel->setPlat($postdata);
            $_menuModel= $this->loadModel('menu_Model'); 
            $userid=$this->_menuModel->setPlatToMenu($idMenu,$idPlat);
            
            if ($userid!=null){
                url::redirect('admin/addRestaurateur/showmenu/'.$menuid);
            }else{
                $errMsg ='<p class="bg-warning">'. MISSING_DATA .'</p>';     
                $this->index($errMsg);
            
            }
        }
    }
    
    function addMenu($param) {


    } 
    function newMenu() {


    }
    function getFrmUpdateMenu($id) {


    }

    function updateMenu($param) {

        
    }

    
}
