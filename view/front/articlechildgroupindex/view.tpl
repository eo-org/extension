{% import "_loopitem.tpl" as loopitem %}

{% if displayBrickName %}
<div class='brick-name'>{{ brickName }}</div>
{% endif %}
<ul class='current-level'>
	{% for node in branchIndexArr %}
		{{ loopitem.loop(node, currentGroupItemId, true) }}
	{% endfor %}
</ul>
<div class='clear'></div>