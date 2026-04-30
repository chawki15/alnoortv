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
                <li class="breadcrumb-item"><a href="">الفئات الفرعية</a>
                </li>
                <li class="breadcrumb-item active">إضافة فئة فرعية جديد
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
                    <form class="form form-horizontal" id="sousCat">
                    <input type="hidden" name="act" value="addSousCat">
                      <div class="form-body">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput1">اختر اسم الفئة</label>
                          <div class="col-md-9">
                            <select class="form-control" name="selectCategory" id="selectCategory">
                                <option value="">اسم الفئة</option>
                                <?php 
                                    list($id,$name) = GetAdminCategories($db);
                                    for($i=0;$i<sizeof($id);$i++)
                                    {
                                ?> 
                                <option value="<?php echo $id[$i] ?>" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php  echo $name[$i] ?></font></font></option>
                                <?php } ?>
                            </select>
                            <span class="invalid hint" id="checkSelectCat"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">اسم الفئة الفرعية</label>
                          <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="اسم الفئة الفرعية" name="sousCategory" id="sousCategory">
                            <span class="invalid hint" id="checkSousCat"></span>
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