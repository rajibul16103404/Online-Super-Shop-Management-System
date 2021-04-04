<?php
    $db=mysqli_connect('localhost','root','','swapno');
    $id=$_GET['id'];
    $cartid=$_GET['cartid'];
    if(isset($_POST['submit']))
    {  
        $quantity=$_POST['quantity'];
            $sql1="select * from userproduct where id='$id'";
            $qry1=mysqli_query($db,$sql1);
            if(mysqli_num_rows($qry1)>0)
            {
                while($row=mysqli_fetch_assoc($qry1))
                {
                    $q=$row['quantity'];
                    $sql2="select * from cart where id='$cartid'";
                    $qry2=mysqli_query($db,$sql2);
                    if(mysqli_num_rows($qry2)>0)
                    {
                        while($row1=mysqli_fetch_assoc($qry2))
                        {
                            
                            $q=$row1['quantity'];
                            $total=$row1['discountedprice']*$quantity;
                            $sql="update cart set quantity='$quantity', total='$total' where id='$cartid'";
                            if(mysqli_query($db,$sql))
                            {
                                header('location:cart.php?user='.$_GET['user']);
                            }
                            else
                            {
                                echo "<script>alert('Something went wrong!');</script>";
                            }
                        }
                    }
                }
            }
        
    }
?>

<html>
    <head>
        <title>
            Update Cart
        </title>
        <style>
            .update{
                margin: 200px;
                box-shadow: 0px 0px 8px 2px lightgoldenrodyellow;
                box-sizing: border-box;
                width: 70%;
                padding: 50px;
            }
            input{
                border: 2px solid white;
                background: skyblue;
                border-radius: 10px;
                width: 60%;
                text-align: center;
                font-size: 16px;
                padding: 10px;
            }
            button{
                border: 2px solid white;
                box-shadow: 0px 0px 10px 2px whitesmoke;
                background: lightgray;
                border-radius: 10px;
                width: 20%;
                text-align: center;
                font-size: 20px;
                padding: 10px;
                margin-left: 100px;
                cursor: pointer;
            }
            .back{
                width: 80%;

                text-align: center;
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br><br><br>
        <div class="update">
            <form action="" method="POST">
                <a class="back" href="cart.php?user=<?php echo $_GET['user']; ?>">Back To Cart</a>
                <br><br><br>
                <?php
                    $sql5="select * from cart where id='$cartid'";
                    $qry5=mysqli_query($db,$sql5);
                    if(mysqli_num_rows($qry5)>0)
                    {
                       $r=mysqli_fetch_assoc($qry5);
                    }
                    $sql6="select * from userproduct where id='$id'";
                    $qry6=mysqli_query($db,$sql6);
                    if(mysqli_num_rows($qry6)>0)
                    {
                       $ro=mysqli_fetch_assoc($qry6);
                    }
                    ?>
                <input type="text" name="quantity" value="<?php echo $_GET['qty']; ?>"> 
                <button name="submit">Update Quantity</button>
                <br><br>
                Out Of <?php echo $ro['quantity']; ?> Items.
            </form>
        </div>
        




        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>