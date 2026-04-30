<?php include('req.php') ?>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-menu" data-col="1-column">
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="../assets/img/logo.gif"  width="200" alt="branding logo">
                    </div>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body pt-0">
                    <form class="form-horizontal" id="login">
                      <input type="hidden" name="act" value="ConnexionM">
                      <fieldset class="form-group floating-label-form-group">
                        <label for="user-name">البريد الالكتروني</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="البريد الالكتروني">
                        <span class="invalid hint" id="checkMail"></span>
                      </fieldset>
                      <fieldset class="form-group floating-label-form-group mb-1">
                        <label for="user-password">كلمة المرور</label>
                        <input type="password" name="psw" class="form-control" id="psw" placeholder="كلمة المرور">
                        <span class="invalid hint" id="checkPsw"></span>
                        <span class="invalid hint" style="text-align: center;font-weight: bold;" id="checkPsd"></span>
                      </fieldset>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> ارسل</button>
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
  <script src="assets/jquery-2.2.4.min.js"></script>
  <script src="assets/config.js" type="text/javascript"></script>
</body>
</html>