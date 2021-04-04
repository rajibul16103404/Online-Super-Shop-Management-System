<!DOCTYPE html>
<html>
    <head>
        <title>
            Final Checkout
        </title>
        <style>
            .recipt{
                margin: 20px auto;
                box-shadow: 0px 0px 18px 8px lightgoldenrodyellow;
                width: 60%;
                border-radius: 10px;
            }
            .billingaddress{
                margin: 20px auto;
                padding: 50px;
                
            }
            .billingaddress table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 100%;
                padding: 20px;
            }
            .billingaddress table tr td{
                padding: 10px;
            }
            .billingaddress h1{
                font-size: 18px;
                color: gray;

            }
            .products{
                margin: 20px auto;
                padding: 50px;
                margin-top: -100px;
            }
            .products table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 100%;
                padding: 20px;
            }
            .products table tr td{
                padding: 10px;
            }
            .products h1{
                font-size: 18px;
                color: gray;

            }
            .total{
                margin: 20px auto;
                padding: 50px;
                margin-top: -100px;
            }
            .total table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 70%;
                padding: 20px;
                margin-left: 30%;
                
            }
            .total table tr td{
                padding: 10px;
            }
            .total h1{
                font-size: 18px;
                color: gray;

            }
            button{
                color: white;
                background: blue;
                width: 150px;
                height: 40px;
                padding: 5px;
                border-radius: 10px;
                cursor: pointer;
                font-size: 20px;
                border: none;
                box-shadow: 0px 0px 5px 2px whitesmoke;
            }
            span{
                color: red;
                font-size: 16px;
            }
            b{
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br><br><br><br>

        <div class="recipt">
            <div class="billingaddress">
                <h1>Billing Address</h1>
                <?php
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql="select * from register where fullname='$_GET[user]'";
                    $qry=mysqli_query($db,$sql);
                    if(mysqli_num_rows($qry)>0)
                    {
                        $row=mysqli_fetch_assoc($qry);
                    ?>
                    
                    <table>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <?php echo $row['fullname']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone Number
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                        </tr>
                    </table>
                    
                    <?php
                    }
                ?>
            </div>

            <div class="products">
                <h1>Product Details</h1>
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
                    $sql1="select * from copycart where orderid='$_GET[orderid]'";
                    $qry1=mysqli_query($db,$sql1);
                    $total=0;
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row1=mysqli_fetch_assoc($qry1))
                        {
                            $total+=$row1['discountedprice']*$row1['quantity'];
                ?>

                    
                        <tr>
                            <td>
                                <?php echo $row1['name']; ?>
                            </td>
                            <td>
                                <del><?php echo $row1['price']; ?></del>Taka<br>
                                <?php echo $row1['discountedprice']; ?>Taka<br>
                                with <?php echo $row1['offer']; ?>% Offer.
                            </td>
                            <td>
                                <?php echo $row1['quantity']; ?>Items
                            </td>
                            <td>
                                <?php echo $row1['discountedprice']*$row1['quantity']; ?> Taka
                            </td>
                        </tr>
                    

                <?php
                    }
                }
                ?>
                </table>
            </div>
            <div class="total">
                <h1>Order Summery</h1>
                <?php
                    $sql2="select * from porder where id='$_GET[orderid]'";
                    $qry2=mysqli_query($db,$sql2);
                    if(mysqli_num_rows($qry2)>0)
                    {
                        $row2=mysqli_fetch_assoc($qry2);
                ?>
                            <table>
                                <tr>
                                    <td>
                                    Order Id:    &nbsp;<?php echo $row2['id']; ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        Total Cost
                                    </td>
                                    <td>
                                        <?php echo $total; ?>&nbsp;Taka
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Delivery Charge
                                    </td>
                                    <td>
                                        <?php echo $row2['deliverycharge']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Delivery Summary
                                    </td>
                                <?php
                                    if($row2['deliverycharge']==200)
                                    {
                                        echo "<td>
                                        Order will be deliver within 24 working hours.
                                        </td></tr>";
                                    }
                                    else if($row2['deliverycharge']==180)
                                    {
                                        echo "<td>
                                        Order will be deliver within 7 working days.
                                        </td></tr>";
                                    }
                                ?>
                                <tr>
                                    <td>
                                        Total Payable Cost
                                    </td>
                                    <td>
                                        <?php echo $total+$row2['deliverycharge']; ?>&nbsp;Taka.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Payment Status
                                    </td>
                                    <td>
                                        <?php echo $row2['status']; ?>
                                    </td>
                                </tr>
                                <?php
                                    if($row2['status']=="Payment Pending")
                                    {
                                        ?>
                                            <tr>
                                                <td>
                                                    <span><b>*</b>You have to pay in order to get your product delivered.*</span>
                                                </td>
                                                <td>
                                                    <a href="../paymentform.php?amount=<?php echo ($total+$row2['deliverycharge'])/80; ?>" target="_blank"><button>Pay Now</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                <?php
                    }
                ?>
            </div>
        </div>




    <input type="submit" name="submit" value="Print">


        



        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>