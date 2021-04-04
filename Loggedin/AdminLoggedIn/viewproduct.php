<?php include('header.php'); ?>
    <br><br><br><br><br><br><br><br>
<style>
    .product{
        width:90%;
        margin:10px auto;
    }
    table{
        width: 100%;
        padding:20px;
        text-align: center;
        border: 2px solid lightgray;
        box-shadow: 0px 0px 20px 5px white;
        border-radius: 10px;
    }
    table tr td{
        border-right: 2px solid gray;
        border-top: 2px solid gray;
       padding: 15px;
    }
    a{
        text-decoration: none;
    }
    span .fa{
        width:50%;
        border: none;
        font-size:20px;
        padding: 5px 2px;
        cursor: pointer;
        margin: 5px;
    }
    h1{
        font-size:25px;
        text-align: center;
        color: white;
        margin:15px auto;
        background: black;
        border-radius: 10px;
        width: 200px;
    }
    form{
                position: fixed;
                margin-left: 15%;
                margin-top: -65px;
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
<form action="" method="POST">
        <input class="search" type="text" name="valuetosearch" placeholder="Enter Keyword.....">
        <input type="submit" name="submit" value="Search">
    </form>
<table>
    <div class="firstrow">
    <tr>
        <td style="border-top: none;">
            Product Category
        </td>
        <td style="border-top: none;">
            Product Image
        </td>
        <td style="border-top: none;">
            Product Name
        </td>
        <td style="border-top: none;">
            Product Price
        </td >
        <td style="border-top: none;">
            Product Offer
        </td>
        <td style="border-top: none;">
            Product Quantity
        </td>
        <td style="border-top: none;">
            Expiry Date
        </td>
        <td style="border-top: none; border-right: none;">
            Action
        </td>
    </tr>
    </div>
    <?php
    $db=mysqli_connect('localhost','root','','swapno');
    if(isset($_POST['submit']))
    {
        $valuetosearch=$_POST['valuetosearch'];
        $srch="select * from userproduct where concat(category,name,price,offer) like '%".$valuetosearch."%' ";
        $qry1=mysqli_query($db,$srch);
        if(mysqli_num_rows($qry1)>0)
        {
            while($r=mysqli_fetch_assoc($qry1))
            {
                echo "<tr><td>".$r['category']."</td>
                <td><img src='../../productimages/".$r['image']."'></td>
                <td>".$r['name']."</td>
                <td>".$r['price']."</td>
                <td>".$r['offer']."</td>
                <td>".$r['quantity']."</td>
                <td>".$r['expiryday']."/".$r['expirymonth']."/20".$r['expiryyear']."</td>
                <td style='border-right:none;'><a href='delete.php?id=".$r['id']."'><span style='float:left;'><i class='fa fa-trash'></i></span><a>
                <a href='update.php?id=".$r['id']."'><span style='float:left;'><i class='fa fa-refresh'></i></span><a></td></tr>";
                }
        }
        else
        {
            echo "<h5>No Result Found.</h5>";
        }
        
    }
    else{
        $sql="select * from userproduct";
        $qry=mysqli_query($db,$sql);
        if(mysqli_num_rows($qry)>0)
        {
            while($row=mysqli_fetch_assoc($qry))
            {
                echo "<tr><td>".$row['category']."</td>
                <td><img src='../../productimages/".$row['image']."'></td>
                <td>".$row['name']."</td>
                <td>".$row['price']."</td>
                <td>".$row['offer']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['expiryday']."/".$row['expirymonth']."/20".$row['expiryyear']."</td>
                <td style='border-right:none;'><a href='delete.php?id=".$row['id']."'><span style='float:left;'><i class='fa fa-trash'></i></span><a>
                <a href='update.php?id=".$row['id']."'><span style='float:left;'><i class='fa fa-refresh'></i></span><a></td></tr>";
            }
        }
    }

    
    ?>
</table>
</div>















<br><br><br>





    <?php include('footer.php'); ?>