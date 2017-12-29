<?
$heading = $param["block_heading"];
$reviews = new WP_Query(array(
	'post_type' => 'ourreview',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order'   => 'DESC',
));
?>
<?						
	if(count($reviews)) {				
?>
<div class="<?=$param["block_prefix"];?>block  <?=$param["block_mod"];?>">
	<div class="container <?=$param["block_prefix"];?>container">
		<div class="page-header__block  <?=$param["block_heading_mod"];?>">
			<h2 class="page-header__heading  <?=$param["block_heading_mod"];?>"><span><?=$heading;?></span></h2>		
		</div>
		<div class="<?=$param["block_prefix"];?>list  <?=$param["block_mod"];?>">
			<div class="<?=$param["block_prefix"];?>row row  is--gutter  is--wrap  <?=$param["block_mod"];?>">
				<?
					while ($reviews->have_posts()) {
						$reviews->the_post();
						$r_id = get_the_ID();
						$link = l($r_id);
						$title = t($r_id);
						$content = c($r_id);
						$review_preview = get_field("review_preview", $r_id); 
						$review_preview_review = get_field("review_preview_review", $r_id); 
						$vk = get_field("review_vk", $r_id); 
						$fb = get_field("review_fb", $r_id); 
						$inst = get_field("review_inst", $r_id); 
						$date = d2r(get_the_date('d.m.Y', $r_id));
						$date_iso = d2r(get_the_date('Y-m-d', $r_id));
						$preview_orig = $this->Imgs->rawImg($review_preview_review, 'fancybox_full');
						$preview = $this->Imgs->rawImg($review_preview, '110x110');
						if ($preview == ""){
							$preview = 'http://via.placeholder.com/110x110';
						}
						$review_service_get = get_field("review_service", $r_id);
						$review_service_link = $review_service_get[0]->guid;
						$review_service_title = $review_service_get[0]->post_title;
				?>
				<div class="<?=$param["block_prefix"];?>cols cols  is--cols-4  is--cols-xs-l-6  <?=$param["block_mod"];?>">
					<article class="reviews-card__item">
						<div class="reviews-card__row row">
							<?/*<div class="reviews-card__cols cols  is--preview">
								<div class="reviews-card__preview">
									<img src="<?=$preview;?>" alt="<?=$title;?>"  class="img-responsive"> 
								</div> 	
							</div>
							*/?>
							<div class="reviews-card__cols cols  is--heading">
								<time class="reviews-card__date" datetime="<?=$date_iso;?>"><?=$date;?></time>
								<h4 class="reviews-card__heading"><?=$title;?></h4>
								<div class="reviews-card__services">Услуга: <a href="<?=$review_service_link;?>"><?=$review_service_title;?></a></div>
								<div class="reviews-card__soc">
									<div class="social__row row  is--reviews">
										<? if ($vk != ""){?>
										<div class="social__cols cols  is--reviews">
											<a href="<?=$vk;?>" target="_blank" class="social__item  is--vk  is--reviews">
												<svg class="icon-svg icon-vk" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#vk"></use>
												</svg>
											</a>
										</div>
										<?}?>
										<? if ($inst != ""){?>
										<div class="social__cols cols  is--reviews">
											<a href="<?=$inst;?>" target="_blank" class="social__item  is--inst  is--reviews">
												<svg class="icon-svg icon-inst" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#inst"></use>
												</svg>
											</a>
										</div>
										<?}?>
										<? if ($fb != ""){?>
										<div class="social__cols cols  is--reviews">
											<a href="<?=$fb;?>" target="_blank" class="social__item  is--fb  is--reviews">
												<svg class="icon-svg icon-fb" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#fb"></use>
												</svg>
											</a>
										</div>
										<?}?>
										<? if ($preview_orig != ""){?>
										<div class="social__cols">
											<a href="<?=$preview_orig;?>" data-fancybox="gallery-reviews" class="btn__item is--xs"><span>Оригинал отзыва</span>
											</a>
										</div>
										<?}?>
									</div>
								</div>
							</div>
						</div>			
						<div class="reviews-card__note">
							<div class="reviews-card__text-block  text__block"><?=$content;?></div>
						</div>
					</article>
				</div>
				<?}?>
			</div> 
		</div> 
		<div class="<?=$param["block_prefix"];?>btn  <?=$param["block_mod"];?>">
			<a href="<?=l(8);?>" class="btn__item"><span>Все отзывы</span></a>
		</div>
	</div>
</div>
<?}?>