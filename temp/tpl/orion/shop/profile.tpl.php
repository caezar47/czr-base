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
					
					<div class="cabinet-panel__inner-row row  is--gutter  is--wrap">
						<div class="cabinet-panel__inner-cols cols  is--cols-screen-4  is--cols-sm-4">
							<div class="cabinet-profile-card__item">
								<h3 class="cabinet-profile-card__heading">Персональные данные</h3>
								<div class="cabinet-profile-card__list"><b>ФИО:</b> <span><?=$profile_data['profile_fio'];?></span></div>
								<div class="cabinet-profile-card__list"><b>E-mail:</b> <span><?=$profile_data['profile_email'];?></span></div>
								<div class="cabinet-profile-card__list"><b>Телефон:</b> <span><?=$profile_data['profile_phone'];?></span></div>
								<div class="cabinet-profile-card__link">
									<button type="button" class="btn-link__item  is--xs" data-toggle="modal" data-target="#modal-profile-info"><span>Редактировать</span></button>
								</div>
							</div>
						</div> 
						<div class="cabinet-panel__inner-cols cols  is--cols-screen-4  is--cols-sm-4">	
							<div class="cabinet-profile-card__item">
								<h3 class="cabinet-profile-card__heading">Адрес доставки</h3>
								<div class="cabinet-profile-card__list"><b>Индекс:</b> <span><?=$profile_data['delivery_adr__index'];?></span></div>
								<div class="cabinet-profile-card__list"><b>Город:</b> <span><?=$profile_data['delivery_adr__city'];?></span></div>
								<div class="cabinet-profile-card__list"><b>Адрес:</b> <span><?=$profile_data['delivery_adr__adr'];?></span></div>
								<div class="cabinet-profile-card__link">
									<button type="button" class="btn-link__item  is--xs" data-toggle="modal" data-target="#modal-profile-address"><span>Редактировать</span></button>
								</div>
							</div>
						</div> 
						<div class="cabinet-panel__inner-cols cols  is--cols-screen-4  is--cols-sm-4">
							
							<?
							if($profile_data['is_org']) {
							?>
							<div class="cabinet-profile-card__item">
								<h3 class="cabinet-profile-card__heading">Реквизиты</h3>
								<div class="cabinet-profile-card__list"><b>Файл загружен:</b> <span><a href="<?=$profile_data['org_requisites'];?>" target="_blank">Посмотреть</a></span></div>
								<div class="cabinet-profile-card__link">
									<button type="button" class="btn-link__item  is--xs" data-toggle="modal" data-target="#modal-profile-requisites"><span>Редактировать</span></button>
								</div>
							</div>
							<?
							}
							?>
							
						</div> 
					</div>
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
<?
$modal_id = 322;
$modal_heading = get_field('modal_heading', $modal_id);
$modal_heading_small = get_field('modal_heading_small', $modal_id);
$modal_btn = get_field('modal_btn', $modal_id);
$this->tpl(
	'_/modals/modal', 
	array(
		"block_prefix" => "modal-base__",
		"block_tpl" => "profile-info",
		"block_mod" => "is--enter",
		"block_modal_id" => "modal-profile-info",
		"block_heading" => $modal_heading,
		"block_note" => $modal_heading_small,
		"block_form_id" => "fmpi",
		"block_form_prefix" => "form__",
		"block_form_mod" => "is--sm",
		"block_btn_name" => $modal_btn,
	)
);
$modal_id = 324;
$modal_heading = get_field('modal_heading', $modal_id);
$modal_heading_small = get_field('modal_heading_small', $modal_id);
$modal_btn = get_field('modal_btn', $modal_id);
$this->tpl(
	'_/modals/modal', 
	array(
		"block_prefix" => "modal-base__",
		"block_tpl" => "profile-address",
		"block_mod" => "is--enter",
		"block_modal_id" => "modal-profile-address",
		"block_heading" => $modal_heading,
		"block_note" => $modal_heading_small,
		"block_form_id" => "fmpa",
		"block_form_prefix" => "form__",
		"block_form_mod" => "is--sm",
		"block_btn_name" => $modal_btn,
	)
);
$modal_id = 326;
$modal_heading = get_field('modal_heading', $modal_id);
$modal_heading_small = get_field('modal_heading_small', $modal_id);
$modal_btn = get_field('modal_btn', $modal_id);
$this->tpl(
	'_/modals/modal', 
	array(
		"block_prefix" => "modal-base__",
		"block_tpl" => "profile-requisites",
		"block_mod" => "is--enter",
		"block_modal_id" => "modal-profile-requisites",
		"block_heading" => $modal_heading,
		"block_note" => $modal_heading_small,
		"block_form_id" => "fmpr",
		"block_form_prefix" => "form__",
		"block_form_mod" => "is--sm",
		"block_btn_name" => $modal_btn,
	)
);
?>