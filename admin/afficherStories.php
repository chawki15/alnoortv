<?php include('req.php') ?>
<?php
$storyMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    if ($id > 0 && ($_POST['act'] ?? '') === 'delete') {
        DeleteStory($pdo, $id);
        $storyMessage = 'تم حذف الستوري.';
    } elseif ($id > 0 && ($_POST['act'] ?? '') === 'toggle') {
        ToggleStoryStatus($pdo, $id);
        $storyMessage = 'تم تحديث حالة الستوري.';
    }
}
$stories = GetAdminStories($pdo);
?>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    <?php include('include/header.php') ?>
    <?php include('include/sidebar.php') ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-10 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الستوري</a></li>
                                <li class="breadcrumb-item active">عرض الكل</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-2 col-12 btn-add">
                    <a class="btn btn-sm round btn-danger btn-glow" href="addStory.php">إضافة ستوري جديد</a>
                </div>
            </div>
            <div class="content-body">
                <section id="multi-column">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <?php if ($storyMessage !== '') { ?><div class="alert alert-success"><?php echo htmlspecialchars($storyMessage, ENT_QUOTES, 'UTF-8'); ?></div><?php } ?>
                                        <table id="list" class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>الرقم</th>
                                                    <th>صورة</th>
                                                    <th>عنوان</th>
                                                    <th>الاجراءات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($stories as $story) { ?>
                                                    <tr>
                                                        <td><?php echo (int)$story['id']; ?></td>
                                                        <td><img src="../assets/stories/<?php echo htmlspecialchars($story['thumb'], ENT_QUOTES, 'UTF-8'); ?>" alt="" style="width:60px;height:80px;object-fit:cover;border-radius:6px"></td>
                                                        <td><?php echo htmlspecialchars($story['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>
                                                            <form method="post" style="display:inline-block">
                                                                <input type="hidden" name="id" value="<?php echo (int)$story['id']; ?>">
                                                                <input type="hidden" name="act" value="toggle">
                                                                <button class="btn btn-sm btn-outline-info round" type="submit">تفعيل/إيقاف</button>
                                                            </form>
                                                            <form method="post" style="display:inline-block" onsubmit="return confirm('هل تريد الحذف؟');">
                                                                <input type="hidden" name="id" value="<?php echo (int)$story['id']; ?>">
                                                                <input type="hidden" name="act" value="delete">
                                                                <button class="btn btn-sm btn-outline-danger round" type="submit">حذف</button>
                                                            </form>
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