<?php
include('req.php');

$perPage = 100;
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($currentPage - 1) * $perPage;
$isSuperAdmin = loggedAdmin($pdo);
$currentAdminId = (int) GetIdUser($pdo);
$missingImagesCount = $isSuperAdmin ? count_missing_news_images($pdo) : 0;

$rows = [];
$totalRows = 0;

if ($pdo instanceof PDO) {
  if ($isSuperAdmin) {
    $countStmt = $pdo->query('SELECT COUNT(*) FROM news WHERE id_category NOT IN (11,15)');
    $totalRows = (int) $countStmt->fetchColumn();

    $stmt = $pdo->prepare('
      SELECT n.id, n.titre, n.photo, n.id_pseudo, n.id_category, a.name AS author_name, c.name AS category_name
      FROM news n
      LEFT JOIN admin a ON a.id = n.id_pseudo
      LEFT JOIN categories c ON c.id = n.id_category
      WHERE n.id_category NOT IN (11,15)
      ORDER BY n.id DESC
      LIMIT :limit OFFSET :offset
    ');
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
  } else {
    $countStmt = $pdo->prepare('SELECT COUNT(*) FROM news WHERE id_pseudo = :admin_id AND id_category NOT IN (11,15)');
    $countStmt->execute([':admin_id' => $currentAdminId]);
    $totalRows = (int) $countStmt->fetchColumn();

    $stmt = $pdo->prepare('
      SELECT n.id, n.titre, n.photo, n.id_pseudo, n.id_category, a.name AS author_name, c.name AS category_name
      FROM news n
      LEFT JOIN admin a ON a.id = n.id_pseudo
      LEFT JOIN categories c ON c.id = n.id_category
      WHERE n.id_pseudo = :admin_id AND n.id_category NOT IN (11,15)
      ORDER BY n.id DESC
      LIMIT :limit OFFSET :offset
    ');
    $stmt->bindValue(':admin_id', $currentAdminId, PDO::PARAM_INT);
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
  }
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$totalPages = max(1, (int) ceil($totalRows / $perPage));
if ($currentPage > $totalPages) {
  $currentPage = $totalPages;
}

$maxVisiblePages = 6;
$startPage = max(1, $currentPage - (int) floor($maxVisiblePages / 2));
$endPage = $startPage + $maxVisiblePages - 1;
if ($endPage > $totalPages) {
  $endPage = $totalPages;
  $startPage = max(1, $endPage - $maxVisiblePages + 1);
}
?>
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
                  <li class="breadcrumb-item"><a href="">الأخبار</a>
                  </li>
                  <li class="breadcrumb-item active">عرض الكل
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-2 col-12 btn-add">
            <?php if(loggedAdmin($pdo)){ ?>
               <a class="btn btn-sm round btn-outline-primary btn-glow mb-1" href="migrateNewsImages.php">تحديث صور الأخبار</a>
                <span class="badge badge-warning d-block mt-1">الصور غير الموجودة: <?php echo (int)$missingImagesCount; ?></span>
            <?php } ?>
            <a class="btn btn-sm round btn-danger btn-glow" href="addNews.php">إضافة خبر جديد</a>
          </div>
      </div>
      <div class="content-body">
        <?php if(isset($_GET['migrated']) && isset($_SESSION['news_migration_result'])){ $migrateResult = $_SESSION['news_migration_result']; unset($_SESSION['news_migration_result']); ?>
          <div class="alert alert-info">
            تم تحديث الصور: <?php echo (int)($migrateResult['updated'] ?? 0); ?> |
            تم التجاوز: <?php echo (int)($migrateResult['skipped'] ?? 0); ?>
          </div>
        <?php } ?>
        <section id="multi-column">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table id="list" class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                        <?php if(loggedAdmin($pdo)){ ?>
                          <th style="width: 15%;">الكاتب</th>
                        <?php }else{ ?>
                          <th style="width: 15%;">الرقم</th>
                        <?php } ?>
                          <th style="width: 10%;">القسم</th>
                          <th style="width: 30%;">عنوان الخبر</th>
                          <th style="width: 15%;"> صورة الخبر </th>
                          <th style="width: 30%;">الاجراءات</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($rows as $row){
                          $id = (int)($row['id'] ?? 0);
                          $title = htmlspecialchars((string)($row['titre'] ?? ''), ENT_QUOTES, 'UTF-8');
                          $author = htmlspecialchars((string)($row['author_name'] ?? ''), ENT_QUOTES, 'UTF-8');
                          $category = htmlspecialchars((string)($row['category_name'] ?? ''), ENT_QUOTES, 'UTF-8');
                          $rawPhoto = (string)($row['photo'] ?? '');
                          $thumbPhoto = news_image_name($rawPhoto, 300);
                          $photoName = $thumbPhoto !== '' ? $thumbPhoto : $rawPhoto;
                          $photoEscaped = htmlspecialchars($photoName, ENT_QUOTES, 'UTF-8');
                           $photoExists = ($photoName !== '') && is_file(__DIR__ . '/../assets/img/news/' . $photoName);
                        ?>
                        <tr>
                        <?php if(loggedAdmin($pdo)){ ?>
                          <td><?php echo $author; ?></td>
                        <?php }else{ ?>
                          <td><?php echo $id; ?></td>
                        <?php } ?>
                          <td><?php echo $category; ?></td>
                          <td><?php echo $title; ?></td>
                          <td>
                              <div class="avatar avatar-sm pull-up">
                                <?php if($photoExists){ ?>
                                  <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="../assets/img/news/<?php echo $photoEscaped; ?>" alt="Avatar" width="64" height="64" loading="lazy" decoding="async">
                                <?php }else{ ?>
                                  <span>No image</span>
                                <?php } ?>
                              </div>
                          </td>
                          <td>
                            <a class="btn btn-sm btn-outline-info round" href="modNews.php?u=<?php echo $id; ?>">تعديل</a>
                            <a class="btn btn-sm btn-outline-danger round delete-news" data-id="<?php echo $id; ?>" >حذف</a>
                            <a class="btn btn-sm btn-outline-warning round" href="seo.php?s=<?php echo $id; ?>&v=news">السيو</a>
                            <a class="btn btn-sm btn-outline-warning round" href="<?php echo 'https://www.alnoortv.ma/news/'.cripter($row['id'],264).'-'.replace($row['titre']).'.html';  ?>">link</a>
                          </td>
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
                    <nav aria-label="pagination">
                      <ul class="pagination justify-content-center mt-2">
                        <li class="page-item <?php echo $currentPage === 1 ? 'disabled' : ''; ?>">
                          <a class="page-link" href="?page=1">البداية</a>
                        </li>
                        <?php for($p=$startPage; $p<=$endPage; $p++){ ?>
                          <li class="page-item <?php echo $p === $currentPage ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>
                          </li>
                        <?php } ?>
                        <li class="page-item <?php echo $currentPage === $totalPages ? 'disabled' : ''; ?>">
                          <a class="page-link" href="?page=<?php echo $totalPages; ?>">النهاية</a>
                        </li>
                      </ul>
                    </nav>
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