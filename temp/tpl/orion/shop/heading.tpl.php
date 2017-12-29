<?

$heading_color = get_field('heading_color', $id);

?>
<div class="<?=$param["block_prefix"];?>block  <?=$heading_color;?>">
	<div class="<?=$param["block_prefix"];?>container container">
		<div class="<?=$param["block_prefix"];?>row row  is--wrap">
			<div class="<?=$param["block_prefix"];?>cols cols  is--heading">
				<div class="<?=$param["block_prefix"];?>inner">
					<a href="<?=l(313);?>" class="<?=$param["block_prefix"];?>preview">
						<?
						$profile_image = $param['profile_data']['profile_image'];
						if($param['profile_data']['profile_image'] == '') {
							$profile_image = 'test';
						}
						?>
						<img src="<?=$profile_image;?>" alt="<?=$param['profile']->data->user_nicename;?>" >
					</a>
					<div class="breadcrumb__block  is--heading  is--blue">
						<ul class="breadcrumb__list  is--heading  is--blue">
							<li class="breadcrumb__list-item">
								<a href="/" class="breadcrumb__list-link">Главная</a>
							</li>
							<li class="breadcrumb__list-item is--active"><?=t($id);?></li>
						</ul>
					</div>	
					<div class="page-header__block  is--heading  is--blue  is--panel">
						
						<?
						if($param['profile']) {
						?>
						<h1 class="page-header__heading  is--heading  is--blue  is--panel"><span>Добрый день, <?=$param['profile']->data->display_name;?></span></h1>
						<?
						}
						?>
						
						<?
						if($param['discount_title'] != '' && $param['profile_data']['profile_auto_discount'] == 1) {
						?>
						<h3 class="page-header__heading-small  is--heading  is--blue  is--panel">Дисконтная система PRO <?=$param['discount_title'];?></h3>
						<?
						}
						?>
						
					</div>
				</div>
			</div>
			<div class="<?=$param["block_prefix"];?>cols cols  is--sale">
				
				<?
				if($param['profile_data']['profile_discount'] && $param['profile_data']['profile_discount'] != '') {
				?>
				<div class="<?=$param["block_prefix"];?>sale">
					<div class="<?=$param["block_prefix"];?>sale-num">
						<span><?=$param['profile_data']['profile_discount'];?></span>%
					</div>	
					<div>Ваша скидка</div>
				</div>
				<?
				}
				?>
				
			</div>	
		</div>	
	</div>	
</div>