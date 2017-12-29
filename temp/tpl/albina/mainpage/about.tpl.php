<?
	$heading = get_field('about_heading', $id);
	$preview_get = get_field('about_preview', $id);
	$tab_about = get_field('about_tab_about', $id);
	$tab_resume = get_field('about_tab_resume', $id);
	$preview = $this->Imgs->rawImg($preview_get, '660x770');
?>
<div class="<?=$param["block_prefix"];?>block">
	<div class="container <?=$param["block_prefix"];?>container">
		<div class="<?=$param["block_prefix"];?>row row  is--gutter  is--wrap">
			<?if ($preview !=""){?>
			<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-5  is--cols-sm-6  is--cols-xs-l-6">
				<picture class="<?=$param["block_prefix"];?>preview-picture"> 
					<img src="<?=$preview;?>" alt="<?=$heading;?>">
				</picture>
			</div>
			<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-7  is--cols-sm-12">
			<?} else {?>
			<div class="<?=$param["block_prefix"];?>cols cols  is--cols-screen-12  is--cols-sm-12">
			<?}?>
				<div class="<?=$param["block_prefix"];?>note">
					<div class="page-header__block  is--center  is--index-panel">
						<h2 class="page-header__heading  is--center  is--index-panel"><span><?=$heading;?></span></h2>		
					</div>
					<div class="<?=$param["block_prefix"];?>navbar">
						<ul class="<?=$param["block_prefix"];?>nav  is--tabs">
							<?if ($tab_about !=""){?>
							<li class="<?=$param["block_prefix"];?>item  active">
								<a class="<?=$param["block_prefix"];?>link  btn-link__item  " href="#about-about" data-toggle="tab"><span>О центре</span></a>
							</li>
							<?}?>
							<?if ($tab_resume !=""){?>
							<li class="<?=$param["block_prefix"];?>item">
								<a class="<?=$param["block_prefix"];?>link  btn-link__item" href="#about-resume" data-toggle="tab"><span>Резюме</span></a>
							</li>
							<?}?>
						</ul>
					</div>
					<div class="<?=$param["block_prefix"];?>pane-block">
						<?if ($tab_about !=""){?>
						<div class="<?=$param["block_prefix"];?>pane active" id="about-about">
							<div class="<?=$param["block_prefix"];?>text-block  text__block">
								<?=$tab_about;?>
							</div>
						</div>
						<?}?>
						<?if ($tab_resume !=""){?>
						<div class="<?=$param["block_prefix"];?>pane" id="about-resume">
							<div class="<?=$param["block_prefix"];?>text-block  text__block">
								<?=$tab_resume;?>
							</div>
						</div>
						<?}?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>