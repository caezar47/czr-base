<div>
<?
echo t($this->post['id']);
?>
</div>

<div>
<?
echo c($this->post['id']);
?>
</div>

<div>
<?
echo '<img src="' . $this->Imgs->postImg($this->post['id']) . '" />';
?>
</div>