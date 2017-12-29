<?
	$__prefix = $param["block_prefix"];
	$__id_block = $param["block_id"];

	$slider = get_field("slider", $id);

?>
<? if($slider !="") {?>
<header class="<?=$__prefix;?>block">
	<div id="<?=$__id_block;?>" class="<?=$__prefix;?>carousel carousel slide carousel-fade" data-ride="carousel" data-pause="false">
		<div class="carousel-inner <?=$__prefix;?>carousel-inner">		
			<?	
			$i = 0;
			foreach($slider as $id) {
				$preview_xs_get = get_field("preview_xs", $id);
				$preview_xs = $this->Imgs->rawImg($preview_xs_get, '450x500');
				$preview = $this->Imgs->postImg($id, '1920x735');
				if($preview_xs == ""){
					$preview_xs = "http://via.placeholder.com/450x500";
				}
				$preview = $this->Imgs->postImg($id, '1920x735');
				if($preview == ""){
					$preview = "http://via.placeholder.com/1920x735";
				}
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
		<a class="left carousel-control <?=$__prefix;?>carousel-control btn__slider  is--center  is--prev" href="#<?=$__id_block;?>" data-slide="prev">
			<svg class="icon-svg icon-owl-prev" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#owl-prev"></use></svg>

		</a>
		<a class="right carousel-control <?=$__prefix;?>carousel-control btn__slider  is--center  is--next" href="#<?=$__id_block;?>" data-slide="next">
			<svg class="icon-svg icon-owl-next" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#owl-next"></use></svg>
		</a>
		<ol class="carousel-indicators  btn__indicators-panel  is--header">
			<?
				$i = 0;
				foreach($slider as $p) {
					?>
					<li data-target="#<?=$__id_block;?>" data-slide-to="<?=$i;?>" class="btn__indicators-item  is--header <?if($i == 0) {echo 'active';}?> "></li>
					<?
					$i++;
				}
			?>
		</ol>
	</div>
</header>
<? } ?>