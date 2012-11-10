{% macro loop(node) %}
{% spaceless %}
	{% if node.className %}
    <li class='{{node.className}}'>
    	<a class='{{node.className}}' href='{{ node.link }}'>{{ node.label }}</a>
    {% else %}
    <li>
    	<a href='{{ node.link }}'>{{ node.label }}</a>
    {% endif %}
    {% if node.children %}
        <ul>
        {% for childNode in node.children %}
            {{ _self.loop(childNode) }}
        {% endfor %}
        </ul>
    {% endif %}
    </li>
{% endspaceless %}
{% endmacro %} 