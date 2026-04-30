<?php include('req.php') ?>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php include('include/header.php') ?>
  <?php include('include/sidebar.php') ?>
  <div class="app-content content">
    <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">إضافة حساب جديد</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="horizontal-form-layouts">
          <div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-content collpase show">
                  <div class="card-body">
                  <form class="form form-horizontal" id="user">
                    <input type="hidden" name="act" value="addUser">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">اسم</label>
                          <div class="col-md-9">
                            <input type="text" id="nom" class="form-control" placeholder="اسم" name="nom">
                            <span class="invalid hint" id="checkNam"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">البريد الإلكتروني </label>
                          <div class="col-md-9">
                          <input type="text" id="mail" class="form-control" placeholder="البريد الالكتروني" name="mail">
                            <span class="invalid hint" id="checkMail"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput2">كلمة المرور </label>
                            <div class="col-md-9">
                             <input type="password" id="psw" class="form-control" placeholder="كلمة المرور" name="psw">
                              <span class="invalid hint" id="checkPassword"></span>
                            </div>
                          </div>
                      </div>
                      <div class="form-actions center">
                        <button type="submit" class="btn btn-dark btn-min-width">
                          <i class="la la-check"></i> ارسل
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php include('include/script.php') ?>
  
</body>
</html>