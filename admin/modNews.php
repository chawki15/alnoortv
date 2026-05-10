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
                <li class="breadcrumb-item"><a href="">الأخبار</a>
                </li>
                <li class="breadcrumb-item active">تعديل الخبر
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
                    <form class="form form-horizontal" id="news">
                      <input type="hidden" name="act" value="modNews">
                      <input type="hidden" name="id" value="<?php echo htmlspecialchars((string)($uId ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">اختر اسم الفئة</label>
                              <div class="col-md-10">
                                <select class="form-control" name="selectCategory" id="selectCategory">
                                  <option value="">اسم الفئة</option>
                                  <?php
                                  $selectedCategoryId = (int)($cat ?? 0);
                                  $selectedSousCategoryId = (int)($souscat ?? 0);
                                  list($id, $name) = GetAdminMenuNews($pdo);
                                  for ($i = 0; $i < sizeof($id); $i++) {
                                    $categoryId = (int)$id[$i];
                                    $categoryName = htmlspecialchars((string)$name[$i], ENT_QUOTES, 'UTF-8');
                                    $f = CountSousMenuByMenu($pdo, $categoryId);
                                    if ($f == 0) {
                                      $isSelected = ($categoryId === $selectedCategoryId && $selectedSousCategoryId === 0);
                                  ?>
                                      <option value="<?php echo $categoryId . '#' ?>" <?php if ($isSelected) { ?> selected="selected" <?php } ?>><?php echo $categoryName; ?></option>
                                      <?php
                                    } else {
                                      list($idss, $idcats, $nom)  = GetSousMenuByMenu($pdo, $categoryId);
                                      for ($j = 0; $j < sizeof($idss); $j++) {
                                        $optionCategoryId = (int)$idcats[$j];
                                        $optionSousCategoryId = (int)$idss[$j];
                                        $optionName = htmlspecialchars($name[$i] . ' : ' . $nom[$j], ENT_QUOTES, 'UTF-8');
                                        $isSelected = ($optionCategoryId === $selectedCategoryId && $optionSousCategoryId === $selectedSousCategoryId);
                                      ?>
                                        <option value="<?php echo $optionCategoryId . '#' . $optionSousCategoryId ?>" <?php if ($isSelected) { ?> selected="selected" <?php } ?>><?php echo $optionName; ?></option>
                                    <?php }
                                    } 
                                    } ?>
                                </select>
                                <span class="invalid hint" id="checkSelectCat"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عنوان الخبر</label>
                              <div class="col-md-10">
                                <input type="text" id="titleNews" class="form-control" maxlength="140" value='<?php echo $titre; ?>' placeholder="عنوان الخبر" name="titleNews">
                                <span class="invalid hint" id="checkTitleNews"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">مستجدات</label>
                              <div class="col-md-10">
                                <div class="radio-inline">
                                  <input type="radio" name="mustajidaat" id="not" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="1" <?php if ($mustajidaat == "1" || $mustajidaat == "") { ?> checked="checked" <?php } ?>>
                                  <label for="not">&nbsp; لا </label>
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="mustajidaat" id="yes" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="2" <?php if ($mustajidaat == "2") { ?> checked="checked" <?php } ?>>
                                  <label for="yes">&nbsp; نعم </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">أهم الأخبار</label>
                              <div class="col-md-10">
                                <div class="radio-inline">
                                  <input type="radio" name="lastNews" id="no" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="1" <?php if ($latestNews == "1" || $latestNews == "") { ?> checked="checked" <?php } ?>>
                                  <label for="no">&nbsp; لا </label>
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="lastNews" id="oui" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="2" <?php if ($latestNews == "2") { ?> checked="checked" <?php } ?>>
                                  <label for="oui">&nbsp; نعم </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">عاجل</label>
                              <div class="col-md-10">
                                <div class="radio-inline">
                                  <input type="radio" name="urgent" id="not" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="1" <?php if ($urgent == "1" || $urgent == "") { ?> checked="checked" <?php } ?>>
                                  <label for="not">&nbsp; لا </label>
                                </div>
                                <div class="radio-inline">
                                  <input type="radio" name="urgent" id="yes" class="ng-pristine ng-untouched ng-valid ng-not-empty" value="2" <?php if ($urgent == "2") { ?> checked="checked" <?php } ?>>
                                  <label for="yes">&nbsp; نعم </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">صاحب الخبر أو المصدر</label>
                              <div class="col-md-10">
                                <input type="text" id="auteur" class="form-control" maxlength="140" placeholder="صاحب الخبر أو المصدر" value='<?php echo $auteur; ?>' name="auteur">
                                <span class="invalid hint" id="checkAuteur"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-md-2 label-control" for="eventRegInput2">صورة الخبر</label>
                              <div class="col-md-10">
                                <div class="list">
                                  <div class="group-image afficher image-1" style="background-image:url(<?php echo '../assets/img/news/' . $photo ?>);">
                                    <input name="1" onchange="readURL();" id="1" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp">
                                      <div class="progress-bar"></div>
                                      <div class="status">0%</div>
                                    </div>
                                    <div id="wn1">photo jpeg / jpg / png ... </div>
                                    <div id="taille1">File size > 4.5 MB </div>
                                    <div id="whiteMax1">Ajouter photo avec 700*400</div>
                                    <div class="description" id="desc-1">
                                      <span class="invalid hint" id="checkPhotoNews"></span>
                                      <label id="choose-1" for="1"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews" name="photoNews" value="<?php echo $photo ?>">
                                    <div class="close" id='close-1' onclick="app();" data-sup="1"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mail"></i> الفقرة الاولى</h4>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group row">
                              <div class="col-md">
                                <input type="text" id="descphoto2" class="form-control" value="<?php echo $titrephoto1 ?>" placeholder="وصف الصورة" name="descphoto2">
                                <span class="invalid hint" id="checkDescphoto2"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md">
                                <div class="list">
                                  <div class="group-image <?php if ($photo1 != '') {
                                                            echo 'afficher';
                                                          } ?> image-2" <?php if ($photo1 != '') { ?> style="background-image:url(<?php echo '../assets/img/news/' . $photo1 ?>);" <?php } ?>>
                                    <input name="2" onchange="readURL2();" id="2" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp2">
                                      <div class="progress-bar2"></div>
                                      <div class="status2">0%</div>
                                    </div>
                                    <div id="wn2">photo jpeg / jpg / png ... </div>
                                    <div id="taille2">File size > 4.5 MB </div>
                                    <div id="whiteMax2">Ajouter photo avec 600*300</div>
                                    <div class="description" id="desc-2">
                                      <span class="invalid hint" id="checkPhotoNews2"></span>
                                      <label id="choose-2" for="2"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews2" name="photoNews2" value="<?php echo $photo1 ?>">
                                    <div class="close" id='close-2' onclick="app2();" data-sup="2"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <fieldset class="form-group form-group-style">
                              <label for="textarea2">منشور مُضمن Facebook Tweeter Instagram </label>
                              <textarea class="form-control" name="smpost2" id="smpost2" rows="3" style="direction: initial;"><?php echo $social1 ?></textarea>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <textarea name="desc2" id="desc2"><?php echo $des1 ?></textarea>
                                <span class="invalid hint" id="checkDescription2"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mail"></i>الفقرة الثانية</h4>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group row">
                              <div class="col-md">
                                <input type="text" id="descphoto3" class="form-control" value="<?php echo $titrephoto2 ?>" placeholder="وصف الصورة" name="descphoto3">
                                <span class="invalid hint" id="checkDescphoto3"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md">
                                <div class="list">
                                  <div class="group-image <?php if ($photo2 != '') {
                                                            echo 'afficher';
                                                          } ?> image-3" <?php if ($photo2 != '') { ?> style="background-image:url(<?php echo '../assets/img/news/' . $photo2 ?>);" <?php } ?>>
                                    <input name="3" onchange="readURL3();" id="3" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp3">
                                      <div class="progress-bar3"></div>
                                      <div class="status3">0%</div>
                                    </div>
                                    <div id="wn3">photo jpeg / jpg / png ... </div>
                                    <div id="taille3">File size > 4.5 MB </div>
                                    <div class="description" id="desc-3">
                                      <span class="invalid hint" id="checkPhotoNews3"></span>
                                      <label id="choose-3" for="3"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews3" name="photoNews3" value="<?php echo $photo2 ?>">
                                    <div class="close" id='close-3' onclick="app3();" data-sup="3"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <fieldset class="form-group form-group-style">
                              <label for="textarea2">منشور مُضمن Facebook Tweeter Instagram </label>
                              <textarea class="form-control" name="smpost3" id="smpost3" rows="3" style="direction: initial;"><?php echo $social2 ?></textarea>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <textarea name="desc3" id="desc3"><?php echo $des2 ?></textarea>
                                <span class="invalid hint" id="checkDescription3"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mail"></i>الفقرة الثالثة</h4>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group row">
                              <div class="col-md">
                                <input type="text" id="descphoto4" class="form-control" value="<?php echo $titrephoto3 ?>" placeholder="وصف الصورة" name="descphoto4">
                                <span class="invalid hint" id="checkDescphoto4"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md">
                                <div class="list">
                                  <div class="group-image <?php if ($photo3 != '') {
                                                            echo 'afficher';
                                                          } ?> image-4" <?php if ($photo3 != '') { ?> style="background-image:url(<?php echo '../assets/img/news/' . $photo3 ?>);" <?php } ?>>
                                    <input name="4" onchange="readURL4();" id="4" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp4">
                                      <div class="progress-bar4"></div>
                                      <div class="status4">0%</div>
                                    </div>
                                    <div id="wn4">photo jpeg / jpg / png ... </div>
                                    <div id="taille4">File size > 4.5 MB </div>
                                    <div class="description" id="desc-4">
                                      <span class="invalid hint" id="checkPhotoNews4"></span>
                                      <label id="choose-4" for="4"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews4" name="photoNews4" value="<?php echo $photo3 ?>">
                                    <div class="close" id='close-4' onclick="app4();" data-sup="4"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <fieldset class="form-group form-group-style">
                              <label for="textarea2">منشور مُضمن Facebook Tweeter Instagram </label>
                              <textarea class="form-control" name="smpost4" id="smpost4" rows="3" style="direction: initial;"><?php echo $social3 ?></textarea>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <textarea name="desc4" id="desc4"><?php echo $des3 ?></textarea>
                                <span class="invalid hint" id="checkDescription4"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mail"></i>الفقرة الرابعة</h4>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group row">
                              <div class="col-md">
                                <input type="text" id="descphoto5" class="form-control" value="<?php echo $titrephoto4 ?>" placeholder="وصف الصورة" name="descphoto5">
                                <span class="invalid hint" id="checkDescphoto5"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md">
                                <div class="list">
                                  <div class="group-image <?php if ($photo4 != '') {
                                                            echo 'afficher';
                                                          } ?> image-5" <?php if ($photo4 != '') { ?> style="background-image:url(<?php echo '../assets/img/news/' . $photo4 ?>);" <?php } ?>>
                                    <input name="5" onchange="readURL5();" id="5" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp5">
                                      <div class="progress-bar5"></div>
                                      <div class="status5">0%</div>
                                    </div>
                                    <div id="wn5">photo jpeg / jpg / png ... </div>
                                    <div id="taille5">File size > 4.5 MB </div>
                                    <div class="description" id="desc-5">
                                      <span class="invalid hint" id="checkPhotoNews5"></span>
                                      <label id="choose-5" for="5"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews5" name="photoNews5" value="<?php echo $photo4 ?>">
                                    <div class="close" id='close-5' onclick="app5();" data-sup="5"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <fieldset class="form-group form-group-style">
                              <label for="textarea2">منشور مُضمن Facebook Tweeter Instagram </label>
                              <textarea class="form-control" name="smpost5" id="smpost5" rows="3" style="direction: initial;"><?php echo $social4 ?></textarea>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <textarea name="desc5" id="desc5"><?php echo $des4 ?></textarea>
                                <span class="invalid hint" id="checkDescription5"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mail"></i>الفقرة الخامسة</h4>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group row">
                              <div class="col-md">
                                <input type="text" id="descphoto6" class="form-control" value="<?php echo $titrephoto5 ?>" placeholder="وصف الصورة" name="descphoto6">
                                <span class="invalid hint" id="checkDescphoto6"></span>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md">
                                <div class="list">
                                  <div class="group-image <?php if ($photo5 != '') {
                                                            echo 'afficher';
                                                          } ?> image-6" <?php if ($photo5 != '') { ?> style="background-image:url(<?php echo '../assets/img/news/' . $photo5 ?>);" <?php } ?>>
                                    <input name="6" onchange="readURL6();" id="6" type="file" accept="image/jpeg,image/png">
                                    <div id="progress-wrp6">
                                      <div class="progress-bar6"></div>
                                      <div class="status6">0%</div>
                                    </div>
                                    <div id="wn6">photo jpeg / jpg / png ... </div>
                                    <div id="taille6">File size > 4.5 MB </div>
                                    <div class="description" id="desc-6">
                                      <span class="invalid hint" id="checkPhotoNews6"></span>
                                      <label id="choose-6" for="6"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                    </div>
                                    <input type="hidden" id="photoNews6" name="photoNews6" value="<?php echo $photo5 ?>">
                                    <div class="close" id='close-6' onclick="app6();" data-sup="6"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-7">
                            <fieldset class="form-group form-group-style">
                              <label for="textarea2">منشور مُضمن Facebook Tweeter Instagram </label>
                              <textarea class="form-control" name="smpost6" id="smpost6" rows="3" style="direction: initial;"><?php echo $social5 ?></textarea>
                            </fieldset>
                            <div class="form-group row">
                              <div class="col-md-12">
                                <textarea name="desc6" id="desc6"><?php echo $des5 ?></textarea>
                                <span class="invalid hint" id="checkDescription6"></span>
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