<?php
session_start();
include "dbconnect.php";

if (isset($_GET["id"])){
	$id=$_GET["id"];
	mysqli_query($link, "delete from books where id=$id");
?>

<script type="text/javascript">
	window.location="user_content.php";
</script>
<?php
}
else
?>
<script type="text/javascript">
	window.location="user_content.php";
</script>
<?php
