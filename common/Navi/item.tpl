{% macro list(node) %}
{% spaceless %}
    <li>
    	<a href='{% if node.orgCode %}/{{node.orgCode}}{% endif %}/admin{% if node.controllerName %}/{{node.controllerName}}{% endif %}'>{{ node.title }}</a>
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