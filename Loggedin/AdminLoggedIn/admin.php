<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <style>

        .dash .totalquantity {
            width:25%;
            background: gray;
            color: white;
            border-radius: 10px;
            float:left;
            margin: 20px auto;
            text-align: center;
            box-sizing: border-box;
        }
        .dash .totalquantity table{
            margin: auto;
            box-sizing: border-box;
        }
        .dash .totalquantity table tr td{
            text-align:right;
            font-size:18px;
            padding:10px;
            box-sizing: border-box;
        }
        .dash .totalcategory {
            width:23%;
            background: gray;
            color: white;
            border-radius: 10px;
            float:left;
            margin: 20px auto;
            margin-left: 20px;
            text-align: center;
            box-sizing: border-box;
            
        }
        .dash .totaluser {
            width:23%;
            background: gray;
            color: white;
            border-radius: 10px;
            float:left;
            margin: 20px auto;
            margin-left: 20px;
            text-align: center;
            box-sizing: border-box;
            
        }
        .dash .totalsupplier {
            width:24%;
            background: gray;
            color: white;
            border-radius: 10px;
            float:left;
            margin: 20px auto;
            margin-left: 20px;
            text-align: center;
            box-sizing: border-box;
        }
         h1{
            border-bottom: 2px solid white;
            background-color:green;
            margin:0;
            padding: 0;
            border-radius:10px 10px 0px 0px;
            box-sizing: border-box;
        }
        .p{
            padding:20px;
            margin:auto;
        }
        .lowquantity{
            width: 45%;
            box-shadow: 1px 1px 10px 10px lightsteelblue;
            margin: 10px auto;
            padding: 20px;
            margin-left: 40px;
            float:left;
        }
        
        .expire{
            width: 45%;
            box-shadow: 1px 1px 10px 10px lightsteelblue;
            margin: 10px auto;
            padding: 20px;
            margin-left: 40px;
            float: left;
        }
        .alert{
            width:80%;
            background: lightgoldenrodyellow;
            margin: 10px auto;
            padding: 20px;
            border-radius: 10px;
        }
        .dash{
            width: 100%;
            border-radius: 10px;
            margin: 0px auto;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px 5px lightseagreen;
            padding: 20px;
            height: 200px;
        }
        .alert a{
            text-decoration: none;
            color: white;
            background: green;
            padding: 2px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 0px 5px 2px lightgreen;
        }
        .alertm{
            margin-bottom: 100px;
            border: 2ps solid green;
        }
    </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br><br><br> 
        <div class="dash">
                <div class="totalquantity">
                        <h1>Total Stock</h1>
                        <table>
                            <tr>
                                <td>Product</td>
                        <?php
                            $db=mysqli_connect('localhost','root','','swapno');
                            $sum=0;
                            $category=53;
                            $name=0;
                            $sql="select * from userproduct";
                            $qry=mysqli_query($db,$sql);
                            if(mysqli_num_rows($qry)>0)
                            {
                                while($row=mysqli_fetch_assoc($qry))
                                { 
                                    $sum=$sum+$row['quantity'];
                                    $name++;
                                }
                                echo "<td>".$name." Varient</td></tr>";
                                echo "<tr><td>Quantity</td><td>".$sum." Items</td></tr></table>";
                            }
                        ?>
                </div>
            <div class="totalcategory">
                <h1>Total Category</h1>
                    <?php echo "<div class='p'>".$category." Numbers Of.</div>"; ?>
            </div>
            <div class="totaluser">
                <h1>Total Customer</h1>
                    <?php 
                        $i=0;
                        $sql1="select * from register";
                        $qry1=mysqli_query($db,$sql1);
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry1))
                        {
                            $i++; 
                        }
                        echo "<div class='p'>".$i." Person.</div>";
                    }
                    ?>
            </div>
            <div class="totalsupplier">
                <h1>Total Supplier</h1>
                    <?php 
                        $j=0;
                        $sql2="select * from supplier";
                        $qry2=mysqli_query($db,$sql2);
                    if(mysqli_num_rows($qry2)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry2))
                        {
                            $j++; 
                        }
                        echo "<div class='p'>".$j." Person.</div>";
                    }
                    ?>
            </div>

        </div>
            


        <div class="alertm">
                <div class="lowquantity">
                        <h2>Low Quantity</h2>
                
                <?php
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql3="select * from userproduct";
                    $qry3=mysqli_query($db,$sql3);
                    if(mysqli_num_rows($qry3)>0)
                    {
                        while($r=mysqli_fetch_assoc($qry3))
                        {
                            if($r['quantity'] <=5)
                            {
                            ?>

                    <div class="alert">
                        <h2><?php echo $r['name']; ?></h2>
                        <hr>
                        <p>Have <?php echo $r['quantity']; ?> Quantity. <a href="giveorder.php">Order Now.</a></p>
                    </div>
                            <?php
                            }
                        }
                    }
                ?>
                </div>


                <div class="expire">
                        <h2>Going To Expire</h2>
                    <?php
                    $day=date('d');
                    $month=date('m');
                    $year=date('y');
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql3="select * from userproduct";
                    $qry3=mysqli_query($db,$sql3);
                    if(mysqli_num_rows($qry3)>0)
                    {
                        while($r=mysqli_fetch_assoc($qry3))
                        {
                            if(($r['expiryyear']-$year)<=0)
                            {
                                if(($r['expirymonth']-$month)<=0)
                                {
                                    if(($r['expiryday']-$day)<=0)
                                        {      
                            ?>
                            <div class="alert">
                            <?php
                                    if($db)
                                    {
                                        $p=$r['id'];
                                    $del="DELETE FROM userproduct WHERE id='$p' ";
                                    $res=mysqli_query($db,$del);
                                    if($res)
                                    {
                                        echo "<script>alert('Expired Products Removed Successfully!');window.location='admin.php'</script>";
                                    }
                                    }
                            ?>
                            </div>
                                    <?php
                                        }
                                        if(($r['expiryday']-$day)<5 && ($r['expiryday']-$day)>0)
                                        {
                                            if($r['offer']<50)
                                            {
                                    ?>
                            <div class="alert">
                                <h2><?php echo $r['name']; ?></h2>
                                <hr>
                                <p>Expire Within <?php echo ($r['expiryday']-$day); ?> Days. <a href="offerincrease.php?id=<?php echo $r['id']; ?>">Increase Offer.</a></p>
                            </div>
                                    <?php
                                        }
                                        else if($r['offer']>50){
                                            ?>
                            <div class="alert">
                                <h2><?php echo $r['name']; ?></h2>
                                <hr>
                                <p>Expire Within <?php echo ($r['expiryday']-$day); ?> Days.</p>
                                <p>Offer Increased At <?php echo $r['offer']; ?>%</p>
                            </div>

                                            <?php
                                        }
                                    }
                                }
                            }
                            }
                        }
                     
                      
                    ?>
                </div>
        </div>
        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>
