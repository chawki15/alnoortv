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
                <li class="breadcrumb-item"><a href="">السيو</a>
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
                  <form class="form form-horizontal" id="seo">
                    <input type="hidden" name="act" value="<?php echo $cat ?>">
                    <input type="hidden" name="id" value="<?php echo $_GET['s']; ?>">
                      <div class="form-body">
                      <div class="row">
                          <div class="col-md-9">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" id="titleSeo" class="form-control" value="<?php echo $titre; ?>" name="titleSeo" disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="eventRegInput2">الوصف </label>
                          <div class="col-md-9">
                            <textarea class="form-control" rows="5" id="descSeo" name="descSeo"><?php echo $descSeo; ?></textarea>
                            <span class="invalid hint" id="checkDescriptionSeo"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="eventRegInput2">الكلمات الدلالية <span data-toggle="tooltip" data-placement="top" data-original-title="المرجو عند ادخال الكلمات الدلالية وضع هذه العلامة # بين الكلمتين مثال : مارادونا#أسطورة_الكرة" class="alert-icon"><i class="la la-info-circle"></i></span></label>
                            <div class="col-md-9">
                              <textarea class="form-control" rows="2" id="keyWordSeo" name="keyWordSeo"><?php echo $keyWordSeo; ?></textarea>
                              <span class="invalid hint" id="checkKeyWordSeo"></span>
                            </div>
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