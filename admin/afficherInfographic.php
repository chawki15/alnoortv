<?php include('req.php') ?>
<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <?php include('include/header.php') ?>
  <?php include('include/sidebar.php') ?>
  <div class="app-content content">
    <div class="content-wrapper">
    <div class="content-header row">
          <div class="content-header-left col-md-10 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="">انفوجرافيك</a>
                  </li>
                  <li class="breadcrumb-item active">عرض الكل
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-2 col-12 btn-add">
            <a class="btn btn-sm round btn-danger btn-glow" href="addInfographic.php">إضافة معرض الصور جديد</a>
          </div>
      </div>
      <div class="content-body">
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table id="list" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th style="width: 5%;">الرقم</th>
                          <th style="width: 10%;">صورة</th>
                          <th style="width: 45%;">عنوان</th>
                          <th style="width: 40%;">الاجراءات</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php list($id,$photo,$titre) = GetAdminInfo($db); for($i=0;$i<sizeof($id);$i++){ ?>
                        <tr>
                          <td><?php  echo $id[$i];?></td>
                          <td>
                              <div class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="../assets/img/infographics/<?php  echo $photo[$i]?>" alt="Avatar">
                              </div>
                          </td>
                          <td><?php  echo $titre[$i] ?></td>
                          <td>
                            <a class="btn btn-sm btn-outline-danger round delete-info" data-id="<?php  echo $id[$i];?>" >حذف</a>
                          </td>
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
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