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
                <li class="breadcrumb-item active">إضافة رأي جديد
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
                    <form class="form form-horizontal" id="opinions">
                    <input type="hidden" name="act" value="addOpinions">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">اختر اسم الكاتب</label>
                              <div class="col-md-10">
                                <select class="form-control" name="selectNom" id="selectNom">
                                    <option value="">اسم الكاتب</option>
                                    <?php 
                                        list($id,$nom,$photo) = GetAdminWriters($pdo);
                                        for($z=0;$z<sizeof($id);$z++)
                                        {

                                            echo $nom[$z];
                                    ?>
                                            <option value="<?php echo $id[$z] ?>" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php  echo $nom[$z] ?></font></font></option>

                                    <?php  } ?>
                                </select>
                                <span class="invalid hint" id="checkNom"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان المقال</label>
                              <div class="col-md-10">
                                <input type="text" id="title" value="" class="form-control" placeholder="عنوان المقال" name="title">
                                <span class="invalid hint" id="checkTitle"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">الموضوع</label>
                              <div class="col-md-10">
                                <textarea name="desc" id="desc"></textarea>
                               <span class="invalid hint" id="checkDescription"></span>
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