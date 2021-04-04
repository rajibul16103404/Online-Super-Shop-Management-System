<?php include('header.php'); ?>
    <br><br><br><br><br>
<style>
    .container{
        background: gray;
        width:50%;
        box-sizing: border-box;
        box-shadow: 0px 0px 2px green;
        height: 50%;
        margin: 100px auto;
    }
    table{
        padding: 10px;
    }
    table tr td{
        color: white;
        border-bottom: 2px solid white;
        width: 400px;
        text-align: center;
        font-size: 16px;
        padding: 20px;
    }
    select{
        width: 50%;
        color: black;
        font-size: 16px;
        padding: 5px;
        background: white;
        border: none;
        padding-left: 15px;
        border-radius: 10px;
    }
    input{
        width: 100%;
        color: black;
        font-size: 16px;
        text-align: center;
        padding: 5px;
        background: whitesmoke;
        border: 2px solid gray;
        border-radius: 10px;
    }
    span input{
        width:300px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
        margin: 5px ;
        margin-left: 30%;
    }
    h1{
        background: black;
        color: white;
        text-align: center;
        font-size: 40px;
    }
</style>

<div class="container">
    <h1>Order To Supplier</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    Supplier Name
                </td>
                <td>
                <select name="supplier" id="supplier">
                <?php
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql="select * from supplier";
                    $qry=mysqli_query($db,$sql);
                    if(mysqli_num_rows($qry)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry))
                        {
                    ?>
                    
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                    
                <?php           
                }
                    }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                <select name="product" id="product">
                <?php
                    $sql1="select * from userproduct";
                    $qry1=mysqli_query($db,$sql1);
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry1))
                        {
                    ?>
                    
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                    
                <?php           
                }
                    }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td style="border: none;">
                Product Quantity
                </td>
                <td style="border: none;">
                    <input type="text" name="name" placeholder="Non-decimal amount">
                </td>
            </tr>
            
        </table>
        <span><input type="submit" name="submit" value="Order"></span>
    </form>
</div>

<?php
if(isset($_POST['submit']))
{
    $date=date('yy-m-d');
    $a=$_POST['supplier'];
    $b=$_POST['product'];
    $c=$_POST['name'];
    $sql2="insert into supplierorder (suppliername,name,quantity,status,date) values ('$a','$b','$c','unconfirmed','$date')";
    $qry2=mysqli_query($db,$sql2);
    if($qry2)
    {
        echo "<script>alert('Order Placed Successfully! Please Inform Supplier To Check...');window.location='giveorder.php'</script>";
    }
    else
    {
        echo "Not Inserted";
    }
}
?>



















    <?php include('footer.php'); ?>