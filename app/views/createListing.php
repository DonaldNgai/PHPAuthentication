<form action="{{ urlFor('createListing.post')}}" method="post">

  Owner Name:<br>
  <input type="text" name="ownerName" value="Mickey">
  <br>

  Item Name:<br>
  <input type="text" name="itemName" value="Mouse">

  Description:<br>
  <input type="textarea" name="description" value="Mouse">

  Category:<br>
  <input type="text" name="category" value="Mouse">

  Quantity:<br>
  <input type="text" name="quantity" value="Mouse">

  Cost:<br>
  <input type="text" name="cost" value="Mouse">

  Deposit:<br>
  <input type="text" name="deposit" value="Mouse">

  <br><br>
  <input type="submit" value="Submit">

</form>