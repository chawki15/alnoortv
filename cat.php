<?php include('req.php') ?>

<body class="bg-repeat font-family">
	<div class="wrapper">
		<?php include('include/header.php') ?>

		<div class="container">
			<div class="row" style="margin-top: 10px;">
				<div class="col-lg-9 col-md-12 col-sm-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="block-area">

								<header class="title">
									<a href="">
										<?php echo $nomcat;  ?>
										<?php if($nomsouscat != ''){ echo $nomsouscat;} ?>
									</a>
								</header>
								<div class="loadData" style="margin-top: 5px;">

									<?php 
					
						$limit = 30;
						$c = ' id_category ="'.$cat.'"';
						if($nomsouscat != ''){ if($souscat == ''){ $s = ''; }else{ $s = ' and id_sousCategory ="'.$souscat.'"';} }else{ $s = ''; }
						$sql = "select * from news where ".$c." ".$s." order by id desc limit ".$limit."";
						$query = mysqli_query($pdo,$sql);

						if(mysqli_num_rows($query) > 0){ 
							while($row = mysqli_fetch_assoc($query)){
								$last_id = $row["id"]; ?>

									<article class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="overlay card">
											<div class="cover">
												<div class="card-img-top">
													<a class="stretched-link" href="<?php echo 'news/'.cripter($row["id"],264).'-'.replace($row["titre"]).'.html'; ?>" title="
														<?php echo $row["titre"] ?>">
														<div class="ratio-medium">
															<img width="800" height="533"
																src="<?php  echo'assets/img/news/'. $row["photo"] ?>"
															class=" img-fluid wp-post-image" alt="" loading="lazy"
															srcset="
															<?php  echo'assets/img/news/'. $row["photo"] ?> 768w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 100w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 200w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 300w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 400w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 500w,
															<?php  echo'assets/img/news/'. $row["photo"] ?> 800w"
															sizes="( max-width : 100px ) 100px ,( max-width : 200px )
															200px ,( max-width : 300px ) 300px ,( max-width : 400px )
															400px ,( max-width : 500px ) 500px ,800px">
														</div>
													</a>
												</div>
												<div class="card-body">
													<div class="card-details">
														<div class="card-text">
															<span class="date-card">
																<small class="text-muted time">
																	<?php echo HeureCh($row["date"]); ?>
																</small>
															</span>
														</div>
														<h3 class="card-title">
															<?php echo $row["titre"] ?>
														</h3>
													</div>
												</div>
											</div>
										</div>
									</article>
									<?php } ?>
									<div id="pagination">
										<button class="btn btn-outline-success ajaxbtn"
											data-id="<?php echo $last_id ?>">المزيد</button>
									</div>
									<?php } ?>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-12 col-sm-12">
					<?php include('include/left.php') ?>
				</div>
			</div>
		</div>


		<?php include('include/footer.php') ?>
	</div>
	<a class="material-scrolltop back-top btn btn-light border position-fixed r-1 b-1" href="#"><i
			class="fa fa-arrow-up"></i></a>

	<?php include('include/script.php') ?>


	<script>
		$(document).ready(function ($) {
			$(document).on('click', '.ajaxbtn', function () {
				var page = $(this).data("id");
				$('.ajaxbtn').hide();
				$.ajax({
					type: 'POST',
					url: 'pagination/paginationCat.php',
					data: { pageNo: page, cat:<?php echo $cat; ?>, souscat:<?php if($souscat != ''){ echo $souscat; }else { echo '0'; } ?> },
				success:function(data) {
					if (data != "") {
						$("#pagination").remove();
						$(".loadData").append(data);
					} else {
						$(".ajaxbtn").html("ليس هناك مزيد");
						$(".ajaxbtn").prop("disabled", true);
					}
				}
				});
			});
        });
	</script>


</body>

</html>