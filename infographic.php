<?php include('req.php') ?>

<body class="photoViewer photoViewer_cartoons">
    <div class="b-layout" dir="rtl">
        <div class="photo-tape">
            <div class="right-section">
                <div class="photo-tape_header">
                    <div class="wrapper">
                        <a class="photo-tape_link-back" href="/"></a>
                        <h1 class="heading"><?php echo $titre ?></h1>
                        <p class="summary"></p>
                    </div>
                </div>

				<div id="container_3" class="container">
                <?php  $photo = explode('#',$photos); ?>
                        <div class="photo-area">
                                <div class="bxslider">
                                <?php for($i=0;$i<sizeof($photo);$i++){ if($photo[$i]!=''){ ?>
                                    <div><img src="assets/img/infographics/<?php echo $photo[$i] ?>" title="Funky roots"></div>
                                <?php } } ?>
                                    
                                </div>
                            </div>
                            <div class="photo-thumbs">
                                <ul class="bx-pager">
                                <?php for($i=0;$i<sizeof($photo);$i++){ if($photo[$i]!=''){ ?>
                                    <li><a data-slide-index="<?php echo $i ?>" href=""><img src="assets/img/infographics/<?php echo $photo[$i] ?>" width="50" height="50"></a></li>
                                    <?php }} ?>
                                    
                                </ul>
                            </div>
                </div>
            </div>
        </div>
    </div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bxslider/jquery.bxslider.min.js"></script>

   <script type="text/javascript">
   $(function(){
  $('.bxslider').bxSlider({
	mode: 'fade',
	pagerCustom: '.bx-pager'
  });
});
     
   </script>

    </body>
 </html>