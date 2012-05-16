{% import "item.tpl" as item %}
<div class='toolbar'>
	<div class='main'>
		<ul class='left'>
			{% for node in naviArr['left'] %}
				{{ item.list(node) }}
			{% endfor %}
		</ul> 
		<ul class='right'>
			{% for node in naviArr['right'] %}
				{{ item.list(node) }}
			{% endfor %}
		</ul>
	</div>
	<div class='sub'></div>
</div>