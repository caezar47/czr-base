<?
	$gallery = get_field("gallery", $id);
	if(count($gallery)) {
?>
<div class="<?=$param["block_prefix"];?>block">	
	<div class="container <?=$param["block_prefix"];?>container ">
		<div class="<?=$param["block_prefix"];?>slider-block">
			<div class="<?=$param["block_prefix"];?>slider" id="slick-center">
				<?
					foreach($gallery as $id) {
						$preview = $this->Imgs->rawImg($id, '1480x700');
						$preview_xs = $this->Imgs->rawImg($id, '255x155');
				?>	
				<div class="<?=$param["block_prefix"];?>slider-item">
					<img src="<?=$preview;?>" alt="" class="img-responsive">
				</div>
				<? } ?>
			</div>
			<div class="<?=$param["block_prefix"];?>nav" id="slick-nav">
				<?
					foreach($gallery as $id) {
						$preview = $this->Imgs->rawImg($id, '1480x700');
						$preview_xs = $this->Imgs->rawImg($id, '255x155');
				?>	
				<div class="<?=$param["block_prefix"];?>nav-item">
					<img src="<?=$preview_xs;?>" alt="" class="img-responsive">
				</div>
				<? } ?>
			</div>
		</div>
	</div>
</div>
<? } ?>