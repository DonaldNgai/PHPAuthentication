<h1>Listings</h1>

{% if Listings is empty %}

	<p>No Listings Yet</p>

{% else %}

	{%for Listing in Listings%}

		<a href="{{ urlFor('userPage', {'userName': Listing.OwnerName}) }}">{{ Listing.OwnerName}}</a>
		<br>
		{{ Listing.OwnerName}} is renting {{ Listing.ItemName}}

	{%endfor%}
	
{% endif%}