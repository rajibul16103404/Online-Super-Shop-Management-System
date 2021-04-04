        <style>
            #container{
                overflow: hidden;
                height: 400px;
                width: 1250px;
                margin: auto;
				border-radius: 10px;
				
            }
            #sliderbox{
                position: relative;
                width: 12550px;
                animation-name: slideranimation;
                animation-duration: 50s;
                display: flex;
            }
            #sliderbox img{
				height: 400px;
                width: 1250px;
                
                border-radius: 10px;
                margin: 0px;
            }
            @keyframes slideranimation{
                
                0%{
                    left: 0px;
                }
                10%{
                    left: -1250px;
                }
                20%{
                    left: -2500px;
                }
                30%{
                    left: -3750px;
                }
                40%{
                    left: -5000px;
                }
                50%{
                    left: -6250px;
                }
                60%{
                    left: -7500px;
                }
                70%{
                    left: -8750px;
                }
                80%{
                    left: -10000px;
                }
                90%{
                    left: -11250px;
                }
                100%{
                    left: 0px;
                }
            }
            /*-------------------hot---------------------------*/
			.hot{
				width: 85%;
				margin: 1px auto;
                margin-bottom: 500px;
			}
			.hot .product{
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
            .hot .product:hover{
                color: black;
                background-color: whitesmoke;
                box-shadow: 2px 2px 2px transparent;
                border: 2px dashed yellow;
            }
            .hot .product .pimg img{
                width:190px;
                height: 190px;
                margin: 5px;
                border-radius: 10px;
                margin-bottom: 20px;
            }
            .hot .product .details{
                text-align: center;
                line-height: 1px;
                margin: 0px;
            }
            .hot .details span{
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
            .hot .details span h2{
                font-size: 50px;
                margin: auto;
                color: black;
                margin-top: 27px;
            }

        </style>
        
        <body>
        <?php include ('header.php'); ?>
        <br><br><br><br><br> 
        <div id="container">
            <div id="sliderbox">
                <a href=""><img src="sliderimage/0.jpg" alt="Image 0"></a>
                <a href=""><img src="sliderimage/1.jpg" alt="Image 1"></a>
                <a href=""><img src="sliderimage/2.jpg" alt="Image 2"></a>
                <a href=""><img src="sliderimage/3.jpg" alt="Image 3"></a>
                <a href=""><img src="sliderimage/4.jpg" alt="Image 4"></a>
                <a href=""><img src="sliderimage/5.jpg" alt="Image 5"></a>
                <a href=""><img src="sliderimage/6.jpg" alt="Image 6"></a>
                <a href=""><img src="sliderimage/7.jpg" alt="Image 7"></a>
                <a href=""><img src="sliderimage/8.jpg" alt="Image 8"></a>
                <a href=""><img src="sliderimage/9.jpg" alt="Image 9"></a>
                <a href=""><img src="sliderimage/10.jpg" alt="Image 10"></a>
                <a href=""><img src="sliderimage/11.jpg" alt="Image 11"></a>
            </div>
        </div>
        <div class="hot">
        <?php
            $db=mysqli_connect("localhost","root","","swapno");
			
            $sql="select * from userproduct where offer>10 ";
            $qry=mysqli_query($db,$sql);
            if($qry)
            {
                if(mysqli_num_rows($qry)>0)
            {
                while($row=mysqli_fetch_array($qry))
                {
        ?>
        <a href="details.php?id=<?php echo $row['id']; ?>&&user=<?php echo $_GET['user']; ?>">
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
        </a>
        <?php
                }
            }
        }
        ?>
                </div>
                <br><br><br>
<?php include('footer.php') ?>