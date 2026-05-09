<?php include('req.php') ?>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <?php include('include/header.php') ?>
  <?php include('include/sidebar.php') ?>
  <div class="app-content content">
    <div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">انفوجرافيك</a>
                </li>
                <li class="breadcrumb-item active">إضافة معرض الصور جديد
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="horizontal-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-content collpase show">
                  <div class="card-body">
                    <form class="form form-horizontal" id="infographics">
                    <input type="hidden" name="act" value="addInfographics">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان </label>
                              <div class="col-md-10">
                                <input type="text" id="titleInfographic" class="form-control" maxlength="140" placeholder="عنوان" name="titleInfographic">
                                <span class="invalid hint" id="checkTitleInfographic"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                             <label class="col-md-2 label-control" for="eventRegInput2">صورة <span data-toggle="tooltip" data-placement="top" data-original-title="سيتم إنشاء الصورة الرئيسية بحجم 1200*675" class="alert-icon"><i class="la la-info-circle"></i></span></label>
                              <div class="col-md-10">
                                <div class="list">
                                  <div class="group-image image-1">
                                    <input name="1" onchange="readURL();" id="1" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp"><div class="progress-bar"></div ><div class="status">0%</div></div>
                                    <div id="wn1">photo jpeg / jpg / png ... </div>
                                    <div id="taille1">File size > 4.5 MB </div>
                                     <div id="whiteMax1">Ajouter photo avec 1200*675</div>
                                    <div class="description" id="desc-1">
                                    <span class="invalid hint" id="checkPhotoInfographic"></span>
                                      <label id="choose-1" for="1"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoInfographic" name="photoInfographic" value="">
                                    <div class="close" id='close-1' onclick="app();" data-sup="1"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <div class="row">
                           الصور <span data-toggle="tooltip" data-placement="top" data-original-title="المرجو عند ادخال الصورة لاتقل 542*551" class="alert-icon"><i class="la la-info-circle"></i></span>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group row">
                              <div class="col-md-9">
                                <div class="list">
                                  <div class="group-image image-2">
                                    <input name="2" onchange="readURL2();" id="2" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp2"><div class="progress-bar2"></div ><div class="status2">0%</div></div>
                                    <div id="wn2">photo jpeg / jpg / png ... </div>
                                    <div id="taille2">File size > 4.5 MB </div>
                                    <div class="description" id="desc-2">
                                        <span class="invalid hint" id="checkPhotoInfographic2"></span>
                                        <label id="choose-2" for="2"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="close" id='close-2' onclick="app2();" data-sup="2"></div>
                                    <input type="hidden" id="photoInfographic2" name="photoInfographic2" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group row">
                              <div class="col-md-9">
                                <div class="list">
                                  <div class="group-image image-3">
                                    <input type="hidden" id="srcimg3" name="srcimg3" value="">
                                    <input name="3" onchange="readURL3();" id="3" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp3"><div class="progress-bar3"></div ><div class="status3">0%</div></div>
                                    <div id="wn3">photo jpeg / jpg / png ... </div>
                                    <div id="taille3">File size > 4.5 MB </div>
                                    <div class="description" id="desc-3">
                                        <span class="invalid hint" id="checkPhotoInfographic3"></span>
                                      <label id="choose-3" for="3"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <div class="close" id='close-3' onclick="app3();" data-sup="3"></div>
                                    <input type="hidden" id="photoInfographic3" name="photoInfographic3" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group row">
                              <div class="col-md-9">
                                <div class="list">
                                    <div class="group-image image-4">
                                      <input name="4" onchange="readURL4();" id="4" type="file" accept="image/jpeg,image/png">
                                      <div id="progress-wrp4"><div class="progress-bar4"></div ><div class="status4">0%</div></div>
                                      <div id="wn4">photo jpeg / jpg / png ... </div>
                                    <div id="taille4">File size > 4.5 MB </div>
                                      <div class="description" id="desc-4">
                                        <span class="invalid hint" id="checkPhotoInfographic4"></span>
                                        <label id="choose-4" for="4"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                      </div>
                                      <div class="close" id='close-4' onclick="app4();" data-sup="4"></div>
                                      <input type="hidden" id="photoInfographic4" name="photoInfographic4" value="">
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group row">
                              <div class="col-md-9">
                                <div class="list">
                                    <div class="group-image image-5">
                                      <input name="5" onchange="readURL5();" id="5" type="file" accept="image/jpeg,image/png">
                                      <div id="progress-wrp5"><div class="progress-bar5"></div ><div class="status5">0%</div></div>
                                      <div id="wn5">photo jpeg / jpg / png ... </div>
                                    <div id="taille5">File size > 4.5 MB </div>
                                      <div class="description" id="desc-5">
                                        <span class="invalid hint" id="checkPhotoInfographic5"></span>
                                        <label id="choose-5" for="5"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                      </div>
                                      <div class="close" id='close-5' onclick="app5();" data-sup="5"></div>
                                      <input type="hidden" id="photoInfographic5" name="photoInfographic5" value="">
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
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
      </div>
    </div>
  </div>
<?php include('include/script.php') ?>

 
</body>
</html>