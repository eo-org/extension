{% if logoPath == 'none'%}
<a href='/'>LOGO</a>
{% else %}
<a href='/'><img src='{{ logoPath|outputImage }}' /></a>
{% endif %}