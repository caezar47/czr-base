<?
	$__prefix="content-block__";
	$__mod="is--full";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";

	$content = c($this->post['id']);
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="text__container">
				<div class="text__inner">
					<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
						<?
						// заголовок страницы		
						$this->tpl(
							'_/heading', 
							array(
								"block_prefix" => "page-header__",
								"block_mod" => "is--page-heading  is--center",
								"block_heading" => "Cтраница не найдена"
							)
						);
						?>
					</div>
					<div class="<?=$__prefix;?>btn  is--404">
						<p><a href="<?=l(1);?>" class="btn__item"><span class="btn__item-name">Ha главную</span></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>