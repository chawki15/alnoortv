<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="index.php"><i class="la la-home"></i><span class="menu-title">الرئيسية</span></a></li>
        <?php if(loggedAdmin($db)){ ?>
        <li class=" nav-item"><a href="#"><i class="la la-navicon"></i><span class="menu-title">الاقسام الرئيسية</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addCat.php">اضافة قسم جديد</a>
            </li>
            <li><a class="menu-item" href="afficherCat.php"> عرض الكل </a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title">الفئات الفرعية</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addSousCat.php">اضافة فئة فرعية جديدة</a>
            </li>
            <li><a class="menu-item" href="afficherSousCat.php">عرض الكل</a>
            </li>
          </ul>
        </li>
        <?php } ?>
        <li class=" nav-item"><a href="#"><i class="la la-paint-brush"></i><span class="menu-title">الأخبار</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addNews.php">اضافة خبر جديد</a>
            </li>
            <li><a class="menu-item" href="afficherNews.php">عرض الكل</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-paint-brush"></i><span class="menu-title">آراء و تحليلات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addWriter.php">إضافة صاحب الرأي</a>
            <li><a class="menu-item" href="afficherWriter.php">عرض كل الكتاب</a></li>
            <li><a class="menu-item" href="addOpinions.php">إضافة رأي جديد</a></li>
            <li><a class="menu-item" href="afficherOpinions.php">عرض كل الاراء</a></li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-video-camera"></i><span class="menu-title">فيديوهات</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addVideo.php">اضافة فيديو جديد</a>
            </li>
            <li><a class="menu-item" href="afficherVideos.php">عرض الكل</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="la la-camera-retro"></i><span class="menu-title">انفوجرافيك</a>
          <ul class="menu-content">
            <li><a class="menu-item" href="addInfographic.php">إضافة معرض الصور جديد</a>
            </li>
            <li><a class="menu-item" href="afficherInfographic.php">عرض الكل</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>