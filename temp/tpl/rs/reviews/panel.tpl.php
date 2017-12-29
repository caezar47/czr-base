<?
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
	$__heading_mod = $param["block_heading_mod"];

	$products = get_field("products", $id);
	$products_heading = get_field("reviews_heading", $id);

	$heading = $param["block_heading"];
	$reviews = get_field("reviews", $id);
?>
<?if($reviews != "") {?>
<div class="<?=$__prefix;?>block  <?=$__mod;?>">
	<div class="<?=$__prefix;?>container container">
		<div class="page-header__block  <?=$__heading_mod;?>">
			<h2 class="page-header__heading  <?=$__heading_mod;?>"><span><?=$products_heading;?></span></h2>		
		</div>
		<div class="<?=$__prefix;?>list  <?=$__mod;?>  owl-reviews">
			<?			
				foreach($reviews as $id) {
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
			<div class="<?=$__prefix;?>item  <?=$__mod;?>">
				<article class="reviews-card__item  is--index">
					<div class="reviews-card__row row">
						<div class="reviews-card__cols cols  is--preview">
							<div class="reviews-card__preview">
								<img src="<?=$preview;?>" alt="<?=$title;?>"  class="img-responsive"> 
							</div> 	
						</div>
						<div class="reviews-card__cols cols  is--note">
							<div class="reviews-card__note  is--index">
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
<?}?>