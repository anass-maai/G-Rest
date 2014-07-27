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
    public function uploadFile() {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 20000)
            && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                /*if (file_exists("upload/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                } else {*/
                //TODO : prendre en concidiration le changement des themes dans le $url de upload
                move_uploaded_file($_FILES["file"]["tmp_name"],TEMPLATES_REP."default/img/plats/" . $_FILES["file"]["name"]);
                /*}*/
                return $_FILES["file"]["name"];
            }
        } else {
            echo "Invalid file";
            return null;
        }
    }
    
}
