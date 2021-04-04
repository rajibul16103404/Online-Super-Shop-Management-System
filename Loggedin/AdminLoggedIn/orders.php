<!DOCTYPE html>
<html>
    <head>
        <style>
        body{
            text-align: center;
        }
            .baddress{
                margin: -50px auto;
                padding: 50px;
                width:60%;
                
            }
            .baddress table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 100%;
                padding: 20px;
            }
            .baddress table tr td{
                padding: 10px;
                text-align:center;
            }
            .baddress h2{
                font-size: 18px;
                color: gray;
                text-align:left;
            }
            .pdetails{
                margin: 20px auto;
                padding: 50px;
                margin-top: -120px;
                width:60%;
            }
            .pdetails table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 100%;
                padding: 20px;
            }
            .pdetails table tr td{
                padding: 10px;
                text-align:center;
            }
            .pdetails h2{
                font-size: 18px;
                color: gray;
                text-align:left;
            }
            .ordersummery{
                margin: 20px auto;
                padding: 50px;
                margin-top: -120px;
                width:60%;
            }
            .ordersummery table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                padding: 20px;
                width: 100%;
            }
            .ordersummery table tr td{
                padding: 10px;
                text-align:rigcenterht;
            }
            .ordersummery h2{
                font-size: 18px;
                color: gray;
                text-align:left;
            }
            h1, h4, hr{
                margin:0;
                padding:0;
                background: gray;
                margin-left: 15%;
                width:62%;
                text-align:left;
            }
            form{
                position: fixed;
                margin-left: 0%;
                margin-top: -90px;
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
        <?php include('header.php'); ?>
        <br><br><br><br><br><br><br><br><br>

        <form action="" method="POST">
            <span><input class="search" type="text" name="valuetosearch" placeholder="Enter Order ID / Date / Payment Status"></span>
            <input type="submit" name="submit" value="Search">
        </form>

        <?php
            $db=mysqli_connect('localhost','root','','swapno');
            if(isset($_POST['submit']))
            {
                $sql="select * from porder where concat(id,day,month,year,status) like '%".$_POST['valuetosearch']."%' ";
            $qry=mysqli_query($db,$sql);
            if(mysqli_num_rows($qry)>0)
            {
                while($row=mysqli_fetch_assoc($qry))
                {
                    $sql1="select * from register where fullname= '$row[username]' ";
                    $qry1=mysqli_query($db,$sql1);
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row1=mysqli_fetch_assoc($qry1))
                        {
                    ?>
                   
                    <h1><?php echo $row['day']."/".$row['month']."/".$row['year']; ?></h1>
                    <h4>Order ID    :   <?php echo $row['id']; ?></h4>
                   
                    <div class="baddress">
                        <h2>Billing Address</h2>
                        <table>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    <?php echo $row1['fullname']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone
                                </td>
                                <td>
                                    <?php echo $row1['phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    <?php echo $row1['address']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="pdetails">
                        <h2>Product Details</h2>
                        <table>
                            <tr style="font-size:20px;font-weight:bold;background:whitesmoke;">
                                <td>
                                    Product Name
                                </td>
                                <td>
                                    Product Price
                                </td>
                                <td>
                                    Product Quantity
                                </td>
                                <td>
                                    Subtotal
                                </td>
                            </tr>
                            <?php
                                $sql2="select * from checkout where orderid= '$row[id]' ";
                                $qry2=mysqli_query($db,$sql2);
                                if(mysqli_num_rows($qry2)>0)
                                {
                                    while($row2=mysqli_fetch_assoc($qry2))
                                    {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row2['name']; ?>
                                </td>
                                <td>
                                    <del><?php echo $row2['price']; ?></del>Taka<br>
                                    <?php echo $row2['discountedprice']; ?>Taka<br>
                                    with <?php echo $row2['offer']; ?>% Offer.
                                </td>
                                <td>
                                    <?php echo $row2['quantity']; ?>Items
                                </td>
                                <td>
                                    <?php echo $row2['discountedprice']*$row2['quantity']; ?> Taka
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    }
                }
                
                    ?>
                        </table>
                    </div>
                    


                    <div class="ordersummery">
                        <h2>Order Summery</h2>
                        <table>
                            <tr>
                                <td>
                                    Total Cost
                                </td>
                                <td>
                                <?php echo $row['totalprice']; ?> Taka
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Delivery Charge
                                </td>
                                <td>
                                <?php echo $row['deliverycharge']." Taka.&nbsp"; ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['deliverycharge']==200)
                                    echo "<p style='color:red;'>Have to deliver<br> within 24 hours.</p>";
                                    else
                                    echo "<p style='color:red;'>Have to deliver<br> within 7 working days.</p>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Payable Cost
                                </td>
                                <td>
                                <?php echo $row['totalprice']+$row['deliverycharge']; ?> Taka
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Payment Status
                                </td>
                                <td>
                                <?php echo $row['status']; ?>.
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    
                    
                    <?php
                        }
                    }
                    else{
                        echo "<h1>No Results Found!</h1>";
                    }    
                
            }
            else
            {
                $sql="select * from porder";
            $qry=mysqli_query($db,$sql);
            if(mysqli_num_rows($qry))
            {
                while($row=mysqli_fetch_assoc($qry))
                {
                    $sql1="select * from register where fullname= '$row[username]' ";
                    $qry1=mysqli_query($db,$sql1);
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row1=mysqli_fetch_assoc($qry1))
                        {
                    ?>
                   
                    <h1><?php echo $row['day']."/".$row['month']."/".$row['year']; ?></h1>
                    <h4>Order ID    :   <?php echo $row['id']; ?></h4>
                    
                    <div class="baddress">
                        <h2>Billing Address</h2>
                        <table>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    <?php echo $row1['fullname']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone
                                </td>
                                <td>
                                    <?php echo $row1['phone']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    <?php echo $row1['address']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="pdetails">
                        <h2>Product Details</h2>
                        <table>
                            <tr style="font-size:20px;font-weight:bold;background:whitesmoke;">
                                <td>
                                    Product Name
                                </td>
                                <td>
                                    Product Price
                                </td>
                                <td>
                                    Product Quantity
                                </td>
                                <td>
                                    Subtotal
                                </td>
                            </tr>
                            <?php
                                $sql2="select * from checkout where orderid= '$row[id]' ";
                                $qry2=mysqli_query($db,$sql2);
                                if(mysqli_num_rows($qry2)>0)
                                {
                                    while($row2=mysqli_fetch_assoc($qry2))
                                    {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row2['name']; ?>
                                </td>
                                <td>
                                    <del><?php echo $row2['price']; ?></del>Taka<br>
                                    <?php echo $row2['discountedprice']; ?>Taka<br>
                                    with <?php echo $row2['offer']; ?>% Offer.
                                </td>
                                <td>
                                    <?php echo $row2['quantity']; ?>Items
                                </td>
                                <td>
                                    <?php echo $row2['discountedprice']*$row2['quantity']; ?> Taka
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    }
                }
                    ?>
                        </table>
                    </div>
                    


                    <div class="ordersummery">
                        <h2>Order Summery</h2>
                        <table>
                            <tr>
                                <td>
                                    Total Cost
                                </td>
                                <td>
                                <?php echo $row['totalprice']; ?> Taka
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Delivery Charge
                                </td>
                                <td>
                                <?php echo $row['deliverycharge']." Taka.&nbsp"; ?>
                                </td>
                                <td>
                                    <?php
                                    if($row['deliverycharge']==200)
                                    echo "<p style='color:red;'>Have to deliver<br> within 24 hours.</p>";
                                    else
                                    echo "<p style='color:red;'>Have to deliver<br> within 7 working days.</p>";
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Payable Cost
                                </td>
                                <td>
                                <?php echo $row['totalprice']+$row['deliverycharge']; ?> Taka
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Payment Status
                                </td>
                                <td>
                                <?php echo $row['status']; ?>.
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    
                    
                    <?php
                        }
                    }
                }
            
        
        ?>
            
            
                   
                    

        

        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>