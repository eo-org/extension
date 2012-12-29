<div class='float-im-bg'>
	<ul class='float-im'>
	{% for qq in qqArr %}
		<li>
			<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{ qq }}&site=qq&menu=yes">
				<img border="0" src="http://wpa.qq.com/pa?p=2:{{ qq }}:42" alt="点击这里给我发消息" title="点击这里给我发消息">
			</a>
		</li>
	{% endfor %}
	{% for msn in msnArr %}
		<li>
			<a target="_blank" href="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee={{ msn }}&mkt=en-US">
				<img style="border: none;" src="http://messenger.services.live.com/users/{{ msn }}/presenceimage?mkt=en-US" width="16" height="16" />
			</a>
		</li>
	{% endfor %}
	{% for ww in wwArr %}
		<li> 
			<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid={{ ww }}&siteid=cntaobao&status=1&charset=utf-8">
				<img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid={{ ww }}&site=cntaobao&s=1&charset=utf-8" alt="点击这里给我发消息" />
			</a>
		</li>
	{% endfor %}
	</ul>
</div>

<script type='text/javascript'>
$('document').ready(function() {
	var floatDiv = $('.float-im-bg');
	
	floatDiv.appendTo('body');
	floatDiv.css({'position':'absolute', 'top':'175px'});
	var rightPos = $('body').width() - floatDiv.width() - 20;
	rightPos+= "px";
	floatDiv.css({'left':rightPos});
	
	$(window).scroll(function() {
		var topPos = $(window).scrollTop() + 75;
		floatDiv.animate(
			{top: topPos+"px" },
			{queue: false, duration: 350}
		);
	});
	$(window).resize(function() {
		var rightPos = $('body').width() - floatDiv.width() - 20;
		rightPos+= 'px';
		floatDiv.css({'left':rightPos});
	});
});
</script>