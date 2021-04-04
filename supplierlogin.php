
<!DOCTYPE html>
<html><?php include('header.php'); ?>
    <br><br><br><br><br>
    <head>
        <title>Log In</title>
        <style>
            .login{
                margin: auto;
                margin-top:10%;
                width: 600px;
                height: 300px;
                background-color: gray;
                text-align: center;
                border-radius: 10px;
            }
            .login input{
                font-size:15px;
                padding: 10px;
                margin: 5px;
                border: 1px solid white;
                box-shadow: 1px 1px 5px 5px gray;
                width: 70%;
                border-radius: 10px;
            }
            .login input[value="Log In"]
            {
                width:30%;
                margin-top:5px;
                cursor: pointer;
            }
            .login input[name="email"]
            {
                margin-top:20px;
                
            }
            .login h1{
                margin-top: 20px;
                text-decoration: underline;
                color: white;
            }
            .login p{
                color: white;
                
            }
            .login p a{
                text-decoration: none;
                font-weight: bolder;
            }
        </style>
    </head>
    <body>
        <div class="login">
        <h1>Suplier Log In</h1>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="submit" name="submit" value="Log In">
            </form>
            
        </div>
        
    </body>

    <?php
    if(isset($_POST['submit']))
    {
    $db=mysqli_connect('localhost','root','','swapno');
    if($db)
    echo "Connected";
    $a=$_POST['username'];
    $b=$_POST['password'];
    $sql="select * from supplier where name='$a' && password='$b'";
    $qry=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($qry);
    if($row['name']==$a && $row['password']==$b)
    {
        echo "<script>alert('Welcome--------------------".$row['name']."');window.location='Loggedin/AdminLoggedIn/SupplierLoggedIn/supplier.php?name=".$row['name']."'</script>";
    }
    else
    {
        echo "<script>alert('Incorrect Username Or Password.');window.location='supplierlogin.php'</script>";
    }
}
?>
<?php include('footer.php'); ?>