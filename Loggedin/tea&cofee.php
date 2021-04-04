
<?php include('header.php'); ?>
    <br><br><br><br><br>
    <html>
    <head>
        <title>Baby Products</title>
        <style>
            .product{
                width:203px;
                height:300px;
                background-color: transparent;
                border: 1px solid lightgray;
                box-sizing: border-box; 
                box-shadow: 0px 0px 5px 0px white;
                color: white;
                float: left;
                margin: 22px;
                margin-bottom: 50px;
            }
            .product:hover{
                color: black;
                background-color: whitesmoke;
                box-shadow: 2px 2px 2px transparent;
                border: 2px dashed yellow;
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
                margin-top: -200px;
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
                margin-top: 27px;
            }
        </style>
    </head>
    <body>
        <?php
            $db=mysqli_connect("localhost","root","","swapno");

            $sql="select * from userproduct where category='Tea & Coffee' ";
            $qry=mysqli_query($db,$sql);
            if($qry)
            {
                if(mysqli_num_rows($qry)>0)
            {
                while($row=mysqli_fetch_array($qry))
                {
        ?>
        <div class="product">
            <div class="pimg">
                <img src="../productimages/<?php echo $row['image']; ?>" alt="">
            </div>
            <div class="details">
                <p><?php echo $row['name']; ?></p>
                <p><?php echo $row['price']." Taka"; ?></p><br>
                <span><h2><?php echo $row['offer']."% Off"; ?></h2></span>
            </div>
        </div>
        <?php
                }
            }
        }
        ?>

       <?php include('footer.php'); ?>

    </body>
</html>