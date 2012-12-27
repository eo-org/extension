{% macro loop(node, currentGroupItemId, isRoot) %}
{% spaceless %}
	{% if node.disabled == 'yes' %}
	<li {{isRoot == 1 ? "class='root'" : ''}}>
    	<span {{isRoot == 1 ? "class='root'" : ''}}>{{ node.label }}</span>
	{% else %}
		{% if currentGroupItemId == node.id %}
    <li {{isRoot == 1 ? "class='root selected'" : "class='selected'"}}>
    	<a {{isRoot == 1 ? "class='root selected'" : "class='selected'"}} href='{{ node|url("list") }}'>{{ node.label }}</a>
		{% else %}
    <li {{isRoot == 1 ? "class='root'" : ''}}>
    	<a {{isRoot == 1 ? "class='root'" : ''}} href='{{ node|url("list") }}'>{{ node.label }}</a>
		{% endif %}
	{% endif %}
	
    {% if node.children %}
        <ul>
        {% for childNode in node.children %}
            {{ _self.loop(childNode, currentGroupItemId) }}
        {% endfor %}
        </ul>
    {% endif %}
    </li>
{% endspaceless %}
{% endmacro %} 