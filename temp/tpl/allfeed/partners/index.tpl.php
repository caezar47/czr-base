<?
	$__prefix="content-block__";
	$__mod="is--full";
	$content_mod="is--partners";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";

	$content = c($this->post['id']);
?>

<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
				<?
				// хлебные крошки первого уровня
				$this->tpl(
					'_/bread', 
					array(
						"block_prefix" => "breadcrumb__",
						"block_mod" => "is--center"
					)
				);
				// заголовок страницы		
				$this->tpl(
					'_/heading', 
					array(
						"block_prefix" => "page-header__",
						"block_mod" => "is--page-heading  is--center"
					)
				);
				?>
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
</main>