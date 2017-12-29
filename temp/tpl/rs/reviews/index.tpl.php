<?
	$__prefix_bg="bg-block__";
	$__prefix="blog-page__";

	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";
	$heading = t($id);

	$__prefix_block = "reviews-panel__";

	$reviews = $this->getItems(array(
		'post_type' => 'ourreview',
		'posts_per_page' => -1,
		'orderby' => 'date',
		'order'   => 'DESC',
	));	
?>
<div class="content-block <?=$__prefix;?>content-block  <?=$__prefix_bg;?>block" role="main">	
	<div class="container content-block__container <?=$__prefix;?>container <?=$__prefix_bg;?>container">
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading;?></span></h1>
		</div>

		<div class="<?=$__prefix_block;?>block">
			<div class="<?=$__prefix_block;?>row row  is--gutter  is--wrap">
				<?
				foreach($reviews as $p) {
					$id = $p->ID;					
					$link = l($id);
					$title = t($id);
					$content = c($id);
					$date = d2r(get_the_date('d.m.Y', $id));
					$date_iso = d2r(get_the_date('Y-m-d', $id));
					$preview = $this->Imgs->postImg($id, '300x460');
					if ($preview == ""){
						$preview = 'http://via.placeholder.com/300x460';
					}
				?>
				<div class="<?=$__prefix_block;?>cols cols  is--cols-6  is--cols-sm-p-12">
					<article class="reviews-card__item">
						<div class="reviews-card__row row">
							<div class="reviews-card__cols cols  is--preview">
								<div class="reviews-card__preview">
									<img src="<?=$preview;?>" alt="<?=$title;?>"  class="img-responsive"> 
								</div> 	
							</div>
							<div class="reviews-card__cols cols  is--note">
								<div class="reviews-card__note">
									<div class="reviews-card__note-row row  is--wrap  is--gutter15">
										<div class="reviews-card__note-cols cols  is--heading">
											<h4 class="reviews-card__heading"><?=$title;?></h4>
										</div>
										<div class="reviews-card__note-cols cols  is--date">
											<time class="reviews-card__date" datetime="<?=$date_iso;?>"><?=$date;?></time>
										</div>
									</div>
									<div class="reviews-card__text-block">
										<?
										$this->tpl(
											'_/bg', 
											array(
												"block_prefix" => "bg-block__",
												"block_mod" => "is--comma-before  is--text",
												"block_bg" => "bg-comma-before.png",
											)
										);
										$this->tpl(
											'_/bg', 
											array(
												"block_prefix" => "bg-block__",
												"block_mod" => "is--comma-after  is--text",
												"block_bg" => "bg-comma-after.png",
											)
										);
										?>
										<div class="reviews-card__text  text__block">
											<?=$content;?>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</article>
				</div> 
				<?}?>
			</div>
		</div>
	</div>
</div>