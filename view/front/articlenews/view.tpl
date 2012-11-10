{% block header %}{% endblock %}

{% if displayBrickName %}
<div class='title'>{{ title }}</div>
{% endif %}

{% if groupId != 'all' %}
{% block morelink %}<div class='more'><a href='/list-{{ groupId }}/page1.shtml'>MORE</a></div>{% endblock %}
<div class='clear'></div>
{% endif %}

<ul>
{% block list %}
{% for artical in articalRowset %}
	{% block row %}
    <li class='item-{{loop.index}}'>
    	<a href='/article-{{ artical.id }}.shtml' title='{{ artical.label }}' target='_blank'>
    		{{ artical.label|substr(0,20) }}
    	</a>
    	<div class='date'>{{ artical.created|date("Y-m") }}</div>
    			
    	<div class='content'>{{ artical.introtext }}</div>
    </li>
    {% endblock %}
{% endfor %}
{% endblock %}
</ul>

{% block footer %}{% endblock %}