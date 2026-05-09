<?php include('req.php'); ?>

<body class="bg-repeat font-family">
  <div class="wrapper">
    <?php include('include/header.php'); ?>
    <main id="content">
      <h1 class="sr-only">النور TV - آخر أخبار المغرب والعالم</h1>
      <div class="bn-breaking-news" id="newsTicker2">
        <div class="bn-label">مستجدات</div>
        <div class="bn-news">
          <ul>
            <?php list($id, $titre) = GetMustajidaat($pdo);
            for ($i = 0; $i < sizeof($id); $i++) { ?>
            <li><span class="bn-seperator" style="background-image:url(assets/img/m.gif);"></span>
              <a href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>">
                <?php echo $titre[$i] ?>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
        <div class="bn-controls">
          <button><span class="bn-arrow bn-prev"></span></button>
          <button><span class="bn-arrow bn-next"></span></button>
      </div>
      <section class="container-fluid section1">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
              <div>
                <div class="callbacks_container">
                  <div class="slider">
                    <?php list($id, $titre, $photo, $date) =  GetLatestNews($pdo);
                    for ($i = 0; $i < sizeof($id); $i++) { ?>
                    <div class="slide">
                      <a href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                        title="<?php echo $titre[$i]  ?>">
                        <h3>
                          <?php echo $titre[$i] ?>
                        </h3>
                      </a>
                        <img src="<?php echo 'assets/img/news/' . $photo[$i] ?>" alt="<?php echo $titre[$i] ?>"
                          style="height: 480px;" />
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <header class="title">
                <a href="">
                  قسم الأخبار
                </a>
              </header>
              <div class="row">
                <?php list($id, $titre, $photo, $date) = GetZweiNews($pdo, '1');
                $f = NbrAkhbar($pdo, "1");
                if ($f != "0") {
                  for ($i = 0; $i < sizeof($id); $i++) { ?>
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="overlay card">
                    <div class="cover">
                      <div class="card-img-top">
                        <a class="stretched-link"
                          href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                          title="<?php echo $titre[$i + 1] ?>">
                          <div class="ratio-medium">
                            <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i] ?>"
                              class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 1] ?>" loading="lazy"
                              srcset="<?php echo 'assets/img/news/' . $photo[$i] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i] ?> 800w"
                              sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px">
                          </div>
                        </a>
                      </div>
                      <div class="card-body">
                        <div class="card-details">
                          <div class="card-text">
                            <span class="date-card">
                              <small class="text-muted time">
                                <?php echo HeureCh($date[$i]) ?>
                              </small>
                            </span>
                          <h3 class="card-title">
                            <?php echo $titre[$i] ?>
                          </h3>
                        </div>
                <?php }
                } ?>
              <div class="content">
                <header class="title">
                  <a href="">
                    مواقيت الصلاة
                  </a>
                </header>
                <div class="tbb">
                  <div style="padding:4rem 0">
                    <table style="width:90%; margin: 0 16px; padding: 10rem 0;">
                      <tbody>
                        <tr>
                          <td colspan="2">
                            <label class="labelPerm">اختر مدينتك</label>
                          </td>
                          <td colspan="3">
                            <select id="method" size="1" style="font-size: 12px;">
                              <option value="1" selected="selected">الدار البيضاء</option>
                              <option value="2">وجدة</option>
                              <option value="3">بوعرفة</option>
                              <option value="4">جرادة</option>
                              <option value="5">بركان</option>
                              <option value="6">تاوريرت</option>
                              <option value="7">الناظور</option>
                              <option value="8">مليلية</option>
                              <option value="9">كرسيف</option>
                              <option value="10">الحسيمة</option>
                              <option value="11">ميسور</option>
                              <option value="12">تازة</option>
                              <option value="13">أرفود</option>
                              <option value="14">الريصاني</option>
                              <option value="15">واد أمليل</option>
                              <option value="16">الراشدية</option>
                              <option value="17">الريش</option>
                              <option value="18">تاونات</option>
                              <option value="19">بولمان</option>
                              <option value="20">ميدلت</option>
                              <option value="21">صفرو</option>
                              <option value="22">كلميمة</option>
                              <option value="23">فاس</option>
                              <option value="24">إموزار كندر</option>
                              <option value="25">إفران</option>
                              <option value="26">مولاي يعقوب</option>
                              <option value="27">آزرو</option>
                              <option value="28">شفشاون</option>
                              <option value="29">سبتة</option>
                              <option value="30">تطوان</option>
                              <option value="31">الحاجب</option>
                              <option value="32">زرهون</option>
                              <option value="33">مكناس</option>
                              <option value="34">وزان</option>
                              <option value="35">خنيفرة</option>
                              <option value="36">سيدي قاسم</option>
                              <option value="37">طنجة</option>
                              <option value="38">زاكورة</option>
                              <option value="39">القصر الكبير</option>
                              <option value="40">عرباوة</option>
                              <option value="41">سيدي سليمان</option>
                              <option value="42">سوق أربعاء الغرب</option>
                              <option value="43">أصيلا</option>
                              <option value="44">الخميسات</option>
                              <option value="45">قلعة مكونة</option>
                              <option value="46">العرائش</option>
                              <option value="47">قصبة تادلة</option>
                              <option value="48">سيدي يحيى الغرب</option>
                              <option value="49">تيفلت</option>
                              <option value="50">بني ملال</option>
                              <option value="51">واد زم</option>
                              <option value="52">أزيلال</option>
                              <option value="53">القنيطرة</option>
                              <option value="54">الرباط وسلا</option>
                              <option value="55">خريبكة</option>
                              <option value="56">ورزازات</option>
                              <option value="57">دمنات</option>
                              <option value="58">بن سليمان</option>
                              <option value="59">بوزنيقة</option>
                              <option value="60">الكارة</option>
                              <option value="61">المحمدية</option>
                              <option value="62">قلعة السراغنة</option>
                              <option value="63">برشيد</option>
                              <option value="64">سطات</option>
                              <option value="65">بنكرير</option>
                              <option value="66">طاطا</option>
                              <option value="67">مراكش</option>
                              <option value="68">آزمور</option>
                              <option value="69">الجديدة</option>
                              <option value="70">اليوسفبة</option>
                              <option value="71">تارودانت</option>
                              <option value="72">تافراوت</option>
                              <option value="73">آسفي</option>
                              <option value="74">أكادير</option>
                              <option value="75">تزنيت</option>
                              <option value="76">الصويرة</option>
                              <option value="77">كلميم</option>
                              <option value="78">سيدي إفني</option>
                              <option value="79">طانطان</option>
                              <option value="80">السمارة</option>
                              <option value="81">طرفاية</option>
                              <option value="82">العيون</option>
                              <option value="83">بوجدور</option>
                              <option value="84">الداخلة</option>
                              <option value="85">الكويرة</option>
                              <option value="86">ابي الجعد</option>
                            </select>
                        </tr>
                          <td colspan="5">
                            <div align="center" id="tb" class="tb"></div>
                      </tbody>
                    </table>
          </div>
      </section>
      <!--   ---سياسة---إقتصاد---حوادث---   -->
      <div class="container">
        <div class="row">
          <div class="group-item col-sm-12 col-md-4 col-xl-4 category-histoire bloc_col">
            <header class="title">
              <a href="سياسة/">
                سياسة
            </header>
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '2');
            $f = NbrAkhbar($pdo, "2");
            if ($f != "0") {
              for ($i = 0; $i < sizeof($id); $i = $i + 5) { ?>
            <div class="card horizontal-card">
              <div class="card-body">
                <h3 class="card-title">
                  <a class="stretched-link"
                    href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                    title="<?php echo $titre[$i] ?>">
                    <?php echo $titre[$i] ?>
                </h3>
              <div class="card-img-top">
                <div class="ratio-medium">
                  <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i] ?>"
                    class=" img-fluid wp-post-image" alt="<?php echo $titre[$i] ?>" loading="lazy"
                    srcset="<?php echo 'assets/img/news/' . $photo[$i] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i] ?> 800w"
                    sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px">
            <div class="vertical-articles">
              <?php if ($id[$i + 1] != '') { ?>
              <div class="card post-card horizontal-card">
                <div class="card-img-top">
                  <div class="ratio-medium">
                    <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 1] ?>"
                      class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 1] ?>" loading="lazy"
                      srcset="<?php echo 'assets/img/news/' . $photo[$i + 1] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 800w"
                      sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px">
                <div class="card-body">
                  <h3 class="card-title">
                    <a class="stretched-link"
                      href="<?php echo 'news/' . cripter($id[$i + 1], 264) . '-' . replace($titre[$i + 1]) . '.html';  ?>"
                      title="<?php echo $titre[$i + 1] ?>">
                      <?php echo $titre[$i + 1] ?>
                    </a>
                  </h3>
              <?php }
                  if ($id[$i + 2] != '') { ?>
                    <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 2] ?>"
                      class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 2] ?>" loading="lazy"
                      srcset="<?php echo 'assets/img/news/' . $photo[$i + 2] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 800w"
                      href="<?php echo 'news/' . cripter($id[$i + 2], 264) . '-' . replace($titre[$i + 2]) . '.html';  ?>"
                      title="<?php echo $titre[$i + 2] ?>">
                      <?php echo $titre[$i + 2] ?>
                  if ($id[$i + 3] != '') { ?>
                    <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 3] ?>"
                      class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 3] ?>" loading="lazy"
                      srcset="<?php echo 'assets/img/news/' . $photo[$i + 3] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 800w"
                      href="<?php echo 'news/' . cripter($id[$i + 3], 264) . '-' . replace($titre[$i + 3]) . '.html';  ?>"
                      title="<?php echo $titre[$i + 3] ?>">
                      <?php echo $titre[$i + 3] ?>
                  if ($id[$i + 4] != '') { ?>
                    <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 4] ?>"
                      class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 4] ?>" loading="lazy"
                      srcset="<?php echo 'assets/img/news/' . $photo[$i + 4] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 800w"
                      href="<?php echo 'news/' . cripter($id[$i + 4], 264) . '-' . replace($titre[$i + 4]) . '.html';  ?>"
                      title="<?php echo $titre[$i + 4] ?>">
                      <?php echo $titre[$i + 4] ?>
              <?php } ?>
            <?php }
            } ?>
          <div class="group-item col-sm-12 col-md-4 col-xl-4 category-%d8%b2%d9%88%d9%88%d9%85 bloc_col">
              <a href="حوادث/">
                حوادث
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '3');
            $f = NbrAkhbar($pdo, "3");
              <?php } elseif ($id[$i + 2] != '') { ?>
              <?php } elseif ($id[$i + 3] != '') { ?>
              <?php } elseif ($id[$i + 4] != '') { ?>
          <div class="group-item col-sm-12 col-md-4 col-xl-4 category-interviews bloc_col">
              <a href="إقتصاد/">
                إقتصاد
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '4');
            $f = NbrAkhbar($pdo, "4");
      <!--   ----فيديو---  -->
      <section class="container-fluid section4 dark">
          <div class="media-item category-social-video bloc_col">
              <a href="فيديو/">
                فيديو
            <div class="video-section row carousel">
              <?php list($id, $titre, $photo, $url) = GetVideo($pdo);
              $f = GetTotalVideo($pdo);
              if ($f != "0") {
                for ($i = 0; $i < sizeof($id); $i++) { ?>
              <div class="col-12 col-sm-6 col-md-6 col-xl-3">
                <div class="overlay card">
                  <div class="cover">
                    <div class="card-img-top">
                      <span class="cat sawt-soura">
                        صوت وصورة </span>
                      <a class="stretched-link"
                        href="<?php echo 'video/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                        title="<?php echo $titre[$i] ?>">
                        <div class="ratio-medium">
                          <img width="800" height="533" src="<?php echo 'assets/img/videos/' . $photo[$i] ?>"
                            class=" img-fluid wp-post-image" alt="<?php echo $titre[$i] ?>" loading="lazy"
                            srcset="<?php echo 'assets/img/videos/' . $photo[$i] ?> 768w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 100w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 200w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 300w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 400w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 500w, <?php echo 'assets/img/videos/' . $photo[$i] ?> 800w"
                            sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px">
                          <div class="post-type-icon">
                            <span class="fa-stack-sea">
                              <i class="fas fa-play fa-stack-1x text-primary"></i>
                    <div class="card-body">
                      <div class="card-details">
                        <h3 class="card-title">
              } ?>
      <!--   ---فن وثقافة---سياحة وسفر---صحة---   -->
              <a href="فن-وثقافة/">
                فن وثقافة
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '6');
            $f = NbrAkhbar($pdo, "6");
              <a href="سياحة-وسفر/">
                سياحة وسفر
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '10');
            $f = NbrAkhbar($pdo, "10");
              <a href="صحة/">
                صحة
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '9');
            $f = NbrAkhbar($pdo, "9");
      <!--   ---- رياضة---  -->
        <div class="sport-box category-sport bloc_col">
          <header class="title">
            <a href="رياضة/">
              رياضة
            </a>
          </header>
            <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '5');
            $f = NbrAkhbar($pdo, "5");
            <div class="col-12 col-md-6 thumbnail-feature">
              <div class="overlay card">
                <div class="cover">
                  <div class="card-img-top">
                    <span class="cat sport">
                      رياضة </span>
                      href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                      title="<?php echo $titre[$i] ?>">
                      <div class="ratio-medium">
                        <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i] ?>"
                          class=" img-fluid wp-post-image" alt="<?php echo $titre[$i] ?>" loading="lazy"
                          srcset="<?php echo 'assets/img/news/' . $photo[$i] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i] ?> 800w"
                          sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px">
                  <div class="card-body">
                    <div class="card-details">
                      <div class="card-text">
                        <span class="date-card">
                          <small class="text-muted time">
                            <?php echo HeureCh($date[$i]) ?>
                          </small>
                        </span>
                      <h3 class="card-title">
                        <?php echo $titre[$i] ?>
                      </h3>
            <div class="col-12 col-md-6">
                <?php if ($id[$i + 1] != '') { ?>
                <div class="col-12 col-sm-6 col-md-6">
                        <span class="cat sport"> رياضة </span>
                          href="<?php echo 'news/' . cripter($id[$i + 1], 264) . '-' . replace($titre[$i + 1]) . '.html';  ?>"
                            <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 1] ?>"
                              srcset="<?php echo 'assets/img/news/' . $photo[$i + 1] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 1] ?> 800w"
                                <?php echo HeureCh($date[$i + 1]) ?>
                            <?php echo $titre[$i + 1] ?>
                    if ($id[$i + 2] != '') { ?>
                          href="<?php echo 'news/' . cripter($id[$i + 2], 264) . '-' . replace($titre[$i + 2]) . '.html';  ?>"
                          title="<?php echo $titre[$i + 2] ?>">
                            <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 2] ?>"
                              class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 2] ?>" loading="lazy"
                              srcset="<?php echo 'assets/img/news/' . $photo[$i + 2] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 2] ?> 800w"
                                <?php echo HeureCh($date[$i + 2]) ?>
                            <?php echo $titre[$i + 2] ?>
                    if ($id[$i + 3] != '') { ?>
                          href="<?php echo 'news/' . cripter($id[$i + 3], 264) . '-' . replace($titre[$i + 3]) . '.html';  ?>"
                          title="<?php echo $titre[$i + 3] ?>">
                            <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 3] ?>"
                              class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 3] ?>" loading="lazy"
                              srcset="<?php echo 'assets/img/news/' . $photo[$i + 3] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 3] ?> 800w"
                                <?php echo HeureCh($date[$i + 3]) ?>
                            <?php echo $titre[$i + 3] ?>
                    if ($id[$i + 4] != '') { ?>
                          href="<?php echo 'news/' . cripter($id[$i + 4], 264) . '-' . replace($titre[$i + 4]) . '.html';  ?>"
                          title="<?php echo $titre[$i + 4] ?>">
                            <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i + 4] ?>"
                              class=" img-fluid wp-post-image" alt="<?php echo $titre[$i + 4] ?>" loading="lazy"
                              srcset="<?php echo 'assets/img/news/' . $photo[$i + 4] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i + 4] ?> 800w"
                                <?php echo HeureCh($date[$i + 4]) ?>
                            <?php echo $titre[$i + 4] ?>
                <?php }  ?>
      <!--   ----آراء وتحليلات---  -->
              <a href="آراء-وتحليلات/">
                آراء وتحليلات
            <div class="video-section row carouselAraa">
              <?php list($id, $idwriter, $titre) = GetOpinion($pdo);
              for ($m = 0; $m < sizeof($id); $m++) { ?>
              <div class="col-12 col-sm-6 col-md-6 col-xl-4">
                <a href="<?php echo  'opinion/' . cripter($id[$m], 264) . '-' . replace($titre[$m]) . '.html'; ?>"
                  class="plate-article">
                  <div class="plate-article__img bg js-lazy-me"
                    data-lazy-source="<?php echo 'assets/img/writers/' . GetTableByID($pdo, 'writers', 'photo', $idwriter[$m]) ?>"
                    style="background-image: url(<?php echo 'assets/img/writers/' . GetTableByID($pdo, 'writers', 'photo', $idwriter[$m]) ?>);">
                  <div class="plate-article__name icon-quote-right">
                    <?php echo GetTableByID($pdo, 'writers', 'nom', $idwriter[$m]) ?>
                  <h4 class="plate-article__text">
                    <?php echo $titre[$m] ?>
                  </h4>
      <!--   ---مجتمع---سيارات---مغاربة العالم---   -->
      <section class="container-fluid section8 most-popular-box">
            <section class="col-sm-12 col-md-4 col-xl-4 bloc_col popular-posts">
                <a href="مجتمع/">
                  مجتمع
              <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '7');
              $f = NbrAkhbar($pdo, "7");
              <div class="card">
                    <a href="<?php echo 'news/' . cripter($id[$i], 264) . '-' . replace($titre[$i]) . '.html';  ?>"
                      target="_self"><img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i] ?>"
                        class="wpp-thumbnail wpp_featured attachment-medium size-medium wp-post-image" alt=""
                        loading="lazy"
                        srcset="<?php echo 'assets/img/news/' . $photo[$i] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i] ?> 800w"
                        sizes="( max-width : 100px ) 100px ,( max-width : 200px ) 200px ,( max-width : 300px ) 300px ,( max-width : 400px ) 400px ,( max-width : 500px ) 500px ,800px"></a>
                      class="wpp-post-title" target="_self">
                      <?php echo $titre[$i] ?>
            </section>
                <a href="سيارات/">
                  سيارات
              <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '13');
              $f = NbrAkhbar($pdo, "13");
                    <img width="800" height="533" src="<?php echo 'assets/img/news/' . $photo[$i] ?>"
                      class="img-fluid wp-post-image" alt="<?php echo $titre[$i] ?>" loading="lazy"
                      srcset="<?php echo 'assets/img/news/' . $photo[$i] ?> 768w, <?php echo 'assets/img/news/' . $photo[$i] ?> 100w, <?php echo 'assets/img/news/' . $photo[$i] ?> 200w, <?php echo 'assets/img/news/' . $photo[$i] ?> 300w, <?php echo 'assets/img/news/' . $photo[$i] ?> 400w, <?php echo 'assets/img/news/' . $photo[$i] ?> 500w, <?php echo 'assets/img/news/' . $photo[$i] ?> 800w"
                <a href="مغاربة-العالم/">
                  مغاربة العالم
              <?php list($id, $titre, $photo, $date) = GetFunfNews($pdo, '14');
              $f = NbrAkhbar($pdo, "14");
      <!--   ----إنفوجرافيك---  -->
            <a href="">
              إنفوجرافيك
              <div class="slider-6">
                <?php list($id, $photo, $titre) = GetInfo($pdo);
                for ($n = 0; $n < sizeof($id); $n++) { ?>
                <div>
                  <a href="infographic.php?i=<?php echo $id[$n] ?>">
                    <img class="slide-image no-image" src="<?php echo 'assets/img/infographics/' . $photo[$n] ?>" />
                    <p class="slick-caption">
                      <?php echo $titre[$n] ?>
                    </p>
                <?php } ?>
              </div>
    </main>
  <?php include('include/footer.php') ?>
  <a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i
      class="fa fa-arrow-up"></i></a>
  <?php include('include/script.php') ?>
</body>
</html>