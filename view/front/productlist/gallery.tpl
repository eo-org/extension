{% if displayBrickName %}
<div class='title'>{{ title }}</div>
{% endif %}

<ul>
{% for row in rowset %}
    <li class='item-{{loop.index}}'>
    	<a class='introicon' href='/product-{{ row.id }}.shtml' title='{{ row.label }}' target='_blank'>
			<img src='{{ row.introicon|outputImage }}' data-graphic='{ {{row.attachment|graphicDataJson}} }'/>
		</a>
    	
    	<a class='label' href='/product-{{ row.id }}.shtml' title='{{ row.label }}' target='_blank'>{{ row.label }}</a>
    </li>
{% endfor %}
</ul>

<div class="pagination-control">
{{paginator.toPage(pages, 'application/product-list', routeMatchParams)}}
</div>