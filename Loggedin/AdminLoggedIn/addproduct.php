<?php include('header.php'); ?>
    <br><br><br><br><br>

    <style>
        table{
        margin:30px auto;
        border: none;
        width:40%;
        box-shadow: 0px 0px 10px 5px lime;
        border-radius: 10px;
    }
    table tr td{
        padding:10px;
        text-align: center;
    }
    table tr td input{
        font-size: 16px;
        width:100%;
        border-radius: 10px;
        text-align: center;
        border: none;
        padding: 10px;
    }
    span input{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
    }
        select{
            width:100%;
            border-radius:10px;
            border: none;
            font-size:15px;
            padding: 10px;
        }
        .select select{
            width:33%;
            float: left;
            padding: 10px;
        }
        h2{
            text-align: center;
            color: green;
            font-size:17px;
        }
        .date select{
            width: 33%;
            float: left;
        }

    </style>

    <?php
	if(isset($_POST['submit']))
	{
        $db=mysqli_connect("localhost","root","","swapno");
        $filename=$_FILES['image']['name'];
        $filetempname=$_FILES['image']['tmp_name'];
        $folder='../../productimages/'.$filename;
        move_uploaded_file($filetempname, $folder);
        $a=$_POST['name'];
        $b=$_POST['price'];
        $c=$_POST['offer'];
        $d=($b-($b*($c/100)));
        $f=$b-$d;
        $l=$_POST['quantity'];
        $h=$_POST['category'];
        $e=$_POST['day'];
        $n=$_POST['month'];
        $g=$_POST['year'];
		$sql="INSERT INTO userproduct (category,image,name,price,offer,discountedprice,amountsave,quantity,expiryday,expirymonth,expiryyear) 
        VALUES ('$h','$filename','$a','$b','$c','$d','$f','$l','$e','$n','$g')";
		if(mysqli_query($db,$sql))
		{
            echo "<script>alert('".$a." Uploaded Successfully.');window.location='addproduct.php'</script>";
		}
		else
		{
			echo "<script>alert('Something Went Wrong!!');window.location='addproduct.php'</script>";
		}
	}
?>

<form action="#" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
            <select name="category" id="category" required>
            <option value="">Select Category of Product</option>
                <option value="Baby Diapers">Baby Diapers</option>
                <option value="Baby Wipes">Baby Wipes</option>
                <option value="Baby Accessories">Baby Accessories</option>
                <option value="Baby Food">Baby Food</option>
                <option value="Chocolates & Candies">Chocolates & Candies</option>
                <option value="Vegetables">Vegetables</option>    
                <option value="Fruits">Fruits</option>   
                <option value="Meat">Meat</option> 
                <option value="Fish">Fish</option>
                <option value="Egg">Egg</option> 
                <option value="Breads">Breads</option> 
                <option value="Biscuits">Biscuits</option> 
                <option value="Cakes">Cakes</option> 
                <option value="Cheese">Cheese</option>
                <option value="Butter & Ghee">Butter & Ghee</option>
                <option value="Milk">Milk</option>
                <option value="Pastas">Pastas</option> 
                <option value="Soups">Soups</option> 
                <option value="Chips,Nuts & Others">Chips,Nuts & Others</option> 
                <option value="Noodles, Pasta & Semai">Noodles, Pasta & Semai</option> 
                <option value="Mineral Water">Mineral Water</option> 
                <option value="Soft Drinks">Soft Drinks</option> 
                <option value="Tea & Coffee">Tea & Coffee</option> 
                <option value="Juice">Juice</option>
                <option value="Rice">Rice</option> 
                <option value="Oil">Oil</option>
                <option value="Daal & Chola">Daal & Chola</option>
                <option value="Salt & Sugar">Salt & Sugar</option>
                <option value="Dry Vegetables">Dry Vegetables</option>
                <option value="Ata, Moyda & Suji">Ata, Moyda & Suji</option>
                <option value="Spices">Spices</option>
                <option value="CLeaning Products">CLeaning Products</option>
                <option value="Pest Control">Pest Control</option>
                <option value="Air Freshner">Air Freshner</option>
                <option value="Bags">Bags</option>
                <option value="Home Appliances">Home Appliances</option>
                <option value="Shampoo & Hair Care">Shampoo & Hair Care</option>
                <option value="Toothpaste & Oral Care">Toothpaste & Oral Care</option>
                <option value="Shaving & Facial Care">Shaving & Facial Care</option>
                <option value="Bath & Body">Bath & Body</option>
                <option value="Deorants / Body Sprays">Deorants / Body Sprays</option>
                <option value="Napkins, Contraceptives & Others">Napkins, Contraceptives & Others</option>
                <option value="Cosmetics">Cosmetics</option>
                <option value="Skin Care">Skin Care</option>
                <option value="Sauces">Sauces</option>
                <option value="Picklels & Others">Picklels & Others</option>
                <option value="Mens Fashion">Mens Fashion</option>
                <option value="Womens Fashion">Womens Fashion</option>
                <option value="Jam & Jelly">Jam & Jelly</option>
                <option value="Honey">Honey</option>
                <option value="Mayonnaise">Mayonnaise</option>
                <option value="Kitchen Appliances">Kitchen Appliances</option>
                <option value="Others">Others</option>
                <option value="Home & Living">Home & Living</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>
                Choose Image with extension (.jpg, .jpeg, .png)
                <hr>
            <input type="file" name="image" required>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" name="name" placeholder="Product Name" required>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" name="price" placeholder="Product Price" required>
            </td>
        </tr>
        <tr>
            <td>
            <input type="text" name="offer" placeholder="Offer in percentage" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="quantity" placeholder="Quantity" required>
            </td>
        </tr>
        <tr>
            <td>
                Expiry Date
                <hr>
                <div class="date">
                <select name="day">
                <option value="">Day</option>
                <?php
                $date=date('y')+20;
                    for($i=1;$i<=31;$i++)
                    {
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                ?>
                </select>
                <select name="month">
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">Septembar</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
                </select>
                <select name="year">
                <option value="">Year</option>
                <?php
                    for($i=date('y');$i<=$date;$i++)
                    {
                        echo "<option value='".$i."'>20".$i."</option>";
                    }
                ?>
                </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>
            <span><input type="submit" name="submit" value="Add"></span>
            </td>
        </tr>
    </table>
</form>
<br><br><br><br>























    <?php include('footer.php'); ?>