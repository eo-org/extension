{% for graphic in graphics %}
	{{ graphic.urlname|outputImage }}
{% endfor %}