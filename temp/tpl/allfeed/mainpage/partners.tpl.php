<?
	$id = $this->post['id'];
	$__prefix="content-block__";
	$__mod="";	
	$heading_prefix="page-header__";
	$heading_mod="is--center  is--page-heading  color--green-dark";
	$heading = $this->Azbn->getMeta($id, 'partners_heading');
	$content_mod = "is--partners"
?>
<div class="<?=$__prefix;?>panel  <?=$content_mod;?>"> 
	<div class="<?=$__prefix;?>elem"> 
		<div class="<?=$__prefix;?>container container  <?=$content_mod;?>">
			<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
				<h2 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h2>	
			</div>
			<?
				$this->tpl(
				'partners/panel', 
					array(
						"block_prefix" => $__prefix,
						"block_mod" => $content_mod,
					)
				);
			?>
		</div>
	</div>
</div>