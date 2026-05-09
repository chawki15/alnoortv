<div class="row">
	<div class="col-md">
		<div class="block-area block-are">
		<header class="title">
                <a href="">
				الأكثر قراءة
                </a>
              </header>
			<div>
				<div class="box tabs">
					<ul class="tabs-menu">
						<li><a data-toggle="tab" href="#tab-01">اليوم</a>
						</li>
						<li><a data-toggle="tab" href="#tab-02">الأسبوع</a>
						</li>
					</ul>
					<div class="tab">
						<div id="tab-01" class="tab_content">
							<div class="top-content">
								<ul>
									<?php list($id,$titre,$photo,$nVues,$date) = Last24hours($db);  for($i=0;$i<sizeof($id);$i++){ ?>
									<li>
										<a href="<?php echo 'news/'.cripter($id[$i],264).'-'.replace($titre[$i]).'.html';  ?>"
											title="<?php  echo $titre[$i] ?>">
											<span class="cover">
												<img src="<?php  echo'assets/img/news/'. $photo[$i] ?>"
													alt="<?php  echo $titre[$i] ?>"
													title="">
											</span>
											<span class="ttl">
												<?php  echo $titre[$i] ?>
											</span>
											<span class="caption">(
												<?php  echo $nVues[$i].' مشاهدة' ?> )
											</span>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div id="tab-02" class="tab_content">
							<div class="top-content">
								<ul>
									<?php list($id,$titre,$photo,$nVues) = MostWatchedWeek($db);  for($i=0;$i<sizeof($id);$i++){ ?>
									<li>
										<a href="<?php echo 'news/'.cripter($id[$i],264).'-'.replace($titre[$i]).'.html';  ?>"
											title="<?php  echo $titre[$i] ?>">
											<span class="cover">
												<img src="<?php  echo'assets/img/news/'. $photo[$i] ?>"
													alt="<?php  echo $titre[$i] ?>"
													title="<?php  echo $titre[$i] ?>">
											</span>
											<span class="ttl">
												<?php  echo $titre[$i] ?>
											</span>
											<span class="caption">(
												<?php  echo $nVues[$i].' مشاهدة' ?> )
											</span>
										</a>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>