{% block header %}{% endblock %}
{% if displayBrickName %}
<div class='title'>{{ title }}</div>
{% endif %}

{% if groupId != 'all' %}
{% block morelink %}<div class='more'><a href='/product-list-{{ groupId }}/page1.shtml'>MORE</a></div>{% endblock %}
<div class='clear'></div>
{% endif %}

<ul>
{% block rowset %}
{% for row in rowset %}
	<li class="item-{{loop.index}}" style='overflow: hidden;'>
	{% block row %}
		<div class="icon"><a href='/product-{{ row.id }}.shtml'><img src="{{row.introicon|outputImage}}" alt="{{row.label}}" /></a></div>
		<div class="title"><a href='/product-{{ row.id }}.shtml'>{{row.label}}</a></div>
		<div class="sku">型号：{{row.sku}}</div>
	{% endblock %}
	</li>
{% endfor %}
{% endblock %}
</ul>

{% block footer %}{% endblock %}