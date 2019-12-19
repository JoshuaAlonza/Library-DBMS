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
    <title>Admin Registration Form</title>

</head>

    <div>
                <form name="form1" action="" method="post">
                    <h3>Admin Registration Form</h3>
                    <br>
                    <div>
                        <input type="text" placeholder="First Name" name="firstname" required=""/>
                    </div>
                    <div>
                        <input type="text" placeholder="Last Name" name="lastname" required=""/>
                    </div>

                    <div>
                        <input type="text" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" placeholder="Email" name="email" required=""/>
                    </div>
                    <br>
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="button" type="submit" name="submit1" value="Register">
                    </div>


                    <p>
                    <a href="admin_login.php">Log In</a>
                    </p>

                </form>

            <?php

            if(isset($_POST['submit1']))
            {
                mysqli_query($link,"INSERT INTO admin_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]')");

            ?>
            <div class="alert alert-success col-lg-12 col-lg-push-">
                <font color="blue">  Congratulations! You have successfully created a new Admin account!</font>
            </div>
        
            <?php

            }

            ?>

    </div>

</body>
</center>
</html>

