<?php include('req.php') ?>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
  data-menu="vertical-menu" data-col="2-columns">
  <?php include('include/header.php') ?>
  <?php include('include/sidebar.php') ?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">فيديو</a>
                </li>
                <li class="breadcrumb-item active">إضافة فيديو جديد
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <section id="horizontal-form-layouts">
          <div class="row justify-content-md-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-content collpase show">
                  <div class="card-body">
                    <form class="form form-horizontal" id="video">
                      <input type="hidden" name="act" value="addVideo">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">اختر اسم الفئة</label>
                              <div class="col-md-10">
                                <select class="form-control" name="selectCategory" id="selectCategory">
                                  <option value="">اسم الفئة</option>
                                  <?php 
                                        list($id,$name) = GetAdminVedions($pdo);
                                        for($i=0;$i<sizeof($id);$i++)
                                        {
                                          $f = CountSousMenuByMenu($pdo,$id[$i]);

                                          if($f == 0){
                                    ?>
                                  <option value="<?php echo $id[$i].'#' ?>">
                                    <font style="vertical-align: inherit;">
                                      <font style="vertical-align: inherit;"><?php  echo $name[$i] ?></font>
                                    </font>
                                  </option>
                                  <?php
                                          }else{
                                          list($idss,$idcats,$nom)  = GetSousMenuByMenu($pdo,$id[$i]);
                                          for($j=0;$j<sizeof($idss);$j++)
                                        {
                                    ?>
                                  <option value="<?php echo $idcats[$i].'#'.$idss[$j] ?>">
                                    <font style="vertical-align: inherit;">
                                      <font style="vertical-align: inherit;"><?php  echo $name[$i].' : '.$nom[$j]; ?>
                                      </font>
                                    </font>
                                  </option>
                                  <?php }} ?>
                                  <?php } ?>
                                </select>
                                <span class="invalid hint" id="checkSelectCat"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان الخبر</label>
                              <div class="col-md-10">
                                  <input type="text" id="titleVideo" class="form-control" maxlength="140" placeholder="عنوان الفيديو" name="titleVideo">
                                  <span class="invalid hint" id="checkTitleVideo"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان الفيديو</label>
                              <div class="col-md-10">
                                <input type="text" class="form-control" id="utlVideo" name="utlVideo" placeholder="http://">
                                <span class="invalid hint" id="checkUrlVideo"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">صورة الخبر</label>
                              <div class="col-md-10">
                                <div class="list">
                                  <div class="group-image image-1">
                                    <input name="1" onchange="readURL();" id="1" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp">
                                      <div class="progress-bar"></div>
                                      <div class="status">0%</div>
                                    </div>
                                    <div id="wn1">photo jpeg / jpg / png ... </div>
                                    <div id="taille1">File size > 4.5 MB </div>
                                    <div id="whiteMax1">Ajouter photo avec 600*300</div>
                                    <div class="description" id="desc-1">
                                      <span class="invalid hint" id="checkPhoto"></span>
                                      <label id="choose-1" for="1"><i class="fa fa-camera"
                                          aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photo" name="photo" value="">
                                    <div class="close" id='close-1' onclick="app();" data-sup="1"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان الخبر</label>
                              <div class="col-md-10">
                                <textarea name="desc" id="desc"></textarea>
                                <span class="invalid hint" id="checkDescription"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <button type="submit" class="btn btn-dark btn-min-width add">
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