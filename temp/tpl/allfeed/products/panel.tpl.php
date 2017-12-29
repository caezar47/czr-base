<?
	$id = $this->post['id'];
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];
	$heading_prefix="page-header__";
	$heading_mod="is--center  is--page-heading  color--green-dark";
	$heading = $this->Azbn->getMeta($id, 'products_heading'); 
	$products = $this->Azbn->getMeta($id, 'products'); 
	$content = c($id);
	$content_mod = "is--products";

	if(is_array($products) && count($products)) {
?>
<div class="<?=$__prefix;?>panel  <?=$__mod;?>"> 
	<div class="<?=$__prefix;?>elem is--posr"> 
		<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
			<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
				<h2 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h2>	
			</div>
			<div class="<?=$__prefix;?>row row  is--gutter  is--wrap  <?=$content_mod;?>">
				<?				
					foreach($products as $id) {
						$title = t($id);
						$link = l($id);
						$short_text = $this->Azbn->getMeta($id, 'short_text');
						$preview = $this->mdl('Imgs')->postImg($id, '493x340');
						if($preview == ""){
							$preview = "http://via.placeholder.com/493x340";
						}
				?>	
				<div class="<?=$__prefix;?>cols cols  is--cols-4  <?=$content_mod;?>">
					<div class="card-item__card  is--products">
						<a href="<?=$link;?>" class="card-item__preview  is--products">
							<img src="<?=$preview;?>" alt="<?=$title;?>">
						</a>
						<h3 class="card-item__heading  is--products"><a href="<?=$link;?>"><?=$title;?></a></h3>
						<div class="card-item__heading-small  is--products"><?=$short_text;?></div>
					</div>
				</div>
				<?}?>
			</div>
		</div>
	</div>
</div>
<?}?>