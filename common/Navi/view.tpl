{% import "item.tpl" as item %}
<div class='toolbar'>
	<div class='main'>
		<ul class='left'>
			{% for node in naviArr %}
				{{ item.list(node) }}
			{% endfor %}
		</ul> 
		<ul class='right'>
			<li><a href='/admin/account'>我的账户</a></li>
			<li><a href='/admin/index/logout'>退出后台</a></li>
		</ul>
	</div>
	<div class='sub'></div>
</div>