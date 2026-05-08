<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="la la-bars" style="font-size:32px;"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="modern admin logo" src="../assets/img/logo.gif">
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left"></ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">مرحبا,
                  <span class="user-name text-bold-700"><?php echo $d1['name'] ?></span>
                </span>
                <span class="avatar avatar-online">
                  <img src="assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
              <?php if(loggedAdmin($pdo)){ ?>
                <a class="dropdown-item" href="addUser.php"><i class="ft-user"></i> إضافة حساب جديد</a>
                <div class="dropdown-divider"></div>
              <?php } ?>
                <a class="dropdown-item" href="deconnexion.php"><i class="ft-power"></i>  تسجيل الخروج </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>