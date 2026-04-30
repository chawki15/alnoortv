<header class="header">
  <div class="top-menu bg-secondary">
    <div class="container">
      <nav class="navbar navbar-expand navbar-dark p-0">
        <div id="navbar-mobile" class="collapse navbar-collapse nav-top-mobile">
          <ul class="navbar-nav mll-auto text-center">
            <li class="nav-item"><time class="navbar-text mr-2" datetime="2019-10-28">
                <?php echo GetAujordhui(date("Y-m-d")) ?>
              </time></li>
           <li class="nav-item">
              <button class="switch" id="switchh">
                <span><i class="fas fa-sun"></i></span>
                <span><i class="fas fa-moon"></i></span>
              </button>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto text-center">
            <li>
              <a href="" class="nav-link" rel="noopener" target="_blank"><i class="fab fa-instagram fa-2x"></i> </a>
            </li>
            <li>
              <a href="" class="nav-link"  rel="noopener" target="_blank"><i class="fab fa-twitter fa-2x"></i> </a>
            </li>
            <li class="menu-item ">
              <a href="" class="nav-link" rel="noopener" target="_blank"><i class="fab fa-facebook fa-2x"></i> </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <div class="full-nav six-menu bg-white border-lg-1">
    <div class="container">
      <nav id="main-menu" class="main-logo my-2 my-lg-12 d-lg-block text-center">
        <div class="nav-logo6">
          <a class="navbar-brand" href="./">
            <img class="img-fluid logo-six" id="imgD" alt="النور - جريدة إلكترونية مغربية" src="assets/img/logo.gif">
          </a>
        </div>
      </nav>
    </div>
  </div>
</header>
<div id="showbacktop" class="full-nav bg-black border-none border-lg-1 border-bottom shadow-b-sm py-0">
  <div class="container">
    <nav id="main-menu" class="main-menu navbar navbar-expand-lg navbar-dark px-2 px-lg-0 py-0">
      <a id="showLeftPush" class="navbar-toggler side-hamburger border-0 px-0 my-2"
        href="<?php echo str_replace('/alnoor/','',$_SERVER['REQUEST_URI']).'#'; ?>">
        <span class="hamburger-icon">
          <span></span><span></span><span></span><span></span>
        </span>
      </a>
      <button class="navbar-toggler px-0 my-2" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo2"
        aria-controls="navbarTogglerDemo2" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-search"></span>
      </button>
      <div id="navbarTogglerDemo1" class="collapse navbar-collapse hover-mode">

        <ul id="left-main" class="navbar-nav main-nav navbar-uppercase mx-auto first-left-lg-0">
          <li class="menu-item">
            <a title="الصفحة الرئيسية" href="./" class="nav-link">الرئيسية</a>
          </li>
          <?php 
							list($id,$name) = GetAdminMenu($db);
								for($i=0;$i<sizeof($id);$i++){ $f = CountSousMenuByMenu($db,$id[$i]); if($f == 0){
						?>
          <li class="menu-item ">
            <a title="<?php  echo $name[$i] ?>" href="<?php  echo str_replace(' ','-',$name[$i]).'/' ?>" class="nav-link"><?php  echo $name[$i] ?></a>
          </li>
          <?php }else{ ?>
          <li class="menu-item dropdown mega-dropdown">
            <a title="<?php  echo $name[$i] ?>" href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><?php  echo $name[$i] ?></a>
            <ul class="dropdown-menu d" aria-labelledby="menu-item-dropdown-1513" role="menu">
              <?php list($idss,$idcats,$nom)  = GetSousMenuByMenu($db,$id[$i]); for($j=0;$j<sizeof($idss);$j++) { ?>
              <li class="menu-item">
                <a title="<?php  echo $name[$i].''.$nom[$j] ?>"
                  href="<?php  echo str_replace(' ','-',$name[$i]).'-'.str_replace(' ','-',$nom[$j]).'/' ?>"
                  class="dropdown-item"><?php  echo $nom[$j] ?></a></li>
              <?php } ?>
            </ul>
          </li>
          <?php } } ?>
        </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="#" data-toggle="collapse" data-target="#navbarTogglerDemo2"
            aria-controls="navbarTogglerDemo2" aria-expanded="false" aria-label="Toggle navigation"><i
              class="fa fa-search"></i></a></li>
        </ul>
      </div>
    </nav>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo2">
      <div class="col-12 py-2">
        <form class="form-inline" action="#">
          <div class="input-group w-100 bg-white">
            <input type="text" class="form-control border border-right-0" placeholder="ابحث" aria-label="search">
            <div class="input-group-prepend bg-light-dark">
              <button class="btn bg-transparent border-left-0 input-group-text border" type="submit"><i
                  class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="mobile-side">
  <a href="<?php echo str_replace('/test/','',$_SERVER['REQUEST_URI']).'#'; ?>" class="back-menu">
    <span class="hamburger-icon open">
      <span></span><span></span><span></span><span></span>
    </span>
  </a>
  <nav id="mobile-menu" class="menu-mobile d-flex flex-column push push-left shadow-r-sm bg-yellow">
    <div class="mobile-content mb-auto">
      <div class="logo-sidenav p-2">
        <a href="#">
          <img src="assets/img/logoo.gif" class="img-fluid">
        </a>
      </div>
      <div class="sidenav-menu">
        <nav class="navbar navbar-inverse">
          <ul id="side-menu" class="nav navbar-nav list-group list-unstyled side-link">
            <li class="menu-item">
              <a title="الصفحة الرئيسية" href="./" class="nav-link">الرئيسية</a>
            </li>
            <?php 
							list($id,$name) = GetAdminMenu($db);
								for($i=0;$i<sizeof($id);$i++){ $f = CountSousMenuByMenu($db,$id[$i]); if($f == 0){
						?>
            <li class="menu-item ">
              <a title="<?php  echo $name[$i] ?>" href="<?php  echo str_replace(' ','-',$name[$i]).'/' ?>" class="nav-link"><?php  echo $name[$i] ?></a>
            </li>
            <?php }else{ ?>
            <li class="menu-item dropdown mega-dropdown">
              <a title="<?php  echo $name[$i] ?>" href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"><?php  echo $name[$i] ?></a>
              <ul class="dropdown-menu d" aria-labelledby="menu-item-dropdown-1513" role="menu">
                <?php list($idss,$idcats,$nom)  = GetSousMenuByMenu($db,$id[$i]); for($j=0;$j<sizeof($idss);$j++) { ?>
                <li class="menu-item">
                  <a title="<?php  echo $name[$i].''.$nom[$j] ?>"
                    href="<?php  echo str_replace(' ','-',$name[$i]).'-'.str_replace(' ','-',$nom[$j]).'/' ?>"
                    class="dropdown-item"><?php  echo $nom[$j] ?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } } ?>

          </ul>
        </nav>
      </div>
    </div>
    <div class="mobile-copyright mt-5 text-center">
      <p>جميع الحقوق محفوظة ALNOOR 2022</p>
    </div>
  </nav>
</div>