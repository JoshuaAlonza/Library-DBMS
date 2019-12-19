<?php
include "dbconnect.php";
session_start();
?>

<html>
<head>
    <center>
        <title>Admin Login</title>
    </head>

    <br>

    <body>
        

        <div>

            <form name="form1" action="" method="post">
                <h2>Admin Login Form</h2>
                <br>
                <div>
                    <input type="text" name="username" placeholder="Username" required=""/>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" required=""/>
                </div>
                <br>
                <div>
                    <input class="button" type="submit" name="submit1" value="Login">
                </div>
                <br>

                
            </form>
        </section>

    </div>

    <?php
    if(isset($_POST['submit1']))
    {
        $count=0;
        $res=mysqli_query($link,"SELECT * FROM admin_registration WHERE username='$_POST[username]' && password='$_POST[password]'");
        $count=mysqli_num_rows($res);

        if($count==0)
        {
            ?>
            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                <font color="red">Your Entry Was Incorrect</font>
            </div>

            <?php
        }
        else
        {
            $_SESSION["admin"]=$_POST["username"];
            ?>
            <script type="text/javascript">
                window.location="user_content.php";
            </script>
            <?php
        }
    }
    ?>

</body>
</html>
