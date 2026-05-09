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
                <li class="breadcrumb-item"><a href="">آراء و تحليلات</a>
                </li>
                <li class="breadcrumb-item active">إضافة كاتب جديد
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
                    <form class="form form-horizontal" id="writers">
                      <input type="hidden" name="act" value="addWriter">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput1">اسم الكاتب</label>
                          <div class="col-md-9">
                            <input type="text" id="nom" class="form-control" placeholder="اسم الكاتب" name="nom">
                            <span class="invalid hint" id="checkNom"></span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">صورة الكاتب</label>
                          <div class="col-md-9">
                            <div class="list">
                                  <div class="group-image image-1">
                                    <input name="1" onchange="readURL();" id="1" type="file" accept="image/webp,image/jpeg,image/png">
                                    <div id="progress-wrp"><div class="progress-bar"></div ><div class="status">0%</div></div>
                                    <div id="wn2">photo webp / jpeg / jpg / png ... </div>
                                    <div id="whiteMax2">Ajouter photo avec 400*400</div>
                                    <div class="description" id="desc-1">
                                    <span class="invalid hint" id="checkPhoto"></span>
                                      <label id="choose-1" for="1"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photo" name="photo" value="">
                                    <div class="close" id='close-1' onclick="app();" data-sup="1"></div>
                                  </div>
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