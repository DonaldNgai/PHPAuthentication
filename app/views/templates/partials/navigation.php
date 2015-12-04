<ul>

<li> <a href="{{ urlFor('homepage') }}">Homepage</a> </li>
{% if auth %}
<p>Logged In as {{auth.Username}}</p>
<li> <a href="{{ urlFor('logout') }}">Logout</a> </li>
{% else %}
<li> <a href="{{ urlFor('registerPage') }}">Register</a> </li>
<li> <a href="{{ urlFor('loginPage') }}">Login</a> </li>
{% endif %}

</ul>