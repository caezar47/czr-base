<?
	$heading = get_field('heading', $id);
	$heading_small = get_field('heading_small', $id);	
	$heading_bg_get = get_field('heading_bg', $id);
	$heading_bg = $this->Imgs->rawImg($heading_bg_get, '1920x820');
	$heading_bg_xs_get = get_field('heading_bg_xs', $id);
	$heading_bg_xs = $this->Imgs->rawImg($heading_bg_xs_get, '450x550');

	$banner_heading = get_field('banner_heading', $id);
	$banner_heading_small = get_field('banner_heading_small', $id);
	$banner_bg_get = get_field('banner_bg', $id);
	$banner_bg = $this->Imgs->rawImg($banner_bg_get, '1920x820');
	$banner_bg_xs_get = get_field('banner_bg_xs', $id);
	$banner_bg_xs = $this->Imgs->rawImg($banner_bg_sm_get, '450x550');

	$gallery = get_field("banner_gallery", $id);

?>
<header class="<?=$param["block_prefix"];?>block">
	<div id="header-carousel" class="<?=$param["block_prefix"];?>carousel carousel slide carousel-fade" data-ride="carousel" data-pause="false">
		<div class="carousel-inner <?=$param["block_prefix"];?>carousel-inner">
			<? if($heading != "") {?>
			<div class="item <?=$param["block_prefix"];?>carousel-item active  is--index">
				<div class="<?=$param["block_prefix"];?>carousel-note">
					<h1 class="<?=$param["block_prefix"];?>heading"><?=$heading;?></h1>
					<div class="<?=$param["block_prefix"];?>heading-small"><?=$heading_small;?></div>
				</div>
				<div class="<?=$param["block_prefix"];?>carousel-img"> 
					<picture>
						<source media="(min-width: 451px)" 
								srcset="<?=$heading_bg;?>">
						<img src="<?=$heading_bg_xs;?>" alt="" class="img-responsive">
					</picture>	
				</div>
			</div>
			<?}?>
			<? if($banner_heading != "") {?>
			<div class="item <?=$param["block_prefix"];?>carousel-item">
				<div class="<?=$param["block_prefix"];?>carousel-note  is--banner">
					<div class="<?=$param["block_prefix"];?>heading  is--banner"><?=$banner_heading;?></div>
					<div class="<?=$param["block_prefix"];?>heading-small  is--banner"><?=$banner_heading_small;?></div>
					<div class="<?=$param["block_prefix"];?>painting"><img src="<?=$this->path('img');?>/default/painting-orange.png"></div>
				</div>
				<div class="<?=$param["block_prefix"];?>carousel-img"> 
					<picture>
						<source media="(min-width: 451px)" 
								srcset="<?=$banner_bg;?>">
						<img src="<?=$banner_bg_xs;?>" alt="" class="img-responsive">
					</picture>	
				</div>
			</div> 
			<?}?>			
			<? if(count($gallery)) {		
			foreach($gallery as $id) {
				$preview_xs_get = get_field("preview_xs", $id);
				$preview_xs = $this->Imgs->rawImg($preview_xs_get, '450x500');
				$preview = $this->Imgs->postImg($id, '1920x820');
			?>	
			<div class="item <?=$param["block_prefix"];?>carousel-item">
				<div class="<?=$param["block_prefix"];?>carousel-img"> 
					<picture>
						<source media="(min-width: 451px)" 
								srcset="<?=$preview;?>">
						<img src="<?=$preview_xs;?>" alt="">
					</picture>	
				</div>
			</div>
			<? } 
			} ?>
		</div>
		<a class="left carousel-control <?=$param["block_prefix"];?>carousel-control" href="#header-carousel" data-slide="prev">
			<svg class="icon-svg icon-owl-prev" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#owl-prev"></use></svg>

		</a>
		<a class="right carousel-control <?=$param["block_prefix"];?>carousel-control" href="#header-carousel" data-slide="next">
			<svg class="icon-svg icon-owl-next" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#owl-next"></use></svg>
		</a>
	</div>
	<div class="<?=$param["block_prefix"];?>scrollto" data-before="Листайте" data-after="вниз">
		<a class="scrollto <?=$param["block_prefix"];?>scrollto-link" href="#<?=$param["block_id"];?>" data-scrollto-diff="0">
			<svg class="icon-svg icon-mouse" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#mouse"></use></svg>
		</a>
	</div>
</header>