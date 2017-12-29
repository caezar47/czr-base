<?
	$this->tpl(
		'mainpage/header', 
		array(
			"block_prefix" => "header-block__",
			"block_id" => "header-slider"
		) 
	); 
	$this->tpl(
		'products/panel', 
		array(
			"block_prefix" => "content-block__",
			"block_mod" => ""
		) 
	); 
	$this->tpl(
		'mainpage/about', 
		array(
			"block_prefix" => "content-block__",
			"block_mod" => "is--grey  is--hidden"
		) 
	); 
	$this->tpl('mainpage/partners', array());
?>