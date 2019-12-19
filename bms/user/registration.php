<?php
include "dbconnect.php";
?>

<html>
<head>
    <center>
        <title>User Registration Form</title>

    </head>

    <body>

        <div>

            <form name="form1" action="" method="post">
                <h2>User Registration Form</h2>
                <br>
                <div>
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" required=""/>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                </div>
                <br>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="button" type="submit" name="submit1" value="Register">
                </div>

                <p>
                    <a href="user_login.php">Log In</a>
                </p>


            </form>
            <?php

            if(isset($_POST['submit1']))
            {
                mysqli_query($link,"INSERT INTO user_registration values('','$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$_POST[email]')");

                ?>
                <div class="alert alert-success col-lg-12 col-lg-push-">
                    Congratulations! You have successfully registered your account!
                </div>
                
                <?php

            }

            ?>

        </div>

    </body>
</center>
</html>

