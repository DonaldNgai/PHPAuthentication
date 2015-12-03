{%extends 'templates/default.php' %}

{% block title %}Home{% endblock %}
{% block content %}
	Home
	<h1>users</h1>

	{% if users is empty %}

		<p>no users yet</p>

	{% else %}

		{%for user in users%}

			{{ user.User_Name }}

		{%endfor%}
		
	{% endif %}
{% endblock %}

