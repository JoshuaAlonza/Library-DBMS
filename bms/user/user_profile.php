<?php
session_start();
if(!isset($_SESSION["user"]))
{
	?>
	<script type="text/javascript">
		window.location="user_login.php";
	</script>

	<?php
}
include "dbconnect.php";
?>

<br>

<div align="right">
	<a href="logout.php">Logout</a>
</div>

<center>

	<h2> <?php echo 'Hello, '.$_SESSION["user"]; ?> </h2>

	<h3><u>Avalable Books List</u></h3>


	<?php

	$res=mysqli_query($link, "select * from books");
	echo "<table border = 1>";
	echo "<tr>";
	echo "<th>"; echo "Title"; echo "</th>";
	echo "<th>"; echo "Author First Name"; echo "</th>";
	echo "<th>"; echo "Author Last Name"; echo "</th>";
	echo "<th>"; echo "Quantity"; echo "</th>";
	echo "<th>"; echo "Available Stock"; echo "</th>";
	echo "</tr>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>"; echo $row["title"]; echo "</td>";
		echo "<td>"; echo $row["author_first"]; echo "</td>";
		echo "<td>"; echo $row["author_last"]; echo "</td>";
		echo "<td>"; echo $row["quantity"]; echo "</td>";
		echo "<td>"; echo $row["available_stock"]; echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	<br>

	<h3><u>My Books</u></h3>

	<?php

	$res=mysqli_query($link, "SELECT * FROM books_lend WHERE lended_to='{$_SESSION['user']}'");
	echo "<table border = 1>";
	echo "<tr>";
	echo "<th>"; echo "Title"; echo "</th>";
	echo "<th>"; echo "Author First Name"; echo "</th>";
	echo "<th>"; echo "Author Last Name"; echo "</th>";
	echo "</tr>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>"; echo $row["title"]; echo "</td>";
		echo "<td>"; echo $row["author_first"]; echo "</td>";
		echo "<td>"; echo $row["author_last"]; echo "</td>";
		echo "<td>"; ?> <a href="return_book.php?id=<?php echo $row["id"]; ?>">Return</a> <?php
		echo "</tr>";
	}
	echo "</table>";
	?>