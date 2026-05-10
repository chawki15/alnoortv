<?php include('req.php'); ?>
<style>
	.post-content p {
		margin: 1.1rem 0;
	}

	.single-inside,
	.page .main-content {
		width: 1024px;
	}
</style>

<body class="bg-repeat font-family">
	<div class="wrapper">
		<?php include('include/header.php'); ?>
		<div class="container-fluid main-content">
			<main id="posts" class="container single-inside">
				<div class="row" style="margin-top: 10px;">
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
							<?php $embedUrl = youtube_embed_url($url); ?>
							<?php if ($embedUrl !== '') { ?>
								<iframe
									width="100%"
									height="410"
									src="<?php echo htmlspecialchars($embedUrl, ENT_QUOTES, 'UTF-8'); ?>"
									title="<?php echo htmlspecialchars($titre, ENT_QUOTES, 'UTF-8'); ?>"
									frameborder="0"
									allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
									allowfullscreen></iframe>
							<?php } else { ?>
								<p class="alert alert-warning">رابط الفيديو غير صالح أو غير مدعوم.</p>
							<?php } ?>
							<span class="date-post"><i class="far fa-clock mgdate"></i><?php echo ' ' . GetDateNews($date); ?></span>
							<span class="author"><?php echo ' ' . $auteur; ?></span>
							<div class="post-content">
								<?php if ($des1 != '') {
									$d = explode('##', $des1); ?>
									<?php $f =  str_replace('&nbsp;', ' ', str_replace('<p>&nbsp;</p>', '', str_replace('<br /><br />', '<br />', $d[0])));
									echo $f ?>
								<?php  } ?>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-5 col-lg-4 col-xl-4">
						<?php include('include/left.php') ?>
					</div>
				</div>
			</main>
		</div>
		<?php include('include/footer.php') ?>
	</div>
	<a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i class="fa fa-arrow-up"></i></a>
	<?php include('include/script.php') ?>
</body>

</html>