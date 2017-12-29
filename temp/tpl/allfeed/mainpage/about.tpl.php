<?
	$id = $this->post['id'];
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
	$heading_prefix="page-header__";
	$heading_mod="is--center  is--page-heading  color--green-dark";
	$heading = $this->Azbn->getMeta($id, 'about_heading'); 
	$content = c($id);
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>" role="main"> 
	<div class="<?=$__prefix;?>elem is--posr"> 
		<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
			<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
				<h2 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h2>	
			</div>
			<div class="text__block <?=$__prefix;?>text is--about-index">
				<?=$content;?>
			</div>
		</div>
		<?
			$this->tpl(
			'_/bg', 
				array(
					"block_prefix" => "bg-block__",
					"block_mod" => "is--about-index",
					"block_bg" => "bg-about-index.jpg",
				)
			);
		?>
	</div>
</main>