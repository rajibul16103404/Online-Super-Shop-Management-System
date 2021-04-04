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
        color: black;
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
        $id=$_GET['id'];
        
        $b=0;
        $db=mysqli_connect("localhost","root","","swapno");
        $sql="select * from userproduct where id='$id'";
        $qry=mysqli_query($db,$sql);
        if(mysqli_num_rows($qry)>0)
        {
        while($row=mysqli_fetch_assoc($qry))
        {
            $a=(int)($row['quantity']/100);
            $b=(int)(($row['quantity']/10)%10);
            $c=(int)($row['quantity']%10);
?>


<form action="updatecondition.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
            Product Category
                <hr>
            <select name="category" id="category">
            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
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
            Product Name
                <hr>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" >
            </td>
        </tr>
        <tr>
            <td>
            Product Price
                <hr>
            <input type="text" name="price" value="<?php echo $row['price']; ?>" >
            </td>
        </tr>
        <tr>
            <td>Product Offer
                <hr>
            <input type="text" name="offer" value="<?php echo $row['offer']; ?>" >
            </td>
        </tr>
        <tr>
            <td>
                Quantity
                <hr>
                <div class="select">
            <select name="quantity" id="quantity" >
            <option value='<?php echo $a; ?>'><?php echo $a; ?></option>
                <?php
                    for($i=0;$i<10;$i++)
                    {
                        echo "<option value='".$i."'>".$i."</option>"   ;
                    }
                ?>
            </select>
            <select name="quantity1" id="quantity1" >
            <option value='<?php echo $b; ?>'><?php echo $b; ?></option>
                <?php
                    for($i=0;$i<10;$i++)
                    {
                        echo "<option value='".$i."'>".$i."</option>"   ;
                    }
                ?>
            </select>
            <select name="quantity2" id="quantity2" >
            <option value='<?php echo $c; ?>'><?php echo $c; ?></option>
                <?php
                    for($i=0;$i<10;$i++)
                    {
                        echo "<option value='".$i."'>".$i."</option>"   ;
                    }
                ?>
            </select>
            </div>
            </td>
        </tr>
        <tr>
            <td>
                Expiry Date
                <hr>
                <div class="date">
                <select name="day">
                <option value="<?php echo $row['expiryday']; ?>"><?php echo $row['expiryday']; ?></option>
                <?php
                $date=date('y')+20;
                    for($i=1;$i<=31;$i++)
                    {
                        echo "<option value='".$i."'>".$i."</option>";
                    }
                ?>
                <?php
                    if($row['expirymonth']==1)
                        $month="January";
                        if($row['expirymonth']==2)
                        $month="February";
                        if($row['expirymonth']==3)
                        $month="March";
                        if($row['expirymonth']==4)
                        $month="April";
                        if($row['expirymonth']==5)
                        $month="May";
                        if($row['expirymonth']==6)
                        $month="June";
                        if($row['expirymonth']==7)
                        $month="July";
                        if($row['expirymonth']==8)
                        $month="August";
                        if($row['expirymonth']==9)
                        $month="Sepetember";
                        if($row['expirymonth']==10)
                        $month="October";
                        if($row['expirymonth']==11)
                        $month="November";
                        if($row['expirymonth']==12)
                        $month="December";
                ?>
                </select>
                <select name="month">
                <option value="<?php echo $row['expirymonth']; ?>"><?php echo $month; ?></option>
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
                <option value="<?php echo $row['expiryyear']; ?>">20<?php echo $row['expiryyear']; ?></option>
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
            <span><input type="submit" name="submit" value="Update"></span>
            </td>
        </tr>
    </table>

</form>
<br><br><br><br>


<?php
        }
    }
?>




















    <?php include('footer.php'); ?>