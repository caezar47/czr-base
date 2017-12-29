<?
$this->tpl(
	'mainpage/header', 
	array(
		"block_prefix" => "header-block__",
		"block_id" => "header-slider"
	) 
);
$this->tpl(
	'mainpage/advantages', 
	array(
		"block_prefix" => "advantages-panel__"
	) 
);
$this->tpl(
	'products/panel', 
	array(
		"block_prefix" => "products-panel__",
		"block_mod" => "is--index",
		"block_heading_mod" => "is--heading  is--center  is--index-panel"
	) 
);
$form_heading = get_field("form_heading", $id);
$this->tpl(
	'_/form/panel', 
	array(
		"block_tpl" => "fio-tel-products",
		"block_prefix" => "form-panel__",
		"block_mod" => "is--lg",
		"block_heading" => $form_heading,
		"block_heading_small" => "",
		"block_form_heading" => $form_heading,
		"block_form_prefix" => "form__",
		"block_form_mod" => "is--inline  is--cols-3",
		"block_form_color" => "is--white",
		"block_form_id" => "fcab",
		"block_btn_name" => "Отправить",
		"block_btn_mod" => "is--form-inline",
	)
);
$this->tpl(
	'contacts/index', 
	array(
		"block_tpl" => "index",
		"block_prefix" => "contacts-panel__",
		"block_mod" => "is--index",
		"block_heading_mod" => "is--heading  is--center  is--contacts"
	) 
);
?>