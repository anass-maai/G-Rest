
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
      <a class="navbar-brand" href="<?= DIR ?>admin/main">Gestion restaurant</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><?= BO_NAV_HOME ?></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= BO_NAV_RESTAURANT ?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= DIR ?>admin/newResrtorant"><?= BO_NAV_ADD_RESTAURANT ?></a></li>
            <li><a href="<?= DIR ?>admin/restaurants/List"><?= BO_NAV_List_RESTAURANTS ?></a></li>
            <!-- <li class="divider"></li> -->
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= BO_NAV_RESTAURATEUR ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?= DIR ?>admin/newRestaurateur"><?= BO_NAV_ADD_RESTAURATEUR ?></a></li>
            <li><a href="<?= DIR ?>restaurateur/restaurateurList"><?= BO_NAV_List_RESTAURATEUR ?></a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
                  $user=session::get('user');
                  echo ( $user[0]->prenom .' '. $user[0]->nom); 
              ?>
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><?=BO_NAV_MY_ACCOUNT_VIEW ?></a></li>
            <li class="divider"></li>
            <li><a href="<?= DIR ?>logout"><?=BO_NAV_MY_ACCOUNT_LOGOUT ?></a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>