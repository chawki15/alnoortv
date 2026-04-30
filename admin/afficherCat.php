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
                <li class="breadcrumb-item"><a href="">الاقسام الرئيسية</a>
                </li>
                <li class="breadcrumb-item active">عرض الكل
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="content-header-right col-md-2 col-12 btn-add">
          <a class="btn btn-sm round btn-danger btn-glow" href="addCat.php">إضافة قسم جديد</a>
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
                          <th>الرقم</th>
                          <th>القسم</th>
                          <th>الاجراءات</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php list($id,$name) = GetAdminCategories($db); for($i=0;$i<sizeof($id);$i++){ ?>
                        <tr>
                          <td><?php  echo $id[$i];?></td>
                          <td><?php  echo $name[$i]?></td>
                          <td>
                          <a class="btn btn-sm btn-outline-info round" href="modCat.php?u=<?php  echo $id[$i];?>">تعديل</a>
                          <a class="btn btn-sm btn-outline-warning round" href="seo.php?s=<?php  echo $id[$i];?>&v=cat">السيو</a>
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