<?php include('header.php'); ?>
    <br><br><br><br><br>

<style>
    table{
        width: 60%;
        padding:10px;
        text-align: center;
        margin: 10px auto;
        border: 2px solid lightgray;
        box-shadow: 0px 0px 8px 2px white;
        border-radius: 10px;
    }
    table tr td{
        padding:5px;
        width: 20%;
        text-align: center;
    }

    select{
        width:20%;
        border-radius:10px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        margin: auto;
    }
    input{
        width: 50px;
        text-align: center;
    }
    p .fa{
        text-align: center;
        margin-left: 45%;;
        color: white;
        font-size: 80px;
    }
    .container{
        margin-bottom: 100px;
    }
    .total input{
        background: transparent;
        border: none;
        font-size: 18px;
    }
    h1{
        font-size: 80px;
        color: lightgreen;
        text-align: center;
    }
    .remove .fa{
        font-size: 40px;
        color: red;
    }
    .incdec{
        width: 50px;
        padding: 5px;
        background: yellowgreen;
        color: blue;
        font-weight: bold;
        border: none;
        font-size: 18px;
        cursor: pointer;
    }
    form input{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: violet;
        color: black;
        cursor: pointer;
    }
    .s{
        width: 100px;
        background: lightgreen;
    }
    .delivery{
        width:70%;
        border-radius:10px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        margin: auto;
    }
    .payment{
        width:100%;
        border-radius:10px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        margin: auto;
    }
    .submit button{
        font-size: 30px;
        cursor: pointer;
        color: green;
        border: 2px solid lightgoldenrodyellow;
        box-shadow: 0px 0px 8px 2px whitesmoke;
        border-radius: 10px;
        padding: 5px;
    }
    .total1 input{
        border-radius: none;
        color: black;
        background: none;
        cursor: text;
        width: 150px;
        text-align: center;
    }
    button{
        color: black;
        background: skyblue;
        border: 1px solid lightgoldenrodyellow;
        font-size: 16px;
        padding: 10px;
        cursor: pointer;
        margin: auto;
    }

</style>
<br>
<p><i class="fa fa-shopping-cart">Cart</i></p>
<div class="container">
            <table>
                <tr>
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
                    <td>
                        Remove
                    </td>
                </tr>
                </table>
                <?php
                echo "<br>";
                $sum=0;
                $quantity=0;
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql="select * from cart where username='$_GET[user]'";
                    $qry=mysqli_query($db,$sql);
                    if(mysqli_num_rows($qry)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry))
                        {
                        $sql1="select * from userproduct where name='$row[name]'";
                        $qry1=mysqli_query($db,$sql1);
                        if(mysqli_num_rows($qry1)>0)
                        {
                            $row1=mysqli_fetch_assoc($qry1);
                            $sum=$sum+($row1['discountedprice']*$row['quantity']);
                            $quantity=$quantity+$row['quantity'];
                ?>
                <table>
                <tr >
                    <td>
                        <?php echo $row['name']; ?>
                    </td>
                    <td>
                        <del><span id="price"><?php echo $row1['price']; ?> Taka</span></del>
                        <br>
                        <?php echo $row1['discountedprice']; ?> Taka
                        <br>
                        with
                        <?php echo $row1['offer']; ?>% Offer.
                        
                    </td>
                    <td>
                        <span><?php echo $row['quantity']; ?></span>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <a href="cartupdate.php?id=<?php echo $row1['id']; ?>&&cartid=<?php echo $row['id']; ?>&&user=<?php echo $_GET['user']; ?>&&qty=<?php echo $row['quantity']; ?>"><br><button>Update Quantity</button></a>
                    </td>
                    <td>
                        <?php echo $row['total']; ?> Taka
                    </td>
                    <td>
                        <a href='deletecart.php?cartid=<?php echo $row['id']; ?>&&id=<?php echo $row1['id']; ?>&&user=<?php echo $_GET['user']; ?>&&quantity=<?php echo $row['quantity']; ?>'><span class="remove"><i class="fa fa-times"></i></span></a>
                    </td>
                    
                </tr>
                </table>
                
                <?php
        }
    }
    }
    else{
        echo "<h1>Empty</h1>";
    }
    
?>
<form action="checkout.php?user=<?php echo $_GET['user']; ?>" method="POST">
                <table>
                    <tr>
                        <td></td>
                        <td>
                            
                        </td>
                        <td class="total1"><u> Total Item </u><br><input type="text" name="quantity" value="<?php echo $quantity; ?>"></td> 
                        
                        <td class="total1"><u> Total Taka </u><br><input type="text" name="price" value="<?php echo $sum; ?>"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Delivery Option</td>
                        <td>
                            <select class="delivery" name="deliverycharge">
                                <?php
                                    $sql2="select * from delivery";
                                    $qry2=mysqli_query($db,$sql2);
                                    if(mysqli_num_rows($qry2)>0)
                                    {
                                        while($r=mysqli_fetch_assoc($qry2))
                                        {
                                            echo "<option value='".$r['name']."'>".$r['name']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Payment</td>
                        <td>
                            <select class="payment" name="payment">
                                <option value="Payment Pending">Pay Now</option>
                                <option value="Cash On Delivery">Pay at Delivery</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="submit"><button name="submit1"><i class="fa fa-arrow-right">&nbsp;CheckOut</i></button></span></td>
                    </tr>
                </table>
                </form>

                


<br><br><br>


    <?php include('footer.php'); ?>
    <script type="text/javascript">
        function addone()
        {
            var q=document.getElementById('text').innerHTML;
            q++;
            document.getElementById('text').innerHTML=q;
        }
    </script>