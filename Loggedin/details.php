<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
    <br><br><br><br><br>
    <head>
        <title>
            Details
        </title>
        <style>
            *{
				padding: 0;
				box-sizing: border-box;
			}
			body{
				background-color: powderblue;
				background-size: cover;
				background-position: center;
				font-family: sans-serif;
			}
            h1{
                color: white;
                font-size: 30px;
                text-align: center;
                margin-top:1%; 
            }
            .product{
                width: 1000px;
                height: 500px;
                margin: 50px auto;
                border: none;
                border-radius: 10px;
            }
            .product img{
                width:50%;
                height:100%; 
                border-right: 5px solid black;
                float: left;
            }
            .product table{
                width: 40%;
                margin: auto;
                margin-top:2%;
                text-align: center;
            }
            .product table tr td{
                border-bottom: 2px solid green;
                padding: 5px;

            }
            .product table tr td input{
                width:60%;
                border: none;
                border-radius:10px;
                height: 100%;
                background:blueviolet;
                color: white;
                cursor: pointer;
                font-size:16px;
                padding: 10px;
                float:right;
            }
            .product table tr td .span input{
                background:skyblue;
                border:1px solid green;
                border-radius:50px;
                padding: 5px;
                border-radius: 10px;
                width: 50%;
                float: left;
                text-align: center;
                cursor: text;
            }
            p{
                font-size: 16px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <?php
            $db=mysqli_connect('localhost','root','','swapno');
            $id=$_GET['id'];
            $sql="select * from userproduct where id='$id'";
            $query=mysqli_query($db,$sql);
            if(mysqli_num_rows($query)>0)
            {
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                    
        <div class="product">
        <img src="../productimages/<?php echo $row['image']; ?>" alt="">
        <h1>Product Details</h1>
        <table>
            <tr>
                <td>
                    Product Category
                </td>
                <td>
                    <?php echo $row['category']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Product Name
                </td>
                <td>
                    <?php echo $row['name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Product Price
                </td>
                <td>
                    <?php echo $row['price']; ?> Taka
                </td>
            </tr>
            <tr>
                <td>
                    Product Offer
                </td>
                <td>
                    <?php echo $row['offer']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Discounted Price
                </td>
                <td>
                    <?php echo $row['discountedprice']; ?> Taka
                </td>
            </tr>
            <tr>
                <td>
                    Amount Saved
                </td>
                <td>
                    <?php echo $row['amountsave']; ?> Taka
                </td>
            </tr>
            <tr>
                <td>
                    Product Quantity
                </td>
                <td>
                <?php
                    if($row['quantity']>0)
                    {
                ?>
                    <form action="conditioncart.php?id=<?php echo $row['id']; ?>&&user=<?php echo $_GET['user']; ?>" method="POST">
                    <div class="span"><input type="text" name="quantity" placeholder=""></div>
                    <p>Out of
                    <?php echo $row['quantity']; ?></p>
                    <?php
                    }
                    else
                    {
                        echo "Out Of Stock!&nbsp&nbsp&nbsp";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td style="border: none;">
                        </td>
                        <td>
                    <input type="submit" name="submit" value="Add To Cart">
                    </form>
                </td>
            </tr>
        </table>
        </div>
        <?php
                }
            }
        ?>
    </body>
</html>