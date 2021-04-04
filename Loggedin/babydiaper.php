
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
            .product button{
                display: none;
            }
            .product:hover{
                color: black;
                background-color: slategray;
                box-shadow: 0px 0px 5px 2px green;  
                
            }
            .product:hover button{
                display: block;
                margin:0% 1%;
                width: 48%;
                font-size:20px;
                padding: 2px;
                background: lightgray;
                color: black;
                border: 1px solid white;
                cursor: pointer;
                float: right;
            }
            
            .product p, a{
                text-decoration:none;
                color: white;
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
                background-color: black;
                height: 50px;
                width: 200px;
                opacity: .6;
            }
            .details span h2{
                font-size: 50px;
                margin: auto;
                color: white;
                margin-top: 27px;
            }
            form{
                position: fixed;
                margin-left: 15%;
                margin-top: -50px;
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
    </head>
    <body>
        <?php
            $db=mysqli_connect("localhost","root","","swapno");

            $sql="select * from userproduct where category='Baby Diapers' ";
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
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['price']." Taka"; ?></p><br>
                <span><h2><?php echo $row['offer']."% Off"; ?></h2></span>
            </div>
            <a href="details.php?id=<?php echo $row['id']; ?>&&user=<?php echo $_GET['user']; ?>"><button>Details</button></a>
                                <a class="cart" href="addtocart.php?id=<?php echo $row['id'];?>&&user=<?php echo $_GET['user'];?>"><button>Cart</button></a>
        </div>
        <?php
                }
            }
        }
        ?>

       <?php include('footer.php'); ?>

    </body>
</html>