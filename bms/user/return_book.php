<?php
session_start();
include "dbconnect.php";

if (isset($_GET["id"])){
	$id=$_GET["id"];
	mysqli_query($link, "delete from books_lend where id=$id");

	mysqli_query($link, "UPDATE books SET available_stock = available_stock + 1 WHERE title LIKE title"

);
?>
<div class="alert alert-success col-lg-12 col-lg-push-">
	<font color="blue">Your Book Has Been Returned!</font>
</div>

<script type="text/javascript">
	window.location="user_profile.php";
</script>
<?php
}
else
	?>
<script type="text/javascript">
	window.location="user_profile.php";
</script>
<?php
