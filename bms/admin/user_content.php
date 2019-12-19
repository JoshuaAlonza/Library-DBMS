<?php
session_start();
if(!isset($_SESSION["admin"]))
{
	?>
	<script type="text/javascript">
		window.location="admin_login.php";
	</script>

	<?php
}
include "dbconnect.php";
?>

<div align="right">
	<a href="logout.php">Logout</a>
</div>

<center>

	<h2> <?php echo 'Hello, '.$_SESSION["admin"]; ?> </h2>

	<h3><u>List of Registered Users</u></h3>

	<?php
	$res=mysqli_query($link, "select * from user_registration");
	echo "<table border = 1>";
	echo "<tr>";
	echo "<th>"; echo "Firstname"; echo "</th>";
	echo "<th>"; echo "Lastname"; echo "</th>";
	echo "<th>"; echo "Username"; echo "</th>";
	echo "<th>"; echo "Email"; echo "</th>";
	echo "</tr>";
	while($row=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>"; echo $row["firstname"]; echo "</td>";
		echo "<td>"; echo $row["lastname"]; echo "</td>";
		echo "<td>"; echo $row["username"]; echo "</td>";
		echo "<td>"; echo $row["email"]; echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>

	<br>


	<h3><u>Books List</u></h3>

	<p>
		<a href="books_add.php">Add Books</a>
		&nbsp;
		<a href="books_lend.php">Lend Books</a>
	</p>


	<form name="form1" action="" method="post">
		<input type="text" name="entry" placeholder="Search Book Title">
		<input type="submit" name="submit1" value="Search" button>
	</form>


	<?php

	if (isset($_POST["submit1"]))
	{

		$res=mysqli_query($link, "select * from books  where title like('%$_POST[entry]%')");
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
			echo "<td>"; ?> <a href="books_del.php?id=<?php echo $row["id"]; ?>">Remove</a> <?php

			echo "</tr>";
		}
		echo "</table>";

	}
	else {
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
			echo "<td>"; ?> <a href="books_del.php?id=<?php echo $row["id"]; ?>">Remove</a> <?php
			echo "</tr>";
		}
		echo "</table>";
	}
	?>