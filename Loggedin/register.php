<!DOCTYPE html>
<html><?php include('header.php'); ?>
    <br><br><br><br><br>
    <head>
        <title>Register</title>
        <style>
            .reg{
                background-color: gray;
                transform: translate(30%,20%);
                width:60%;
                height:80%;
                text-align: center;
                border-radius: 10px;
            }
            .reg input{
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
                <input type="password" name="password" placeholder="password" required>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>
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
    $c=$_POST['password'];
    $sql="insert into register (fullname,email,password) values ('$b','$a','$c')";
    $sql1="select * from register where email='$a'";
    $query=mysqli_query($db,$sql1);
    $row=mysqli_fetch_array($query);
    if($row['email']==$a)
    {
        echo "<script>alert('This Email Is Already Registered. Please Log In.');window.location='homepage.php?page=login'</script>";
    }
    else{
    $qry=mysqli_query($db,$sql);
    if($qry)
    {
        echo "<script>alert('Welcome--------------------".$row['fullname']."');window.location='userhomepage.php?page='</script>";
    }
    else
    {
        echo "Not Inserted.";
    }
}
}
?>