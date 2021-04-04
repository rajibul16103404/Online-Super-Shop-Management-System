<!DOCTYPE html>
<html><?php include('header.php'); ?>
<br>
    <head>
        <title>Register</title>
        <style>
            .reg{
                background-color: gray;
                margin:auto;
                margin-top:100px;
                width:60%;
                height:80%;
                text-align: center;
                border-radius: 10px;
            }
            .reg input, textarea{
                font-size:15px;
                padding: 10px;
                margin: 5px;
                border: 1px solid white;
                box-shadow: 1px 1px 5px 5px gray;
                width: 70%;
                border-radius: 10px;
            }
            .reg input[name="submit"]
            {
                width:30%;
                cursor: pointer;
            }
            .reg input[name="email"]
            {
                margin-top: 20px;
            }
            .reg h1{
                color: white;
                text-align: center;
                margin-top: 50px;
                text-decoration: underline;
            }

        </style>
    </head>
    <body>
        
        <div class="reg">
            <h1>User Registration</h1>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="someone@mail.com" required>
                <input type="text" name="fullname" placeholder="full name" required>
                <input type="text" name="phone" placeholder="11-digit phone number" required>
                <textarea name="address" cols="30" rows="10" placeholder="Enter Address" ></textarea>
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
        <?php include('footer.php') ?>
    </body>
</html>

<?php
if(isset($_POST['submit']))
{
    $db=mysqli_connect('localhost','root','','swapno');
    if($db)
    echo "connected";
    $a=$_POST['email'];
    $b=$_POST['fullname'];
    $c=$_POST['phone'];
    $d=$_POST['address'];
    $e=$_POST['password'];
    $sql="insert into register (fullname,email,phone,address,password) values ('$b','$a','$c','$d','$e')";
    $sql1="select * from register where email='$a'";
    $query=mysqli_query($db,$sql1);
    $row=mysqli_fetch_array($query);
    if($row['email']==$a)
    {
        echo "<script>alert('This Email Is Already Registered. Please Log In.');window.location='login.php'</script>";
    }
    else{
    $qry=mysqli_query($db,$sql);
    if($qry)
    {
        echo "<script>alert('".$b." Registered Successfully. Please Log In.');window.location='login.php'</script>";
    }
    else
    {
        echo "Not Inserted.";
    }
}
}
?>