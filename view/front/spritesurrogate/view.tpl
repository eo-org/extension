<div class='sprite-surrogate grid-tab' stage-id='{{stageId}}' sprite-name='surrogate-{{brickId}}'>
	<div class='tab-handles'>
		{% for tab in tabs %}
		<div class='tab-handle handle-{{loop.index}}'>
			{{ tab.getBrickName() }}
		</div>
		{% endfor %}
	</div>
	<div class='tab-contents' style='position: relative;'>
		{% for tab in tabs %}
		<div class='tab-content'>
			{{ tab.render()|raw }}
		</div>
		{% endfor %}
	</div>
</div>