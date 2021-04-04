<!DOCTYPE html>
<html>
    <head>
        <style>
            form{
                margin-left:40%;
                margin-top:15%;
            }
            form span input{
                width:20%;
                font-size:20px;
                color:black;
                padding:10px;
                border:none;
                background:whitesmoke;
                margin-right:20px;
                cursor: text;
            }
            form input{
                border: none;
                border-radius:10px;
                height: 100%;
                background:green;
                color: white;
                cursor: pointer;
                font-size:18px;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br><br>
            <?php
                $db=mysqli_connect('localhost','root','','swapno');
                $id=$_GET['id'];
                $sql="select * from userproduct where id= ".$id." ";
                $qry=mysqli_query($db,$sql);
                if(mysqli_num_rows($qry)>0)
                {
                    while($row=mysqli_fetch_assoc($qry))
                    {
            ?>


        <form action="" method="POST">
            <h1>Previous Offer <strong><?php echo $row['offer']; ?>%</strong></h1>
            <span><input type="text" name="inoffer" placeholder="Enter Offer%"></span>
            <input type="submit" name="submit" value="Increase">
        </form>
            
            <?php
            }
        }
            
            if(isset($_POST['submit']))
            {
                $ioffer=$_POST['inoffer'];
                $upd="update userproduct set offer=$ioffer where id=$id";
                $query=mysqli_query($db,$upd);
                if($query)
                {
                    echo "<script>alert('Offer Increased Successfully!');window.location='admin.php'</script>";
                }
                else{
                    echo "<script>alert('Something Went Wrong!');window.location='offerincrease.php?id=".$row['id']."'</script>";
                }
            }
            ?>



        <?php include('footer.php'); ?>
    </body>
</html>



