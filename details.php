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
                margin-top:8%; 
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
                width:100%;
                border:3px solid green;
                border-radius:10px;
                height: 100%;
                background:transparent;
                cursor: text;
                font-size:20px;
                text-align: center;
            }
            .product table tr td select{
                width:50%;
                height:100%;
                background:transparent;
                border:1px solid green;
                border-radius:50px;
            }
            span .fa{
                font-size: 50px;
                margin: 55px;
                float: right;
                color: blue;
                border-bottom: 2px solid green;
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
        <img src="productimages/<?php echo $row['image']; ?>" alt="">
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
                <td style="border: none;">
                    Product Quantity
                </td>
                <td style="border: none;">
                   <input type="text" name="quantity" placeholder="Below   <?php echo $row['quantity']; ?> ">
                </td>
            </tr>
        </table>
        <a href="login.php"><span><i class="fa fa-cart-plus"></i></span></a>
        </div>
        <?php
                }
            }
        ?>
    </body>
</html>