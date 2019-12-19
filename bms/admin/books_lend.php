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
        <title>Lend Books</title>

    </head>


    <body>

        <div>
            <form name="form1" action="" method="post">
                <h3>Lend Book</h3>
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
                    <input type="text" placeholder="Lended To" name="lended_to" required=""/>
                </div>
                <br>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="button" type="submit" name="submit1" value="Lend Book">
                </div>
                <br>
            </form>

            <?php

            if(isset($_POST['submit1']))
            {
                mysqli_query($link, "INSERT INTO books_lend VALUES('','$_POST[title]','$_POST[author_first]','$_POST[author_last]','$_POST[lended_to]')"
            );
                

                ?> <?php

                mysqli_query($link, "UPDATE books SET available_stock = available_stock - 1 WHERE title = '$_POST[title]'"
            );
            ?>
            <div class="alert alert-success col-lg-12 col-lg-push-">
                <font color="blue">Book Lended!</font>
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

