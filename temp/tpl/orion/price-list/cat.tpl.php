<?

$page_id = 3;

$block_prefix = "pricelist-page__";
$bg_card = get_field('bg_card', $page_id);

$heading_small = get_field('page_heading_small', $page_id);
$heading_color = get_field('heading_color', $page_id);
$note_bottom = get_field('note_bottom', $page_id);

$content = array(
	'head' => array(
		'rows' => array(
			array(
				array(
					'col' => 1,
					'row' => 1,
					'small' => '/шт.',
					'value' => 'Тираж',
				),
				array(
					'col' => 1,
					'row' => 1,
					'small' => '',
					'value' => 'Односторонние',
				),
				array(
					'col' => 1,
					'row' => 1,
					'small' => '',
					'value' => 'Двусторонние',
				),
			),
		),
	),
	'body' => array(
		'rows' => array(
			'1234' => array(
				array(
					'col' => 1,
					'row' => 1,
					'is--ruble' => 0,
					'value' => 1234,
				),
				array(
					//'col' => 1,
					//'row' => 1,
					'is--ruble' => 1,
					'value' => 12000,
				),
				array(
					//'col' => 1,
					//'row' => 1,
					'is--ruble' => 1,
					'value' => 123000,
				),
			),
		),
	),
)

?>

<div class="content-block <?=$block_prefix;?>content-block  is--hidden" role="main">	
	<div class="page-header-panel__block  is--hidden  <?=$heading_color;?>">
		<div class="page-header-panel__container container">
			<div class="breadcrumb__block  is--heading  is--blue">
				<ul class="breadcrumb__list  is--heading  is--blue">
					<li class="breadcrumb__list-item">
						<a href="/" class="breadcrumb__list-link">Главная</a>
					</li>
					<li class="breadcrumb__list-item is--active"><?=$this->entity->name;?></li>
				</ul>
			</div>	
			<div class="page-header__block  is--heading  is--blue  is--panel">
				<h1 class="page-header__heading  is--heading  is--blue  is--panel"><span><?=$this->entity->name;?></span></h1>	
				<?if ($heading_small != ""){?>
				<h3 class="page-header__heading-small  is--heading  is--blue  is--panel"><?=$heading_small;?></h3>		
				<?}?>
			</div>
			<?
				$this->tpl(
					'_/bg-round', 
					array(
						"block_prefix"=>"bg-round__",
					)
				);
			?>   
		</div>	
	</div>
	<div class="pricelist-navbar__block dropdown">
		<a href="#" data-toggle="dropdown" class="pricelist-navbar__btn-block">
			<div class="pricelist-navbar__btn">
				<div class="pricelist-navbar__btn-hamb">
					<div class="pricelist-navbar__btn-hamb-item  is--top"></div>
					<div class="pricelist-navbar__btn-hamb-item  is--center"></div>
					<div class="pricelist-navbar__btn-hamb-item  is--bottom"></div>
					<div class="pricelist-navbar__btn-hamb-item  is--left-top"></div>
					<div class="pricelist-navbar__btn-hamb-item  is--right-top"></div>
				</div>
				<div class="pricelist-navbar__btn-name">
					Другие разделы
				</div>
			</div>		
		</a>
		
		<?
		$this->tpl('price-list/navbar', array(
			'cat_id' => $this->entity->term_id,
		));
		?>
		
	</div>
	
	
	<?
	if(count($param['posts'])) {
	?>
	
	<div class="container content-block__container <?=$block_prefix;?>container  bg-header__container">	
		<div class="pricelist-panel__block">
			
			<?
			foreach($param['posts'] as $p) {
				
				$post_fields = array(
					'size' => get_field('size', $p->ID),
					'img' => $this->Imgs->postImg($p->ID, 'full'),
					'pricetable' => $content,//get_field('pricetable', $p->ID),// раскомментировать после отладки!!!
				);
				
				
				
			?>
			
			<div class="pricelist-item__card">	
				<div class="pricelist-item__row row  is--wrap  is--gutter15">
					<div class="pricelist-item__cols cols  is--cols-screen-4  is--preview">
						<h3 class="pricelist-item__heading">
							<?=$p->post_title;?>
							<?
							if($post_fields['size'] != '') {
							?>
							<small>(<?=$post_fields['size'];?>)</small>
							<?
							}
							?>
						</h3>
						<div class="pricelist-item__preview">
							<img src="<?=$post_fields['img'];?>" alt="<?=$p->post_title;?>" />
						</div>
					</div>
					<div class="pricelist-item__cols cols  is--cols-screen-8  is--note">
						
						<?
						if($post_fields['pricetable'] != '') {
						?>
						<div class="pricelist-item__text-block  text__block">
							<div class="table-responsive">
								<table class="table table-bordered">
									
									
									
									<?
									if(count($post_fields['pricetable']['head']['rows'])) {
									?>
									<thead>
										
										<?
										foreach($post_fields['pricetable']['head']['rows'] as $row_index => $row) {
										?>
										<tr data-row-id="<?=$row_index;?>" >
											<?
											foreach($row as $cell_index => $cell) {
											
											?>
											<th colspan="<?=(intval($cell['col']) > 0 ? $cell['col'] : 1);?>" rowspan="<?=(intval($cell['row']) > 0 ? $cell['row'] : 1);?>" >
												
												<?=$cell['value'];?>
												<?if($cell['small'] != ''){?><small><?=$cell['small'];?></small><?}?>
												
											</th>
											<?
											
											}
											?>
										</tr>
										<?
										}
										?>
										
									</thead>
									<?
									}
									?>
									
									
									
									<?
									if(count($post_fields['pricetable']['body']['rows'])) {
									?>
									<tbody>
										
										<?
										foreach($post_fields['pricetable']['body']['rows'] as $row_index => $row) {
										?>
										<tr data-row-id="<?=$row_index;?>" >
											<?
											foreach($row as $cell_index => $cell) {
											
											?>
											<td colspan="<?=(intval($cell['col']) > 0 ? $cell['col'] : 1);?>" rowspan="<?=(intval($cell['row']) > 0 ? $cell['row'] : 1);?>" >
												
												<?if($cell['is--ruble']){?><span class='is--ruble'><?}?>
												<?=number_format($cell['value'], 0, ',', ' ');?>
												<?if($cell['is--ruble']){?></span><?}?>
												
											</td>
											<?
											
											}
											?>
										</tr>
										<?
										}
										?>
										
									</tbody>
									<?
									}
									?>
									
									
									
								</table>
							</div>
						</div>
						<?
						}
						?>
						
					</div>
				</div>
			</div>
			
			<?
			}
			?>
			
		</div>
	</div>
	
	<?
	}
	?>
	
</div> 