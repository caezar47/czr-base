<?

$block_prefix = "products-page__";
$heading_small = "Отправляйте заказы нам через сайт";
$heading_color = "is--calc";
$heading = t($this->post['id']);

$order_preset = get_field('order_preset', $this->post['id']);
if($order_preset != '') {
	$order_preset = base64_decode($order_preset);
	$order_preset = json_decode($order_preset, true);
} else {
	$order_preset = array(
		'fields' => array(
			array(
				'uid' => 'amount',
				'title' => 'Количество',
				'label' => 'Количество',
				'type' => 'amount',
				'values' => array(
					'step' => '50',
					'min' => '50',
					'max' => '15000',
				),
				'value' => '500',
			),
			array(
				'uid' => 'vizitki__upload',
				'title' => 'Макет',
				'label' => 'Загрузить макет',
				'type' => 'upload',
				'values' => array(
					
				),
				'value' => '',
			),
		)
	);
} 

/*
$order_preset = array(
	'fields' => array(
		array(
			'uid' => 'vizitki__size',
			'title' => 'Размер',
			'label' => 'Выберите размер',
			'type' => 'select',
			'values' => array(
				'vizitki__size_standard' => 'Стандарт 90*50',
				'vizitki__size_euro' => 'Евро 85*55',
				'vizitki__size_notstandard' => 'Нестандартный',
			),
			'value' => 'vizitki__size_euro',
		),
		array(
			'uid' => 'amount',
			'title' => 'Количество',
			'label' => 'Количество',
			'type' => 'amount',
			'values' => array(
				'step' => '50',
				'min' => '50',
				'max' => '15000',
			),
			'value' => '500',
		),
		array(
			'uid' => 'vizitki__upload',
			'title' => 'Макет',
			'label' => 'Загрузить макет',
			'type' => 'upload',
			'values' => array(
				
			),
			'value' => '',
		),
	),
);
*/

$not_bound = explode(',', $order_preset['not_bound']);
$not_bound_res = array();

if(count($not_bound)) {
	foreach($not_bound as $b) {
		$b_arr = explode('=', trim($b));
		
		if(count($b_arr) == 2) {
			
			$row = array();
			
			foreach($b_arr as $b_arr__item__index => $b_arr__item) {
				$row[$b_arr__item__index][] = explode('.', $b_arr__item);
			}
			
			$b_arr_0 = explode('.', $b_arr[0]);
			$b_arr_1 = explode('.', $b_arr[1]);
			
			//$not_bound_res[$row[0][0]][$row[0][1]] = $row[1];
			$not_bound_res[$b_arr_0[0]][$b_arr_0[1]][$b_arr_1[0]][] = $b_arr_1[1];
			
		}
		
	}
}

$order_preset['not_bound'] = $not_bound_res;

//__theme_ed($order_preset['not_bound']);

?>
<div class="content-block <?=$block_prefix;?>content-block  is--hidden" role="main">	
	<div class="page-header-panel__block  <?=$heading_color;?>">
		<div class="page-header-panel__container container">
			<div class="breadcrumb__block  is--heading  is--blue">
				<ul class="breadcrumb__list  is--heading  is--blue">
					<li class="breadcrumb__list-item">
						<a href="/" class="breadcrumb__list-link">Главная</a>
					</li>
					<li class="breadcrumb__list-item">
						<a href="<?=l(5);?>" class="breadcrumb__list-link"><?=t(5);?></a>
					</li>
					<li class="breadcrumb__list-item is--active"><?=$heading;?></li>
				</ul>
			</div>	
			<div class="page-header__block  is--heading  is--blue  is--panel">
				<h1 class="page-header__heading  is--heading  is--blue  is--panel"><span><?=$heading;?></span></h1>	
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
		<?
		$this->tpl(
			'_/bg-card', 
			array(
				"block_prefix" => "bg-plane__",
				"block_mod" => "is--calc-left  is--speed-100",
				"block_bg" => "bg-plane-calc-yellow.png",
			)
		);
		$this->tpl(
			'_/bg-card', 
			array(
				"block_prefix" => "bg-plane__",
				"block_mod" => "is--calc-right  is--speed-15",
				"block_bg" => "bg-plane-calc-blue.png",
			)
		);
		?>
	</div>
	<div class="container content-block__container <?=$block_prefix;?>container  bg-header__container">	
		<div class="calc-panel__block">
			<div class="calc-panel__row row  is--gutter  is--wrap">
				<div class="calc-panel__cols cols  is--cols-screen-8  is--cols-sm-12">
					<!-- <h4 class="calc-panel__heading">Визитки на картонной бумаге</h4> -->
					<div class="calc-panel__calc-row row  is--wrap  is--gutter15">
						<?
						if(count($order_preset['fields'])) {
							
							$this->tpl(
								'products/calc/form', 
								array(
									'order_preset' => $order_preset,
								)
							);
							
						}
						?>
					</div>
				</div>
				<div class="calc-panel__cols cols  is--cols-screen-4  is--cols-sm-12">
					<div class="calc-result__block">
						<div class="calc-result__inner"> 
							<div class="calc-result__container">
								<div class="calc-result__row">
									
									<?
									if(count($order_preset['fields'])) {
										
										$this->tpl(
											'products/calc/semiresult', 
											array(
												'order_preset' => $order_preset,
											)
										);
										
									}
									?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>