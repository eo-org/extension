{% macro loop(node, bookAlias) %}
{% spaceless %}
    <li>
    {% if node.alias %}
    	<a href='/{{bookAlias}}/{{ node.alias }}.shtml'>{{ node.label }}</a>
    {% else %}
    	<a href='/{{bookAlias}}/{{ node.id }}.shtml'>{{ node.label }}</a>
    {% endif %}
    
    {% if node.children %}
        <ul>
        {% for childNode in node.children %}
            {{ _self.loop(childNode, bookAlias) }}
        {% endfor %}
        </ul>
    {% endif %}
    </li>
{% endspaceless %}
{% endmacro %} 