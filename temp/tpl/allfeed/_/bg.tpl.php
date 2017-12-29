<?if ($param["block_bg"] !=""){?>
	<?if ($param["block_gallery"] !="true"){?>
	<div class="<?=$param["block_prefix"];?>item  <?=$param["block_mod"];?>" style="background-image: url(<?=$this->path('img');?>/bg/<?=$param["block_bg"];?>)"></div>
	<?}else{?>
	<div class="<?=$param["block_prefix"];?>item  <?=$param["block_mod"];?>" style="background-image: url(<?=$param["block_bg"];?>)"></div>		
	<?}?>
<?}?>