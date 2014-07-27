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
Router::get ('/admin/main',             'bo/admin/admin@main');
Router::get ('/admin/test/(:any)',      'bo/admin/admin@test');
Router::get('/admin/newRestaurateur',   'bo/admin/admin@newRestaurateur');
Router::post('/admin/addRestaurateur',  'bo/admin/admin@addRestaurateur');
Router::get('/admin/restaurateursList'          , 'bo/admin/admin@displayListRestaurateurs');
Router::get ('/admin/newResrtorant'             , 'bo/admin/admin@newResrtorant');
Router::post('/admin/addResrtorant'             , 'bo/admin/admin@addResrtorant');
Router::get ('/admin/resrtorantsList'           , 'bo/admin/admin@displayListResrtorants');
Router::get ('/admin/Restaurateur/info/(:num)'  , 'fo/user@addInfo');


//-- End Admin

/******* BEGIN Restaurateur ********/ 
Router::get ('/restaurateur/main'               , 'bo/restaurateur/restaurateur@main');
Router::post('/restaurateur/addMenu'            , 'bo/restaurateur/restaurateur@addMenu');
Router::get('/restaurateur/newMenu'             , 'bo/restaurateur/restaurateur@newMenu');
Router::get('/restaurateur/changemenu/(:num)'   , 'bo/restaurateur/restaurateur@getFrmUpdateMenu'); 
Router::post('/restaurateur/updatemenu'         , 'bo/restaurateur/restaurateur@updateMenu');
Router::post('/restaurateur/uploadfile'         , 'bo/restaurateur/restaurateur@uploadFile');

/*******  END Restaurateur  ********/

//--> Bigen resrtorant
Router::get('/resrtorant'                       , 'bo/resrtorant/resrtorant@displayListResrtorant');
Router::get('/resrtorant/update/(:num)'         , 'bo/resrtorant/resrtorant@displayListResrtorant');
Router::get('/admin/restaurants/List'           , 'bo/admin/admin@displayListResrtorants');
Router::get('/admin/restaurants/List/(:num)'    , 'bo/admin/admin@displayListResrtorants');

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

//----------------------  END router for front office  -------------------------

//------------------------------ BEGIN ERRORS ----------------------------------
//if no route found
Router::error('error@index');

//execute matched routes
Router::dispatch();
ob_flush();
