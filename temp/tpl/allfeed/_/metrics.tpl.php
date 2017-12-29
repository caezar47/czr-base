<script>
(function(){
	
	var l = window.location;
	var t = new Date().getTime();
	
	var i = document.createElement('img');
	i.width = 0; i.height = 0;
	i.onload = function(){document.body.appendChild(i);};
	i.setAttribute('src', 'http://app.azbn.ru/counter/common/?h=' + l.hostname + '&p=' + l.port + '&lt=' + t);
	
})();
</script>