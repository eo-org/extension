{% macro toPage(pages, routeType, routeMatchParams, getQueryParams) %}
{% spaceless %}
{% if pages.pageCount %}
	{% if pages.previous %}
		<a href="{{ pages.previous | pageLink(routeType, routeMatchParams, getQueryParams) }}">&lt; {{"pre page"|translate}}</a>
	{% else %}
		<span class="disabled">&lt; {{"pre page"|translate}}</span>
	{% endif %}
	
	{% for pg in pages.pagesInRange %}
		{% if pg != pages.current %}
	    <a href="{{ pg | pageLink(routeType, routeMatchParams, getQueryParams) }}">{{ pg }}</a>
		{% else %}
		<span class='current'>{{ pg }}</span>
		{% endif %}
	{% endfor %}
	
	{% if pages.next %}
		<a href="{{ pages.next | pageLink(routeType, routeMatchParams, getQueryParams) }}">{{"next page"|translate}} &gt;</a>
	{% else %}
		<span class="disabled">{{"next page"|translate}} &gt;</span> 
	{% endif %}
{% endif %}
{% endspaceless %}
{% endmacro %} 