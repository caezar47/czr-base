<?
$this->tpl(
	'mainpage/header', 
	array(
		"block_prefix" => "header-block__",
		"block_id" => "index-services"
	) 
);
$this->tpl(
	'mainpage/services', 
	array(
		"block_prefix" => "services-index__",
		"block_id" => "index-services"
	) 
);
$this->tpl(
	'mainpage/gallery', 
	array(
		"block_prefix" => "gallery-index__"
	) 
);
$this->tpl(
	'mainpage/about', 
	array(
		"block_prefix" => "about-index__"
	) 
);

$about_reviews_heading = get_field('about_reviews_heading', 3);
$this->tpl(
	'reviews/panel', 
	array(
		"block_prefix"=>"reviews-panel__",
		"block_mod"=>"is--index",
		"block_heading_mod"=>"is--heading  is--center  is--reviews-panel-index",
		"block_heading" => $about_reviews_heading,
	)
);

$this->tpl(
	'blog/panel', 
	array(
		"block_prefix"=>"blog-panel__",
		"block_mod"=>"is--index",
		"heading_prefix"=>"page-header__",
		"heading_mod"=>"is--heading  is--center  is--blog-panel-index",
		"heading"=>"Мнения наших специалистов",
	)
);

$form_id = 180;
$form_heading = get_field('form_heading', $form_id);
$form_heading_small = get_field('heading_small', $form_id);
$form_btn_name = get_field('btn_name', $form_id);
$this->tpl(
	'_/form/panel', 
	array(
		"block_tpl" => "fio-tel-date-time-note",
		"block_prefix" => "form-panel__",
		"block_mod" => "is--lg",
		"block_heading" => $form_heading,
		"block_heading_small" => $form_heading_small,
		"block_form_heading" => $form_heading,
		"block_form_prefix" => "form__",
		"block_form_mod" => "is--inline  is--cols-3",
		"block_form_color" => "",
		"block_form_id" => "fcab",
		"block_btn_name" => $form_btn_name,
		"block_btn_mod" => "is--form-inline",
	)
);
?> 