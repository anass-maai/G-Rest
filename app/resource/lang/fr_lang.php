<?php
 //---------------------------------------------------------
 // Welcome
 //---------------------------------------------------------
define('WELCOME_MSG', 'Bienvenue !');
define('GO_FRONTOFFICE', 'Site public'); 
define('GO_BACKOFFICE', 'Administration');



define('NEXT', 'Suivent');
define('PREVIOUS', 'Précédent');

//----------------------------------------------------------
//General
//----------------------------------------------------------
define('GENERAL_List_RESTAURATEUR', 'List restaurants');
define('GENERAL_List_MENU', 'List menus');
define('ITEMS_NUMBER', "Nombre d'itemes");
define('BT_SHOW_ITEMS', 'Afficher les itemes ');


//--------- TAB Menu ----------
define('TAB_LIST_RESTO_NAME', 'Nom du restaurant');
define('TAB_LIST_RESTO_DESCRIPTION', 'Description');
define('TAB_LIST_RESTO_SPECIALITY', 'Spécialité');
define('TAB_LIST_RESTO_ADDRESS', 'Adresse');
define('TAB_LIST_RESTO_PHONE', 'Téléphone');
define('TAB_LIST_RESTO_RESTORATEUR', 'Restaurateur');

/* -- FO -- */

 //---------------------------------------------------------
 // Login Form
 //---------------------------------------------------------

define('FO_INDEX_WELCOME_MSG', 'Bienvenue sur le siteweb de Mon resteau express!! !'); 
define('FO_INDEX_INPUT_LOGIN', 'E-mail');
define('FO_INDEX_INPUT_PASSWORD', 'Mot de pass');
define('FO_INDEX_BT_CONNECT', 'connecter');
define('FO_INDEX_BT_CANCEL', 'Anuller');
define('FO_INDEX_NEW_CUSTOMER', 'Nouveau client!'); 


define('CREAT_ACCOUNT_MSG', 'Nouveau sur notre site?? <br /> '
 . 'Inscrivez-vous et déguster les meilleurs plats de la ville!!');
define('NEWACCOUNT', 'Creer un compte');

//------- BTs ----------------------------------------------

define('BT_VOID', 'Vider');
define('BT_SUBMIT', 'Enregistrer');
define('BT_UPDATE', 'Modifier');
define('BT_DELETE', 'Supprimer');
define('BT_SHOW_MENUS', 'Afficher les menus');
define('BT_ORDER', 'Commander');
define('BT_CHECKOUT', 'Passer la casisse');

/* -- BO -- */

//---------------------------------------------------------
 // BackOffice_index
 //--------------------------------------------------------- 

define('BACKOFFICE_INDEX_INPUT_LOGIN', 'Login');
define('BACKOFFICE_INDEX_INPUT_PASSWORD', 'Mot de pass');

define('BACKOFFICE_INDEX_BT_CONNECT', 'connecter');
define('BACKOFFICE_INDEX_BT_CANCEL', 'Anuller');

define('BACKOFFICE_INDEX_GO_RESET_PASSWORD', 'Mot de pass oblier??'); 


 //---------------------------------------------------------
 // Vertical Menu 
 //--------------------------------------------------------- 
define('NAV_List_RESTAURANTS', 'Nos restaurants');
define('NAV_List_MENUS', 'Nos menus');
define('TAX_ORDER', 'Tax');
define('TTC_ORDER', 'Total a payer');

define('NAV_List_LOGIN', 'Login');


 //---------------------------------------------------------
 // V_Menu
 //--------------------------------------------------------- 
define('BO_NAV_HOME', 'Acceuil');
define('BO_NAV_RESTAURANT', 'Restaurants');
define('BO_NAV_ADD_RESTAURANT', 'Ajouter un restaurant');
define('BO_NAV_List_RESTAURANTS', 'Liste des restaurants');
define('BO_NAV_MENU', 'Menus');
define('BO_NAV_ADD_MENU', 'Ajouter un menu');
define('BO_NAV_List_MENU', 'Liste des menus');
define('BO_NAV_RESTAURATEUR', 'Restaurateur');
define('BO_NAV_ADD_RESTAURATEUR', 'Ajouter un restaurateur');
define('BO_NAV_List_RESTAURATEUR', 'liste restaurateurs');
define('BO_NAV_MY_ACCOUNT', 'Mon compte');
define('BO_NAV_MY_ACCOUNT_VIEW', 'Afficher mon compte');
define('BO_NAV_MY_ACCOUNT_LOGOUT', 'Se déconnecter');

 //---------------------------------------------------------
 // BackOffice_Menu
 //--------------------------------------------------------- 

define('BO_MAINE_WELCOME', 'Bienvenu');

 //---------------------------------------------------------
 // new User Form 
 //---------------------------------------------------------
define('FORM_NAME', 'Ajouter Un nouveau Restorateur');
define('FORM_INPUT_FIRSTNAME', 'Prenom');
define('FORM_INPUT_PH_FIRSTNAME', '');
define('FORM_INPUT_LASTNAME', 'Nom');
define('FORM_INPUT_PH_LASTNAME', '');
define('FORM_INPUT_EMAIL', 'E-mail');
define('FORM_INPUT_PH_EMAIL', '');
define('FORM_INPUT_PASSWORD', 'Mot de passe');
define('FORM_INPUT_PH_PASSWORD', '');
define('FORM_INPUT_PASSWORD_CONFIRM', 'Confirmer Mot de passe');
define('FORM_INPUT_PH_PASSWORD_CONFIRM', '');
define('FORM_INPUT_ADDRESS', 'Addresse');
define('FORM_INPUT_PH_ADDRESS', '');
define('FORM_INPUT_PHONE', 'Telephone');
define('FORM_INPUT_PH_PHONE', '');
define('FORM_INPUT_BIRTHDAY', 'Anniversaire');
define('FORM_INPUT_PH_BIRTHDAY', '');

define('FORM_INPUT_RESTO_NAME', 'Nom');
define('FORM_INPUT_PH_RESTO_NAME', '');
define('FORM_INPUT_RESTO_DISCRIPTION_FR', 'Discription en francais');
define('FORM_INPUT_PH_RESTO_DISCRIPTION_FR', '');
define('FORM_INPUT_RESTO_DISCRIPTION_EN', 'Discription en anglais');
define('FORM_INPUT_PH_RESTO_DISCRIPTION_EN', '');
define('FORM_INPUT_RESTO_SPECIALITE', 'Specialité');
define('FORM_INPUT_PH_RESTO_SPECIALITE', '');

define('ADD_NEW_MENU_FOR_RESTORANT', 'Definire un nouveau menu pour ');

define('FORM_INPUT_MENU_NAME_FR', 'Nom du menu en francais ');
define('FORM_INPUT_PH_MENU_NAME_FR', '');
define('FORM_INPUT_MENU_NAME_EN', 'Nom du menu en anglais');
define('FORM_INPUT_PH_MENU_NAME_EN', '');

define('FORM_INPUT_PLAT_NAME_FR', 'Nom du plat en francais ');
define('FORM_INPUT_PH_PLAT_NAME_FR', '');
define('FORM_INPUT_PLAT_NAME_EN', 'Nom du plat en anglais');
define('FORM_INPUT_PH_PALT_NAME_EN', '');

define('FORM_INPUT_PLAT_PRICE', 'Prix');
define('FORM_INPUT_PH_PALT_PRICE', '');
define('FORM_INPUT_PLAT_DESCRIPTION_FR', 'descreption du plat en francais');
define('FORM_INPUT_PH_PALT_DESCRIPTION_FR', '');
define('FORM_INPUT_PLAT_DESCRIPTION_EN', 'descreption du plat en anglais');
define('FORM_INPUT_PH_PALT_DESCRIPTION_EN', '');

define('FORM_INPUT_PLAT_NAME', 'Nom du plat ');
define('FORM_INPUT_PLAT_DESCRIPTION', 'descreption');
define('MENU_NAME', 'Menu');

define('ADD_NEW_PLAT_TO_MENU', 'Ajouter un nouveau plat au menu');

//---------------------------------------------
// err messages
//---------------------------------------------
define('ERR_MISSING_RESTEURATEUR', 'Un restaurateur doit être assigné au restaurant');
define('NO_MENU_FOUND', ' Ce menu est en construction !!');

define('NEW_DELEIVER_INFORMATION', 'information de livraison');
define('FORM_DELIVERY_DATE', ' date de livraison');
define('FORM_DELIVERY_TIME', ' Heur de livraison');
define('FORM_DELIVERY_ADDRESS', ' Addresse de livraison');

//-----------------------
//      front Office
//-----------------------

define('FO_MAKE_AN_ORDER', 'Faire une commande');
define('TOTAL_ORDER', 'Grand total');
define('ORDER_DONE', 'votre commande à été enregistré , veuillez noter le # de la commande : #');