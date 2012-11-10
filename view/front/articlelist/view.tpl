{% import "_paginator.tpl" as paginator %}

{% if displayBrickName %}
<div class='title'>{{ title }}</div>
{% endif %}
<div class='clear'></div>

<ul>
{% for row in rowset %}
	<li>
		<a href='/article-{{row.id}}.shtml' title='{{row.label}}'>
			{{row.label}}
		</a>
		<div class='date'>{{row.created|date('Y-m-d')}}</div>
	</li>
{% endfor %}
</ul>

<div class="pagination-control">
{{paginator.toPage(pages, routeType, routeMatchParams)}}
</div>