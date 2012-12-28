<div class='more'><a href='/product-list-{{ groupId }}/page1.shtml'>MORE</a></div>
<ul id='product-news-carousel-items'>
	{% for row in rowset %}
	<li>
		<div class="icon"><a href='/product-{{ row.id }}.shtml'><img src="{{row.introicon|outputImage}}" alt="{{row.label}}" /></a></div>
		<div class="label"><a href='/product-{{ row.id }}.shtml'>{{row.label}}</a></div>
		<div class="sku">型号：{{row.sku}}</div>
	</li>
	{% endfor %} 
</ul>
<a id="product-news-carousel-prev" href="#">&nbsp;</a>
<a id="product-news-carousel-next" href="#">&nbsp;</a>
<div id="product-news-carousel-pager"></div>