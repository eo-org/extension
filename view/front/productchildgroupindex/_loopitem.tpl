{% macro loop(node, currentGroupItemId, isRoot) %}
{% spaceless %}
	{% if isRoot == 1 %}
    <li class='level-1'>
    	<span>{{ node.label }}</span>
    {% else %}
    <li>
    	<a href='{{ node|url("product-list") }}'>{{ node.label }}</a>
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