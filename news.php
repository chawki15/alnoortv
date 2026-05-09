<?php include('req.php'); ?>
<style>
	.post-content p{
		margin: 1.1rem 0;
	}
	.single-inside, .page .main-content {
    width: 1024px;
}
.twitter-tweet{
	margin-left: auto;
    margin-right: auto;
}
	</style>
<body class="bg-repeat font-family">
  	<div class="wrapper">
    <?php include('include/header.php'); ?>
    	<div class="container-fluid main-content">
		<main id="posts" class="container single-inside">
          	<div class="row"  style="margin-top: 10px;">
          		<div class="col-12 col-md-7 col-lg-8 col-xl-8">
                  			<div class="block-area">
                    			<div class="article" style="margin-top: 5px;">
					  				<h1 class="entry-title"><?php echo $titre ?></h1>
								</div>
								<nav class="post_breadcrumb mb-3" aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="">النور Tv</a></li>
										<li class="breadcrumb-item"><a href=""><?php echo $nomcat ?> </a></li>
									</ol>
								</nav>
								<div class="social-share mb-3">
							  		<div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
								</div>
								<figure class="image-wrapper">
									<img class="img-fluid lazy loaded" src="<?php  echo'assets/img/news/'. $photo ?>" alt="Image description" data-was-processed="true">
	          					</figure>
	          					<span class="date-post"><i class="far fa-clock mgdate"></i><?php  echo ' '.GetDateNews($date); ?></span>
			  					<span class="author"><?php  echo ' '. $auteur; ?></span>
								<div class="post-content">
									<?php if($des1 != ''){  $d = explode('##',$des1); ?>
										<?php   $f =  str_replace('&nbsp;',' ',str_replace('<p>&nbsp;</p>','',str_replace('<br /><br />','<br />',$d[0]))); echo $f ?>
										<figure class="align-center">
											<?php if($d[2] != ''){ ?>
												<img class="img-fluid" src="<?php  echo'assets/img/news/'. $d[2] ?>" alt="" />
											<?php } if($d[1] != ''){ ?>
												<figcaption><font style="vertical-align: inherit;"><?php echo $d[1] ?></font></figcaption>
											<?php } ?>
											<div id="fb-root"></div>
											<script>(function(d, s, id) {
											var js, fjs = d.getElementsByTagName(s)[0];
											if (d.getElementById(id)) return;
											js = d.createElement(s); js.id = id;
											js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
											fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk'));</script>
											<center><?php echo $d[3] ?></center>
											<!--<div class="fb-post" data-href="<?php echo $d[3] ?>"></div> -->
										</figure>
									<?php  } ?>
									<?php if($des2 != ''){  $d = explode('##',$des2); ?>
										<?php   $f =  str_replace('&nbsp;',' ',str_replace('<p>&nbsp;</p>','',str_replace('<br /><br />','<br />',$d[0]))); echo $f ?>
										<figure class="align-center">
											<?php if($d[2] != ''){ ?>
												<img class="img-fluid" src="<?php  echo'assets/img/news/'. $d[2] ?>" alt=""/>
											<?php } if($d[1] != ''){ ?>
												<figcaption><font style="vertical-align: inherit;"><?php echo $d[1] ?></font></figcaption>
											<?php } ?>
											<center><?php echo $d[3] ?></center>
										</figure>
									<?php } ?>
									<?php if($des3 != ''){  $d = explode('##',$des3); ?>
										<?php   $f =  str_replace('&nbsp;',' ',str_replace('<p>&nbsp;</p>','',str_replace('<br /><br />','<br />',$d[0]))); echo $f ?>
										<figure class="align-center">
											<?php if($d[2] != ''){ ?>
												<img class="img-fluid" src="<?php  echo'assets/img/news/'. $d[2] ?>" alt="" />
											<?php } if($d[1] != ''){ ?>
												<figcaption><font style="vertical-align: inherit;"><?php echo $d[1] ?></font></figcaption>
											<?php } ?>
											<center><?php echo $d[3] ?></center>
										</figure>
									<?php  } ?>
									<?php if($des4 != ''){  $d = explode('##',$des4); ?>
										<?php   $f =  str_replace('&nbsp;',' ',str_replace('<p>&nbsp;</p>','',str_replace('<br /><br />','<br />',$d[0]))); echo $f ?>
										<figure class="align-center">
											<?php if($d[2] != ''){ ?>
												<img class="img-fluid" src="<?php  echo'assets/img/news/'. $d[2] ?>" alt="" />
											<?php } if($d[1] != ''){ ?>
												<figcaption><font style="vertical-align: inherit;"><?php echo $d[1] ?></font></figcaption>
											<?php } ?>
											<center><?php echo $d[3] ?></center>
										</figure>
									<?php  } ?>
									<?php if($des5 != ''){  $d = explode('##',$des5); ?>
										<?php   $f =  str_replace('&nbsp;',' ',str_replace('<p>&nbsp;</p>','',str_replace('<br /><br />','<br />',$d[0]))); echo $f ?>
										<figure class="align-center">
											<?php if($d[2] != ''){ ?>
												<img class="img-fluid" src="<?php  echo'assets/img/news/'. $d[2] ?>" alt="" />
											<?php } if($d[1] != ''){ ?>
												<figcaption><font style="vertical-align: inherit;"><?php echo $d[1] ?></font></figcaption>
											<?php } ?>
											<center><?php echo $d[3] ?></center>
										</figure>
									<?php  } ?>
								</div>
                  			</div>
          		</div>
				<div class="col-12 col-md-5 col-lg-4 col-xl-4">
						<?php include('include/left.php') ?>
		        </div>
        	</div>
		</min>
      	</div>
    	<?php include('include/footer.php') ?>
    </div>
  <a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i class="fa fa-arrow-up"></i></a>
  <?php include('include/script.php') ?>
  </body>
</html>