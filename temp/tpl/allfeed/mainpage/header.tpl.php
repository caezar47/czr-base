<?
	$id = 1;
	$__prefix = $param["block_prefix"];
	$__slider_id = $param["block_id"];

	$caption = $this->Azbn->getMeta($id, 'caption');
	$caption_small = $this->Azbn->getMeta($id, 'caption_small');

	$gallery = $this->Azbn->getMeta($id, "slider_gallery");
?>
<? if(is_array($gallery) && count($gallery)) {	?>
<header class="<?=$__prefix;?>block">
	<div id="<?=$__slider_id;?>" class="<?=$__prefix;?>carousel carousel slide carousel-fade" data-ride="carousel" data-pause="false">
		<div class="carousel-inner <?=$__prefix;?>carousel-inner">				
			<?				
			$i = 0;
			foreach($gallery as $id) {
				$preview_xs_get = $this->Azbn->getMeta($id, "preview_xs");
				$preview_xs = $this->mdl('Imgs')->rawImg($preview_xs_get, '450x500');
				$preview = $this->mdl('Imgs')->postImg($id, '1920x835');
			?>	
			<div class="item <?=$__prefix;?>carousel-item <?if($i == 0) {echo 'active';}?>"> 
				<div class="<?=$__prefix;?>carousel-img"> 
					<picture>
						<source media="(min-width: 451px)" 
								srcset="<?=$preview;?>">
						<img src="<?=$preview_xs;?>" alt="">
					</picture>	
				</div>
			</div>
			<? $i++;} ?>		
		</div>
		<? if($caption != "") {?>				
		<div class="<?=$__prefix;?>carousel-caption">
			<div class="<?=$__prefix;?>carousel-caption-container container">
				<h1 class="<?=$__prefix;?>carousel-heading"><?=$caption;?></h1>
				<div class="<?=$__prefix;?>carousel-heading-small"><?=$caption_small;?></div>
				<div class="<?=$__prefix;?>carousel-btn">
					<a href="<?=l(5);?>" class="btn__item is--yellow  is--xl">
						<span class="btn__item-name">Продукция</span>
					</a>
				</div>
			</div>
		</div>
		<?}?>
		<a class="left carousel-control <?=$__prefix;?>carousel-control btn__slider  is--center  is--prev  is--header  is--bg" href="#<?=$__slider_id;?>" data-slide="prev">
			<svg class="icon-svg icon-carousel-prev" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#carousel-prev"></use></svg>

		</a>
		<a class="right carousel-control <?=$__prefix;?>carousel-control btn__slider  is--center  is--next  is--header  is--bg" href="#<?=$__slider_id;?>" data-slide="next">
			<svg class="icon-svg icon-carousel-next" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#carousel-next"></use></svg>
		</a>
		<ol class="<?=$__prefix;?>indicators-panel  btn__indicators-panel  carousel-indicators">
			<?
				$i = 0;
				foreach($gallery as $p) {
					?>
					<li data-target="#<?=$__slider_id;?>" data-slide-to="<?=$i;?>" class="<?=$__prefix;?>indicators-item btn__indicators-item <?if($i == 0) {echo 'active';}?> "></li>
					<?
					$i++;
				}
			?>
		</ol>
	</div>
</header>
<?}?>