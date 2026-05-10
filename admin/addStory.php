<?php include('req.php') ?>

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
                                <li class="breadcrumb-item active">إضافة ستوري جديد</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-2 col-12 btn-add">
                    <a class="btn btn-sm round btn-danger btn-glow" href="afficherStories.php">عرض الكل</a>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal-form-layouts">
                    <div class="row justify-content-md-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-content collpase show">
                                    <div class="card-body">
                                        <form class="form form-horizontal" id="story">
                                            <input type="hidden" name="act" value="addStory">
                                            <div class="form-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="titleStory">العنوان</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="titleStory" class="form-control" maxlength="255" placeholder="عنوان الستوري" name="titleStory">
                                                        <span class="invalid hint" id="checkTitleStory"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="mediaFile">الملف</label>
                                                    <div class="col-md-9">
                                                        <input name="mediaFile" onchange="readStoryVideo();" id="mediaFile" type="file" class="form-control" accept="video/mp4,video/webm,video/ogg">
                                                        <input type="hidden" id="storyMedia" name="storyMedia" value="">
                                                        <div id="progress-wrp">
                                                            <div class="progress-bar"></div>
                                                            <div class="status">0%</div>
                                                        </div>
                                                        <small class="text-muted">ارفع فيديو عمودي.</small>
                                                        <span class="invalid hint" id="checkStoryMedia"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="thumbFile">الصورة المصغرة</label>
                                                    <div class="col-md-9">
                                                        <input name="thumbFile" onchange="readStoryThumb();" id="thumbFile" type="file" class="form-control" accept="image/webp,image/jpeg,image/png,image/gif">
                                                        <input type="hidden" id="storyThumb" name="storyThumb" value="">
                                                        <div id="progress-wrp2">
                                                            <div class="progress-bar2"></div>
                                                            <div class="status2">0%</div>
                                                        </div>
                                                        <small class="text-muted">مطلوبة صورة عمودية.</small>
                                                        <span class="invalid hint" id="checkStoryThumb"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions center">
                                                <button type="submit" class="btn btn-dark btn-min-width"><i class="la la-check"></i> ارسل</button>
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