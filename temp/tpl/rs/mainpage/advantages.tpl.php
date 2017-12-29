<?
	$__prefix = $param["block_prefix"];

	$advantages = get_field("advantages", $id);

?>
<? if($advantages !="") {?>
<div class="<?=$__prefix;?>block">
	<div class="<?=$__prefix;?>container container">
		<?=$advantages;?>
	</div>
</div>
<? } ?>