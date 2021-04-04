<!DOCTYPE html>
<html>
<head>
    <title>Track Order</title>
    <style>
        .products{
            margin: 20px auto;
            padding: 50px;
            margin-top: 50px;
            width: 100%;
        }
        .products table{
            box-shadow: 0px 0px 5px 5px lightyellow;
            margin: 10px auto;
            width: 70%;
            padding: 20px;
            border-radius: 10px;
        }
        .products table tr td{
            padding: 10px;
        }
        .products h2{
            font-size: 20px;
            color: slateblue;
            margin-left: 15%;
        }
        
        h3{
            font-size: 18px;
            color: grey;
            margin-left: 15%;
        }
        .products .summery{
            width: 40%;
            margin-left: 45%;
            border-radius: 10px;
        }
        form{
                position: fixed;
                margin-left: 15%;
                margin-top: 30px;
                opacity: .9;
                width:100%;
            }
            form .search{
                font-size: 18px; 
                color: white;
                background: lightgreen;
                padding: 10px;
                border: 2px solid white;
                box-shadow: 0px 0px 5px 2px whitesmoke;
                width: 60%;
                cursor: text;
                border-radius:10px;
            }
            form input{
                font-size: 18px;
                color: white;
                background: lightgreen;
                border: 2px solid white;
                padding: 10px;
                box-shadow: 0px 0px 5px 2px whitesmoke;
                cursor: pointer;
                width:10%;
            }
    </style>
</head>
<body>
    <?php include('header.php'); 
    
    

    ?>
    <br><br><br>
    <form action="" method="POST">
        <span><input class="search" type="text" name="valuetosearch" placeholder="Enter Order Id "></span>
        <input type="submit" name="submit" value="Search">
    </form>
    <div class="fixed">

                    </div>
                <div class="products">
                        <?php
                            $db=mysqli_connect('localhost','root','','swapno');
                            if(isset($_POST['submit']))
                            {
                                $sql3="select * from porder where username='$_GET[user]' ";
                                if(mysqli_query($db,$sql3))
                                {
                                    $valuetosearch=$_POST['valuetosearch'];
                                    $sql2="select * from porder where id='$valuetosearch' ";
                                    $qry2=mysqli_query($db,$sql2);
                                    if(mysqli_num_rows($qry2)>0)
                                    {
                                        while($r=mysqli_fetch_assoc($qry2))
                                        {
                                            echo "<h2>Date:     ".$r['day']."/".$r['month']."/".$r['year']."</h2>";
                                                echo "<h3>Order ID : ".$r['id']."</h3>";
                                                ?>
                                                <table>
                                                <tr>
                                                        <td>
                                                            <u>Product Name</u>
                                                        </td>
                                                        <td>
                                                            <u>Product Price</u>
                                                        </td>
                                                        <td>
                                                            <u>Product Quantity</u>
                                                        </td>
                                                        <td>
                                                            <u>SubTotal</u>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                $sql="select * from checkout where username='$_GET[user]' and orderid='$r[id]'";
                                                $qry=mysqli_query($db,$sql);
                                                if(mysqli_num_rows($qry)>0)
                                                {
                                                    while($ro=mysqli_fetch_assoc($qry))
                                                    {
                                                
                                                ?>
                                                    

                                                    <tr>
                                                        <td>
                                                            <?php echo $ro['name']; ?>
                                                        </td>
                                                        <td>
                                                            <del><?php echo $ro['price']; ?></del>Taka<br>
                                                            <?php echo $ro['discountedprice']; ?>Taka<br>
                                                            with <?php echo $ro['offer']; ?>% Offer.
                                                        </td>
                                                        <td>
                                                            <?php echo $ro['quantity']; ?> &nbsp;Items
                                                        </td>
                                                        <td>
                                                            <?php echo $ro['discountedprice']*$ro['quantity']; ?> &nbsp;Taka
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <table class="summery">
                                                    <tr>
                                                        <td>
                                                            Total Quantity
                                                        </td>
                                                        <td>
                                                            <?php echo $r['totalquantity']; ?>&nbsp;Items
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Price
                                                        </td>
                                                        <td>
                                                            <?php echo $r['totalprice']; ?>&nbsp;Taka
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Delivery Charge
                                                        </td>
                                                        <td>
                                                            <?php echo $r['deliverycharge']; ?>&nbsp;Taka
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Payable Amount
                                                        </td>
                                                        <td>
                                                            <?php echo $r['totalprice']+$r['deliverycharge']; ?>&nbsp;Taka
                                                        </td>
                                                    </tr>
                                                </table>
                                                <?php
                                            }
                                        }    
                                    }
                                    else
                                    {
                                        echo "<h1>No Result Found!</h1>";
                                    }
                                }
                                
                                
                            }
                                else
                                {
                                    $sql1="select * from porder where username='$_GET[user]'";
                                    $qry1=mysqli_query($db,$sql1);
                                    if(mysqli_num_rows($qry1)>0)
                                    {
                                        while($row1=mysqli_fetch_assoc($qry1))
                                        {
                                            echo "<h2>Date:     ".$row1['day']."/".$row1['month']."/".$row1['year']."</h2>";
                                           
                                            echo "<h3>Order ID : ".$row1['id']."</h3>";
                                            ?>
                                            <table>
                                            <tr>
                                                    <td>
                                                        <u>Product Name</u>
                                                    </td>
                                                    <td>
                                                        <u>Product Price</u>
                                                    </td>
                                                    <td>
                                                        <u>Product Quantity</u>
                                                    </td>
                                                    <td>
                                                        <u>SubTotal</u>
                                                    </td>
                                                </tr>
                                                <?php
                                                $sql="select * from checkout where username='$_GET[user]' and orderid='$row1[id]'";
                                                $qry=mysqli_query($db,$sql);
                                                if(mysqli_num_rows($qry)>0)
                                                {
                                                    while($row=mysqli_fetch_assoc($qry))
                                                    {
                                                        ?>
                                
                                        
                                                                    
                                                        <tr>
                                                        
                                                            <td>
                                                                <?php echo $row['name']; ?>
                                                            </td>
                                                            <td>
                                                                <del><?php echo $row['price']; ?></del>Taka<br>
                                                                <?php echo $row['discountedprice']; ?>Taka<br>
                                                                with <?php echo $row['offer']; ?>% Offer.
                                                            </td>
                                                            <td>
                                                                <?php echo $row['quantity']; ?> &nbsp;Items
                                                            </td>
                                                            <td>
                                                                <?php echo $row['discountedprice']*$row['quantity']; ?> &nbsp;Taka
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                    <table class="summery">
                                                        <tr>
                                                            <td>
                                                                Total Quantity
                                                            </td>
                                                            <td>
                                                                <?php echo $row1['totalquantity']; ?>&nbsp;Items
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Total Price
                                                            </td>
                                                            <td>
                                                                <?php echo $row1['totalprice']; ?>&nbsp;Taka
                                                            </td>
                                                       </tr>
                                                        <tr>
                                                            <td>
                                                                Delivery Charge
                                                            </td>
                                                            <td>
                                                                <?php echo $row1['deliverycharge']; ?>&nbsp;Taka
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Total Payable Amount
                                                            </td>
                                                            <td>
                                                                <?php echo $row1['totalprice']+$row1['deliverycharge']; ?>&nbsp;Taka
                                                            </td>
                                                        </tr>
                                                     </table>
                                                    <?php                  
                                                }
                                                
                                            
                                        }
                                    }    
                                    echo "</table>";  
                                }       
                                            ?>
                                </div>






    <br><br><br>
    <?php include('footer.php'); ?>
</body>
</html>
                        