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
										<li class="breadcrumb-item"><a href="">آراء وتحليلات </a></li>
									</ol>
								</nav>
								<div class="social-share mb-3">
							  		<div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
								</div>
								<div class="post-thumbnail featured-img">
                  <div class="writers_img">
                    <img width="200" height="269"
                      src="<?php  echo'assets/img/writers/'. GetTableByID($db,'writers','photo',$writer) ?>"
                      class="attachment-medium size-medium wp-post-image" alt="<?php echo $titre ?>">
                  </div>
                </div>
	          		<span class="date-post"><i class="far fa-clock mgdate"></i><?php  echo ' '.GetDateNews($date); ?></span>
			  				<span class="author">
                  <a href="<?php echo 'writer/'.cripter($writer,264).'-'.replace(GetTableByID($db,'writers','nom',$writer)).'.html';  ?>"
                    title="<?php  echo GetTableByID($db,'writers','nom',$writer) ?>" rel="author">
                    <?php  echo GetTableByID($db,'writers','nom',$writer) ?>
                  </a>
                </span>
								<div class="post-content">
                    <?php  echo $des ?>
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