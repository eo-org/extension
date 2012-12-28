{% block header %}{% endblock %}
<ul>
	<li class='info'>
		您的当前位置：
	</li>
	<li class='home'><a href='/'>首页</a></li>
	{% for step in breadcrumbArr %}
	
	{% if step.url == null %}
	<li> &gt;&gt; <span>{{step.label}}</span></li>
	{% else %}
	<li> &gt;&gt; <a href='{{step.url}}'>{{step.label}}</a></li>
	{% endif %}
	
	{% endfor %}
</ul>
{% block footer %}{% endblock %}