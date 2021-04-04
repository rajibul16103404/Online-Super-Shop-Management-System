<?php
    $db=mysqli_connect('localhost','root','','swapno');
    $id=$_GET['id'];


    $sql1="select * from register where id='$id'";
    $query=mysqli_query($db,$sql1);
    if(mysqli_num_rows($query)>0)
    {
        while($row=mysqli_fetch_assoc($query))
        {
            ?>


<!DOCTYPE html>
<html><?php include('header.php'); ?>
<br>
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
                margin-bottom: 100px;
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
            <h1>Update User</h1>
            <form action="" method="POST">
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
                <textarea name="address" cols="30" rows="10"><?php echo $row['address']; ?></textarea>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
        <?php include('footer.php') ?>
    </body>
</html>

<?php

        }
    }    
    if(isset($_POST['submit']))
{
    $a=$_POST['email'];
    $b=$_POST['fullname'];
    $c=$_POST['phone'];
    $d=$_POST['address'];
    $sql="update register set email='$a',fullname='$b',phone='$c',address='$d' where id='$id'";

    $qry=mysqli_query($db,$sql);
    if($qry)
    {
        echo "<script>alert('Information of-".$b."- Is Updated.');window.location='viewuser.php'</script>";
    }
    else
    {
        echo "Not Inserted.";
    }
}

?>