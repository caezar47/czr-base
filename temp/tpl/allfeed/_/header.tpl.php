<!DOCTYPE html>
<html <?php language_attributes();?> > 
	<head>
		<?
		$this->tpl('_/head', array());
		wp_head();
		$body_class = '';
		if(is_front_page($body_class)) {}
		?>
	</head>
	<body <?php body_class($body_class); ?>
		data-azbn7='{"php_process_session":"","path":{"root":""}}'
		data-azbn7__mdl__api='{"request_method":"POST","access_as":"profile","key":""}'
		>
		<?
		$this->tpl(
			'_/navbar', 
			array(
				"block_prefix"=>"navbar__",
			)
		);
		?>