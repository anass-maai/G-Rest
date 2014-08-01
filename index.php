<?php
require('app/core/autoloader.php');

/*
 * define routes
 */
// first page to display <index>:
Router::get('/',        'MainController@index');
Router::get('/(:any)',  'MainController@index');
Router::get ('/login',  'MainController@login');
Router::post('/login',  'MainController@login');
Router::get('/logout',  'MainController@logout');

// lang management and routing
Router::get('/lang', 'LangRouter@index');
Router::get('/lang/(:any)', 'LangRouter@index');
Router::get('/lang/(:any)/(:all)', 'LangRouter@index');

/******* BEGIN GENERAL ********/
Router::get('/restaurant/list'  , 'fo/User@displayListRestaurants');
Router::get('/menu/list'        , 'fo/User@displayListMenu');

/*******  END GENERAL  ********/

//---------------------- BEGIN router for Back office --------------------------
//--> Bigen admin 
Router::get ('/admin/main'                      ,'bo/admin/admin@main');
Router::get ('/admin/test/(:any)'               ,'bo/admin/admin@test');
Router::get ('/admin/newRestaurateur'           ,'bo/admin/admin@newRestaurateur');
Router::post('/admin/addRestaurateur'           ,'bo/admin/admin@addRestaurateur');
Router::get ('/admin/restorateurs/List'         ,'bo/admin/admin@displayListRestaurateurs');
Router::get ('/admin/restorateurs/List/(:num)'  ,'bo/admin/admin@displayListRestaurateurs');
Router::get ('/admin/newResrtorant'             ,'bo/admin/admin@newResrtorant');
Router::post('/admin/addResrtorant'             ,'bo/admin/admin@addResrtorant');
Router::get ('/admin/Restaurateur/info/(:num)'  ,'fo/user@addInfo');

//******* BEGIN Restaurateur ********/
Router::get ('/restaurateur/main'               , 'bo/restaurateur/restaurateur@main');

Router::post('/restaurateur/showMenu/(:num)'    , 'bo/restaurateur/restaurateur@showMenu');
Router::post('/restaurateur/addMenu'            , 'bo/restaurateur/restaurateur@addMenu');
Router::get ('/restaurateur/addMenu/(:num)'     , 'bo/restaurateur/restaurateur@addMenu');
Router::get ('/restaurateur/menu/List'          , 'bo/restaurateur/restaurateur@displayMenuList');
Router::get ('/restaurateur/menu/List/(:num)'   , 'bo/restaurateur/restaurateur@displayMenuList');
Router::post('/restaurateur/menu/update'                , 'bo/restaurateur/restaurateur@updateMenu');
Router::get ('/restaurateur/menu/update/(:num)'         , 'bo/restaurateur/restaurateur@updateMenu');
Router::get ('/restaurateur/menu/delete/(:num)'         , 'bo/restaurateur/restaurateur@updateMenu');


Router::get ('/restaurateur/restaurants/List'            , 'bo/restaurateur/restaurateur@displayListResrtorants');
Router::get ('/restaurateur/restaurants/List/(:num)'     , 'bo/restaurateur/restaurateur@displayListResrtorants');

Router::get  ('/restaurateur/plates/list'                  , 'bo/restaurateur/restaurateur@displayPlatesList');
Router::get  ('/restaurateur/plates/list/(:num)'           , 'bo/restaurateur/restaurateur@displayPlatesList');
Router::post ('/restaurateur/plates/addnew'               , 'bo/restaurateur/restaurateur@addPlat');
Router::get  ('/restaurateur/plates/addnew/(:num)'        , 'bo/restaurateur/restaurateur@addPlat');
Router::post ('/restaurateur/plates/update'               , 'bo/restaurateur/restaurateur@updatePlat');
Router::get  ('/restaurateur/plates/update/(:num)'        , 'bo/restaurateur/restaurateur@updatePlat');
Router::get  ('/restaurateur/plates/delete/(:num)'        , 'bo/restaurateur/restaurateur@deletePlat');

//******* Bigen resrtorant *********/
Router::post('/restaurants/update'                  , 'bo/admin/admin@updateResrtorant');
Router::get('/restaurants'                          , 'bo/admin/admin@updateResrtorant');
Router::get('/restaurants/update/(:num)'            , 'bo/admin/admin@updateResrtorant');
Router::get('/admin/restaurants/List'               , 'bo/admin/admin@displayListResrtorants');
Router::get('/admin/restaurants/List/(:num)'        , 'bo/admin/admin@displayListResrtorants');
Router::get('/admin/restaurants/delete/(:num)'      , 'bo/admin/admin@deleteResrtorant');

//-- End resrtorant

//----------------------  End routers for Back office  ------------------------- 

//---------------------- BEGIN router for front office -------------------------
/******* BEGIN CLT ********/
Router::get ('/user'                , 'fo/user@main');
Router::get ('/user/newUser'        , 'fo/user@newUser');
Router::post('/user/addUser'        , 'fo/user@addUser');
Router::get ('/user/update'         , 'fo/user@updateUser');
Router::post('/user/update'         , 'fo/user@updateUser');
Router::get ('/user/update/(:num)'  , 'fo/user@updateUser');
Router::get ('/user/info'           , 'fo/user@userInfo');
Router::get ('/user/info/(:num)'    , 'fo/user@userInfo');
Router::get ('/user/info/id/(:num)' , 'fo/user@userInfo');

/*******  END CLT  ********/
Router::get ('/order/step1'                  , 'fo/CmdController@displayListResrtorants');
Router::get ('/order/step1/(:num)'           , 'fo/CmdController@displayListResrtorants');
Router::get ('/order/step2/(:num)'           , 'fo/CmdController@displayListMenu');
Router::get ('/order/step2/(:num)/(:num)'    , 'fo/CmdController@displayListMenu');
Router::get ('/order/step3/(:num)'           , 'fo/CmdController@displayListPlats');
Router::get ('/order/step3/(:num)/(:num)'    , 'fo/CmdController@displayListPlats');
Router::post ('/order/step4'                 , 'fo/CmdController@newCmd');
Router::get ('/order/step4'                  , 'fo/CmdController@newCmd');
Router::post ('/order/step5'                 , 'fo/CmdController@cmdReview');
Router::get ('/order/step5'                  , 'fo/CmdController@cmdReview');
Router::post ('/order/step6'                 , 'fo/CmdController@checkOut');
Router::get ('/order/step6'                  , 'fo/CmdController@checkOut');
Router::post ('/order/save'                 , 'fo/CmdController@saveCmd');
Router::get ('/order/save'                  , 'fo/CmdController@saveCmd');



Router::post ('/order/address/list'          , 'fo/CmdController@display_address_list');
Router::get ('/order/address/list/'          , 'fo/CmdController@display_address_list');
Router::get ('/order/address/list/(:num)'    , 'fo/CmdController@display_address_list');






Router::get ('/menus/List/(:num)'            , 'fo/CmdController@displayListResrtorants');
Router::get ('/menus/List/(:num)'            , 'fo/CmdController@displayListResrtorants');








//----------------------  END router for front office  -------------------------

//------------------------------ BEGIN ERRORS ----------------------------------
//if no route found
Router::error('error@index');

//execute matched routes
Router::dispatch();
ob_flush();
