{% import "_loopitem.tpl" as loopitem %}

{% block header %}{% endblock %}
{% if displayBrickName %}
<div class='brick-name'>{{ brickName }}</div>
{% endif %}
<ul class='root-level'>
	{% for node in branchIndexArr %}
		{{ loopitem.loop(node, currentGroupItemId, true) }}
	{% endfor %}
</ul>
<div class='clear'></div>
{% block footer %}{% endblock %}