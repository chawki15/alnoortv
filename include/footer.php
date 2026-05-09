<?php $g=CountUrgent($db); if($g!='0'){ ?>
<div class="bn-breaking-news fx-breaking-news" id="newsTicker15">
    <div class="bn-label">عاجل</div>
    <div class="bn-news">
        <ul>
          <?php list($id,$titre) = Urgent($db);  for($i=0;$i<sizeof($id);$i++){ ?>
            <li><a href="#"><?php  echo $titre[$i] ?></a></li>
          <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>
<footer>
  <div id="footer" class="footer-dark footer-color py-4" style="border-top: 6px solid #fcc12e;font-size: 17px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-6">
          <div class="widget widget_categories widget_categories_custom">
            <header class="title-footer">
                <a href="">
                الأقسام
                </a>
            </header>
            <ul class="menu menu-footer">
              <?php 
              list($id,$name) = GetAdminMenu($db);
                for($i=0;$i<sizeof($id);$i++){ 
              ?>
              <li class="menu-item"><a href=""><?php  echo $name[$i] ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="widget col-sm-6 col-md-2">
          <div class="widget widget_categories widget_categories_custom">
            <header class="title-footer">
                <a href="">
                النور tv
                </a>
            </header>
            <ul class="menu">
              <li class="menu-item"><a href="chaine">من نحن</a></li>
              <li class="menu-item"><a href="contact">اتصل بنا</a></li>
              <li class="menu-item"><a href="regie">للإشهار</a></li>
              <li class="menu-item"><a href="conditions">شروط الاستخدام</a></li>
              <li class="menu-item"><a href="persons">فريق العمل</a></li>
            </ul>
          </div>
        </div>
        <div class="widget col-md-4">
          <div class="widget-content">
            <br/><br/>
            <img class="footer-logo img-fluid mb-2" src="assets/img/logof.gif" alt="footer logo">
            <div class="social mb-4">
              <!--facebook-->
              <span class="my-2 me-3">
                <a target="_blank" href="https://facebook.com" aria-label="Facebook" rel="noopener noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                  </svg>
                </a>
              </span>
              <!--twitter-->
              <span class="my-2 me-3">
                <a target="_blank" href="https://twitter.com" aria-label="Twitter" rel="noopener noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                  </svg>
                </a>
              </span>
              <!--instagram-->
              <span class="my-2 me-3">
                <a target="_blank" href="https://instagram.com" aria-label="Instagram" rel="noopener noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512"><path d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path><path d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path><path d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path></svg>
                </a>
              </span>
              <!--end instagram-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="footer-copyright footer-color">
      <div class="container">
        <nav class="navbar navbar-expand navbar-dark px-0">
          <ul class="navbar-nav text-center first-start-lg-0 footer-nav">
            <li class="d-inline navbar-text">جميع الحقوق محفوظة لموقع النور تف 2022 ©</li>
          </ul>
        </nav>
      </div>
    </div>
</footer>