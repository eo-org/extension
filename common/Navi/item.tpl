{% macro list(node) %}
{% spaceless %}
    <li>
    	<a href='{{ node.url }}'>{{ node.title }}</a>
    {% if node.children %}
        <ul>
        {% for child in node.children %}
            {{ _self.list(child) }}
        {% endfor %}
        </ul>
    {% endif %}
    </li>
{% endspaceless %}
{% endmacro %} 