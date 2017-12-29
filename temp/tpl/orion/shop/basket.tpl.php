<?

$block_prefix = "basket-page__";


$user = wp_get_current_user();
//__theme_ed($user);
$profile_data = array(
	'profile_fio' => get_field('profile_fio', $user),
	'profile_image' => $this->Imgs->rawImg(get_field('profile_image', $user), '90x90'),
	'profile_discount' => get_field('profile_discount', $user),
	'profile_auto_discount' => get_field('profile_auto_discount', $user),
	'all_orders__sum' => get_field('all_orders__sum', $user),
	'profile_phone' => get_field('profile_phone', $user),
	'profile_email' => get_field('profile_email', $user),
	'delivery_adr__index' => get_field('delivery_adr__index', $user),
	'delivery_adr__city' => get_field('delivery_adr__city', $user),
	'delivery_adr__adr' => get_field('delivery_adr__adr', $user),
	'org_requisites' => get_field('org_requisites', $user),
	'is_org' => intval(get_field('is_org', $user)),
);




$discount_title = '';

$discount_programs = new WP_Query(array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'post_parent' => 34,
	'post_status' => 'any',
	'orderby' => array(
		'menu_order' => 'ASC',
		'date' => 'DESC',
		'ID' => 'DESC',
		'name' => 'ASC',
	),
));

//$discounts = array();
$discount_next__value = 0;
$discount_next__percent = 0;

while($discount_programs->have_posts()) {
	$discount_programs->the_post();
	$id = get_the_ID();
	
	$min = intval(get_field('all_orders__sum_min', $id));
	$max = intval(get_field('all_orders__sum_max', $id));
	
	/*
	$discounts[] = array(
		'ID' => $id,
		'title' => t($id),
		'min' => intval(get_field('all_orders__sum_min', $id)),
		'max' => intval(get_field('all_orders__sum_max', $id)),
	);
	*/
	
	if(
		(
			($profile_data['all_orders__sum'] > $min)
			||
			($profile_data['all_orders__sum'] == $min)
		)
		&&
		(
			($profile_data['all_orders__sum'] < $max)
			||
			($profile_data['all_orders__sum'] == $max)
		)
	) {
		
		$discount_title = t($id);
		
	} else if($discount_next__value == 0) {
		
		$discount_next__value = $min;
		$discount_next__percent = get_field('sale', $id);
		
	}
	
}

$in_cart = $this->Cart->getCartItems();
$orders = $this->Cart->getOrders();

$info = $this->Cart->getCartInfo();

?>
<div class="content-block <?=$block_prefix;?>content-block  is--hidden" role="main">
	<?
		$this->tpl(
			'shop/heading', 
			array(
				"block_prefix" => "page-header-panel__",
				'profile' => $user,
				'profile_data' => $profile_data,
				'discount_title' => $discount_title,
			)
		);
	?>
	<?
		$this->tpl(
			'_/bg-card', 
			array(
				"block_prefix" => "bg-plane__",
				"block_mod" => "is--cabinet  is--speed-30",
				"block_bg" => "bg-plane-calc-yellow.png",
			)
		);
	?>
	<div class="container content-block__container cabinet-panel__container  bg-header__container  is--padding-top">
		<div class="cabinet-panel__block">
			<div class="cabinet-panel__row row  is--gutter  is--wrap  is-jcfe">
				<div class="cabinet-panel__cols cols">
					<?
						$this->tpl(
							'shop/sale', 
							array(
								"block_prefix" => "cabinet-sale__",
								'profile_data' => $profile_data,
								'discount_next__percent' => $discount_next__percent,
								'discount_next__value' => $discount_next__value,
							)
						);
					?>
				</div>
			</div>
			<div class="cabinet-panel__row row  is--gutter  is--wrap">
				<div class="cabinet-panel__cols cols  is--cols-screen-2  is--navbar">
					<?
						$this->tpl(
							'shop/navbar', 
							array(
								"block_prefix" => "cabinet-navbar__",
								'in_cart' => $in_cart,
								'orders' => $orders,
							)
						);
					?>
				</div>
				<div class="cabinet-panel__cols cols  is--cols-screen-10  is--cols-sm-12">
					<?
						$this->tpl(
							'shop/basket-step', 
							array(
								"block_prefix" => "basket-step__",
							)
						);
					?>
					
					<?
					if(count($in_cart)) {
					?>
					<div class="orders-card__block">
						<div class="orders-card__text-block text__block">
							<div class="table-responsive">
								<table class="table table-bordered  is--noline">
									<thead>
										<tr>
											<th class="is--left">Заказ</th>
											<th class="is--left">Параметры</th>
											<th class="is--qty">Кол-во<small>, шт</small></th>
											<th class="is--th-cost">Стоимость<small>, руб.</small></th>
											<th class="is--del"></th>
										</tr>
									</thead>
									<tbody>
										
										<?
										foreach($in_cart as $item) {
											
											$id = $item->ID;
											$title = $item->post_title;
											$amount = $this->getMeta($id, 'amount');
											$sum = $this->getMeta($id, 'sum');
											
											$json_data = $this->getMeta($id, 'json_data');
											$json_data = base64_decode($json_data);
											$json_data = json_decode($json_data, true);
											
											$preset = $this->getMeta($json_data['product_id'], 'order_preset');
											$preset = base64_decode($preset);
											$preset = json_decode($preset, true);
											
											$amount_field = array();
											
										?>
										<tr class="azbn__cart__item" data-item-id="<?=$id;?>" >
											<td class="is--left">
												<h4 class="orders-card__table-heading"><a href="#<?=$id;?>"><?=$title;?></a></h4>
											</td>
											<td class="is--left">
												<?
												//__theme_ed($json_data);
												//__theme_ed($preset);
												?>
												<div class="orders-card__table-note">
													
													<?
													if(count($preset['fields'])) {
														foreach($preset['fields'] as $field) {
															
															if($json_data['field'][$field['uid']] != '' && $field['uid'] != 'amount' && $field['uid'] != 'layout') {
															?>
															<div><span><?=$field['title'];?>:</span> <?=$field['values'][	$json_data['field'][$field['uid']]	];?></div>
															<?
															} elseif($json_data['field'][$field['uid']] != '' && $field['uid'] == 'layout') {
															?>
															<div><span><?=$field['title'];?>:</span> <a href="<?=$json_data['field'][$field['uid']];?>" data-fancybox="layouts-slider" >есть</a></div>
															<?
															} elseif($field['uid'] == 'amount') {
																$amount_field = $field;
															}
															
														}
													}
													?>
													<!--
													<div><span>Размер:</span> Cтандарт 90*90</div>
													<div><span>Печать:</span> Односторонняя</div>
													<div><span>Бумага:</span> Majestic</div>
													<div><span>Способ печати:</span> Трафарет</div>
													-->
												</div>
											</td>
											<td>
												<div class="qty-block__block">
													<label class="qty-block__inner">
														<button type="button" class="qty-block__btn  is--minus azbn__cart__item__change-amount-btn " data-change="-<?=$amount_field['values']['step'];?>" >
															<svg class="icon-svg icon-qty-minus" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#qty-minus"></use></svg>
														</button>
														<input type="text" class="qty-block__input azbn__cart__item__amount" value="<?=$amount;?>" >
														<button type="button" class="qty-block__btn  is--plus azbn__cart__item__change-amount-btn "  data-change="<?=$amount_field['values']['step'];?>" >
															<svg class="icon-svg icon-qty-plus" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#qty-plus"></use></svg>
														</button>
													</label>	
												</div>
											</td>
											<td><span class="is--ruble  is--bold azbn__cart__item__sum" ><?=$sum;?></span></td>
											<td class="is--del">
												<button type="button" class="btn__icon azbn__cart__item__delete-pos">
													<svg class="icon-svg icon-btn-del" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-del"></use></svg>
												</button>
											</td>
										</tr>
										<?
										}
										?>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="basket-orders__block">
							<div class="basket-orders__row row  is--jcsb  is--gutter15">
								<div class="basket-orders__cols cols  is--print">
									<a href="javascript:(print());" class="btn-link__item  is--icon  is--xs">
										<div class="btn-link__icon  is--icon  is--xs">
											<svg class="icon-svg icon-btn-icon-print" role="img">
												<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-icon-print"></use>
											</svg>
										</div>
										<span>Распечатать</span>
									</a>
								</div>
								<div class="basket-orders__cols cols  is--cost">
									<div class="basket-orders__cost-block">
										<div class="basket-orders__cost">Стоимость заказа: <span><?=number_format($info['sum'], 0, '.', ' ');?></span></div>
										<?
										if($this->Azbn->Cart->user_data['profile_discount'] != '') {
										?>
										<div class="basket-orders__sale">Цена со скидкой <?=$info['discount'];?>%</div>
										<?
										}
										?>
									</div>
								</div>
							</div>
							<div class="basket-orders__row row  is--jcfe">
								<div class="basket-orders__cols cols">
									<?
									/*
									<button type="button" class="btn__item  is--bg"><span>Заказать</span></button>
									*/
									?>
									<a href="<?=l(318);?>" class="btn__item  is--bg azbn__order__create"><span>Заказать</span></a>
								</div>
							</div>
						</div>
					</div>
					<?
					}
					?>
					
				</div>		
			</div>
		</div> 
	</div>		
	<?
		$this->tpl(
			'_/bg-card', 
			array(
				"block_prefix" => "bg-plane__",
				"block_mod" => "is--basket  is--speed-5",
				"block_bg" => "bg-plane-basket-blue.png",
			)
		);
	?>
</div>