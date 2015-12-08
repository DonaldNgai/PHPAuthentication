{%extends 'templates/default.php' %}

{% block title %}Home{% endblock %}
{% block content %}
	<form action="{{ urlFor ('login.post') }}" method='post' autocomplete="off">
		<div>
			<label for="identifier">Username/Email</label>
			<input type="text" name="identifier" id="identifier" {% if request.post('identifier') %} value="{{request.post('identifier')}}"{% endif %}>
		</div>

		<div>
			<label for="password">Password</label>
			<input type="password" name="password" id="password">
		</div>

		<input type="submit" value="Log In">

		<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
	</form>

	<a href="{{loginUrl}}"><img src="../public/images/facebook.png" /></a><br />
{% endblock %}