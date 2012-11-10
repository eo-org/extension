{% import "_paginator.tpl" as paginator %}

{% if displayBrickName %}
<div class='title'>{{ title }}</div>
{% endif %}
<div class='clear'></div>

<ul>
{% for row in rowset %}
	<li class='item-{{loop.index}}'>
    	<a class='introicon' href='/product-{{ row.id }}.shtml' title='{{ row.label }}' target='_blank'>
			<img src='{{ row.introicon|outputImage }}' />
		</a>
    	
    	<a class='label' href='/product-{{ row.id }}.shtml' title='{{ row.label }}' target='_blank'>{{ row.label }}</a>
    	
    	<div class='price'>
    	价格：{{ row.price }}
    	</div>
    </li>
{% endfor %}
</ul>

<div class="pagination-control">
{{paginator.toPage(pages, routeType, routeMatchParams)}}
</div>