<?php
if(isset($_POST['submit']))
{
    $db=mysqli_connect('localhost','root','','swapno');
    $sql="select * from supplier where name='$_POST[name]' ";
    $qry=mysqli_query($db,$sql);
    if($qry)
    if(mysqli_num_rows($qry)>0)
    {
        $row=mysqli_fetch_assoc($qry);
            if($row['password']==null)
            {
                header('location:setpassword.php?id='.$row['id'].'');
            }
            else
            {
                echo "<script>alert('You are already registered. Please Log In');window.location='supplierlogin.php'</script>";
            }
        
    }
    else{
        echo "<script>alert('You are Not registered. Please Contact With Admin');window.location='home.php'</script>";
    }
}
?>

<?php include ('header.php'); ?>
<br><br><br><br><br><br>

<style>
    .input input{
        border-radius: 10px;
        border: 5px solid gray;
        font-size: 20px;
        padding: 5px;
        width:500px;
        text-align: center;
        background-color: lightgray;
        float: left;
        cursor: text;
    }
    input{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
        margin-left: 120px;

    }
    form{
        margin:250px;
    }
    
</style>

<form action="" method="POST">
                <div class="input"><input type="text" name="name" placeholder="Enter Supplier Name (Capitalized)" required></div>
                <input type="submit" name="submit" value="Next">
</form>

















<?php include ('footer.php'); ?>