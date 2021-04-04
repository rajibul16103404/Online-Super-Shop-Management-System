<?php
if(isset($_POST['submit']))
{
    $a=$_GET['id'];
    $db=mysqli_connect('localhost','root','','swapno');
    $sql="UPDATE supplier SET password='$_POST[password]' WHERE id='$a'";
    $qry=mysqli_query($db,$sql);
    if($qry)
    {
        $sql1="select * from supplier where id='$a'";
        $qry1=mysqli_query($db,$sql1);
        if(mysqli_num_rows($qry1)>0)
        {
            while($row=mysqli_fetch_assoc($qry1))
            {
        echo "<script>alert('Welcome---------------".$row['name']."');window.location='LoggedIn/AdminLoggedIn/SupplierLoggedIn/supplier.php?name=".$row['name']."'</script>";
        }
    }
    }
    else{
        echo "You Are Not Allowed";
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
        width:150px;
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
                <div class="input"><input type="password" name="password" placeholder="Password" required></div>
                <input type="submit" name="submit" value="Set Password">
</form>

















<?php include ('footer.php'); ?>