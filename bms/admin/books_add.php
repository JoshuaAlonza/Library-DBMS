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

<html>
<head>
    <center>
        <title>Add Books</title>

    </head>


    <body>

        <div>
            <form name="form1" action="" method="post">
                <h3>Add To Book List</h3>
                <br>
                <div>
                    <input type="text" placeholder="Title" name="title" required=""/>
                </div>
                <div>
                    <input type="text" placeholder="Author's First Name" name="author_first" required=""/>
                </div>

                <div>
                    <input type="text" placeholder="Author's Last Name" name="author_last" required=""/>
                </div>
                <div>
                    <input type="quantity" placeholder="Quantity" name="quantity" required=""/>
                </div>
                <div>
                    <input type="text" placeholder="Available Stock" name="available_stock" required=""/>
                </div>
                <br>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="button" type="submit" name="submit1" value="Add">
                </div>
            </form>
            <?php

            if(isset($_POST['submit1']))
            {
                mysqli_query($link,"INSERT INTO books VALUES('','$_POST[title]','$_POST[author_first]','$_POST[author_last]','$_POST[quantity]','$_POST[available_stock]')");

                ?>
                <div class="alert alert-success col-lg-12 col-lg-push-">
                    <font color="blue"> Book list has been updated!</font>
                </div>

                <?php

            }

            ?>
            <p>
                <a href="user_content.php">Back</a>
            </p>

        </div>

    </body>
</center>
</html>

