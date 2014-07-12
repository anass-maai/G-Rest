
<nav class="navbar navbar-inverse" role="navigation">
<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= DIR ?>user/main">Gestion restaurant</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><?= BO_NAV_HOME ?></a></li>
        <li><a href="<?= DIR ?>restaurant/list"><?= NAV_List_RESTAURANTS ?></a></li>       
        <li><a href="<?= DIR ?>menu/list"><?= NAV_List_MENUS ?></a>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php  //if logged ingo to admin front page
                if (session::get('loggin')==true){ 
                   $user=session::get('user');
                  
                   echo ('<li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$user[0]->prenom .' '. $user[0]->nom.'<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="'.DIR.'user/info">'.BO_NAV_MY_ACCOUNT_VIEW.'</a></li>
                                <li class="divider"></li>
                                <li><a href="'.DIR.'logout">'.BO_NAV_MY_ACCOUNT_LOGOUT.'</a></li>
                            </ul>
                         </li>');
                }else{
                   echo ('<li><a href="'.DIR.'">'. NAV_List_LOGIN.'</a></li>');
                }
             ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>