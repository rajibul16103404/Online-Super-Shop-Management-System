<html>
    <head>
        <title>Products</title>
        <style>
            .product{
                width:203px;
                height:300px;
                background-color: transparent;
                border: 1px solid lightgray;
                box-sizing: border-box; 
                box-shadow: 0px 0px 5px 0px lightyellow;
                color: white;
                float: left;
                margin: 22px;
                margin-bottom: 50px;
            }
            .product:hover{
                background-color: lightgray;
                box-shadow: 0px 0px 5px 2px green;
                border:none;
                opacity:.9;
            }
            .product .pimg img{
                width:190px;
                height: 190px;
                margin: 5px;
                border-radius: 10px;
                margin-bottom: 20px;
            }
            .product .details{
                text-align: center;
                line-height: 1px;
                margin: 0px;
            }
            .details span{
                font-size: 50px;
                margin: auto;
                color: white;
                margin-top: -225px;
                position: absolute;
                margin-left: -100px;
                background-color: white;
                height: 50px;
                width: 200px;
                opacity: .6;
            }
            .details span h2{
                font-size: 50px;
                margin: auto;
                color: black;
                margin-top: 25px;
            }
            h3{
                font-size:22px;
                padding:5px;
                color:blue;
            }
            p{
                font-size:18px;
                color: black;
                padding: 5px;
            }
            form{
                position: fixed;
                margin-left: 15%;
                margin-top: -50px;
                opacity: .9;
                width:100%;
            }
            form span input{
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
    <br><br><br><br><br><br><br>
        <?php
            $db=mysqli_connect("localhost","root","","swapno");
            ?>
            <form action="" method="POST">
                <span><input type="text" name="valuetosearch" placeholder="Enter Keyword....."></span>
                <input type="submit" name="submit" value="Search">
            </form>

            <?php
            $db=mysqli_connect("localhost","root","","swapno");
                    
        ?>
        <?php
            if(isset($_POST['submit']))
            {
                $valuetosearch=$_POST['valuetosearch'];
                $srch="select * from userproduct where concat(name,price,offer) like '%".$valuetosearch."%' ";
                $qry=mysqli_query($db,$srch);
                if(mysqli_num_rows($qry)>0)
                {
                    while($r=mysqli_fetch_assoc($qry))
                    {
                        ?>
                            <a href="details.php?id=<?php echo $r['id']; ?>">
                            <div class="product">
                                <div class="pimg">
                                    <img src="productimages/<?php echo $r['image']; ?>" alt="">
                                </div>
                                <div class="details">
                                    <h3><?php echo $r['name']; ?></h3>
                                    <p><?php echo $r['price']." Taka"; ?></p><br>
                                    <span><h2><?php echo $r['offer']."% Off"; ?></h2></span>
                                </div>
                            </div>
                        <?php

                    }
                }
                echo "</a>";	
            }
            else
            {
                $sql="select * from userproduct";
                $query=mysqli_query($db,$sql);
                if(mysqli_num_rows($query)>0)
                {
                    while($row=mysqli_fetch_assoc($query))
                    {
                        ?>
                            <a href="details.php?id=<?php echo $row['id']; ?>">
                            <div class="product">
                                <div class="pimg">
                                    <img src="productimages/<?php echo $row['image']; ?>" alt="">
                                </div>
                                <div class="details">
                                    <h3><?php echo $row['name']; ?></h3>
                                    <p><?php echo $row['price']." Taka"; ?></p><br>
                                    <span><h2><?php echo $row['offer']."% Off"; ?></h2></span>
                                </div>
                            </div>

                        <?php
                    }
                }
                echo "</a>";
            }

        ?>




       

<?php include('footer.php'); ?>