<!DOCTYPE html>
<html>
    <head>
        <title>
            Swapno <an online supershop>
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
        <style>
            *{
				padding: 0;
				box-sizing: border-box;
			}
			body{
				background-color: powderblue;
				background-position: center;
				font-family: sans-serif;
			}
			.logo{
				width: 40px;
				height: 40px;
				float: left;
			}
			img{
				width: 140px;
				height: 70px;
				border-radius:10px 0px 0px 10px;
			}
			.menu{
				background-color: lightslategray;
				opacity: 1;
				text-align: center;
				border-radius: 10px;
				float: left;
				width:98.5%;
				position: fixed;
				z-index: 80;
				margin-bottom: 100px;
			}
			.menu ul{
				display: inline-flex;
				list-style: none;
				color: cornsilk;
				
			}
			.menu ul li{
				width:150px;
				margin: 5px 5px;
				padding: 5px;
				width:130px;
			}
			.menu ul li a{
				text-decoration: none;
				color: black;
			}
			.active, .menu ul li:hover{
				background-color: lightgray;
				border-radius: 5px;
				color: black;
			}
			.menu .fa{
				margin-right: 5px;
			}
			.submenu1{
				display: none;
				margin-top: 5px;
				border-radius: 10px;
				margin-left: -5px;
			}
			.menu ul li:hover .submenu1{
				display: block;
				position: absolute;
				background-color: gray;
				visibility: visible;
				z-index: 80;
			}
			.menu ul li:hover .submenu1 ul{
				display: block;
			}
			.menu ul li:hover .submenu1 ul li{
				width:210px;
				padding: 5px;
				border-bottom: 1px dotted white;
				background-color: transparent;
				text-align: left;
				margin-top: 2px;
			}
			.menu ul li:hover .submenu1 ul li:first-child{
				margin-top:25px;
			}
			.menu ul li:hover .submenu1 ul li:last-child{
				border-bottom: 0px;
			}
			.menu ul li:hover .submenu1 ul li:hover{
				background-color: lightgray;
			}
			.fa-angle-right{
				float: right;
			}
			/*-----------------------Sub Menu------------------*/
			.submenu2{
				display: none;
			}
			.sub1:hover .submenu2{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub1:hover .submenu2 ul{
				background-color: gray;
			}
			.sub1:hover .submenu2 ul li{
				background-color: transparent;
			}
			.sub1:hover .submenu2 ul li:hover{
				background-color: lightgray;
			}
			.submenu2 .fa{
				float: left;
			}
			/*---------------------Sub Menu--------------------------------*/
			.submenu3{
				display: none
			}
			.sub3:hover .submenu3{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub3:hover .submenu3 ul{
				background-color: gray;
			}
			.sub3:hover .submenu3 ul li{
				background-color: transparent;
			}

			.sub3:hover .submenu3 ul li:hover{
				background-color: lightgray;
			}
			.submenu3 .fa{
				float: left;
			}

			/*---------------------Sub Menu--------------------------------*/
			.submenu4, .submenu5, .submenu6, .submenu7, .submenu8, .submenu9, .submenu10, .submenu11, .submenu12, .submenu12,
			.submenu13, .submenu14, .submenu15, .submenu16, .submenu17, .submenu18{
				display: none;
				border-radius: 10px;
			}
			.sub4:hover .submenu4{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub4:hover .submenu4 ul{
				background-color: gray;
			}
			.sub4:hover .submenu4 ul li{
				background-color: transparent;
			}

			.sub4:hover .submenu4 ul li:hover{
				background-color: lightgray;
			}
			.submenu4 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub5:hover .submenu5{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub5:hover .submenu5 ul{
				background-color: gray;
			}
			.sub5:hover .submenu5 ul li{
				background-color: transparent;
			}

			.sub5:hover .submenu5 ul li:hover{
				background-color: lightgray;
			}
			.submenu5 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub6:hover .submenu6{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub6:hover .submenu6 ul{
				background-color: gray;
			}
			.sub6:hover .submenu6 ul li{
				background-color: transparent;
			}

			.sub6:hover .submenu6 ul li:hover{
				background-color: lightgray;
			}
			.submenu6 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub7:hover .submenu7{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub7:hover .submenu7 ul{
				background-color: gray;
			}
			.sub7:hover .submenu7 ul li{
				background-color: transparent;
			}

			.sub7:hover .submenu7 ul li:hover{
				background-color: lightgray;
			}
			.submenu7 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub8:hover .submenu8{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub8:hover .submenu8 ul{
				background-color: gray;
			}
			.sub8:hover .submenu8 ul li{
				background-color: transparent;
			}

			.sub8:hover .submenu8 ul li:hover{
				background-color: lightgray;
			}
			.submenu8 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub9:hover .submenu9{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub9:hover .submenu9 ul{
				background-color: gray;
			}
			.sub9:hover .submenu9 ul li{
				background-color: transparent;
			}

			.sub9:hover .submenu9 ul li:hover{
				background-color: lightgray;
			}
			.submenu9 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub10:hover .submenu10{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub10:hover .submenu10 ul{
				background-color: gray;
			}
			.sub10:hover .submenu10 ul li{
				background-color: transparent;
			}

			.sub10:hover .submenu10 ul li:hover{
				background-color: lightgray;
			}
			.submenu10 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub13:hover .submenu13{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -130.5px;
				border-radius: 10px;
			}
			.sub13:hover .submenu13 ul{
				background-color: gray;
			}
			.sub13:hover .submenu13 ul li{
				background-color: transparent;
			}

			.sub13:hover .submenu13 ul li:hover{
				background-color: lightgray;
			}
			.submenu13 .fa{
				float: left;
			}

			/*-------------------------------------------*/

			.sub14:hover .submenu14{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub14:hover .submenu14 ul{
				background-color: gray;
			}
			.sub14:hover .submenu4 ul li{
				background-color: transparent;
			}

			.sub14:hover .submenu14 ul li:hover{
				background-color: lightgray;
			}
			.submenu14 .fa{
				float: left;
			}

			/*-------------------------------------------*/
			.sub15:hover .submenu15{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub15:hover .submenu15 ul{
				background-color: gray;
			}
			.sub15:hover .submenu15 ul li{
				background-color: transparent;
			}

			.sub15:hover .submenu15 ul li:hover{
				background-color: lightgray;
			}
			.submenu15 .fa{
				float: left;
			}

			/*-------------------------------------------*/
			.sub16:hover .submenu16{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub16:hover .submenu16 ul{
				background-color: gray;
			}
			.sub16:hover .submenu16 ul li{
				background-color: transparent;
			}

			.sub16:hover .submenu16 ul li:hover{
				background-color: lightgray;
			}
			.submenu16 .fa{
				float: left;
			}

			/*-------------------------------------------*/
			.sub17:hover .submenu17{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub17:hover .submenu17 ul{
				background-color: gray;
			}
			.sub17:hover .submenu17 ul li{
				background-color: transparent;
			}

			.sub17:hover .submenu17 ul li:hover{
				background-color: lightgray;
			}
			.submenu17 .fa{
				float: left;
			}
			/*-------------------------------------------------*/
			.sub18:hover .submenu18{
				position: absolute;
				display: block;
				margin-left: 195px;
				margin-top: -48.5px;
				border-radius: 10px;
			}
			.sub18:hover .submenu18 ul{
				background-color: gray;
			}
			.sub18:hover .submenu18 ul li{
				background-color: transparent;
			}

			.sub18:hover .submenu18 ul li:hover{
				background-color: lightgray;
			}
			.submenu18 .fa{
				float: left;
			}
			/*-------------------Footer------------------------*/
			.footer1{
				background-color: gray;
				position: fixed;
				bottom: 0px;
				margin: auto;
				width: 98.5%;
				column-count: 3;
				height:30px;
			}
			.footer1 .social{
				font-size:25px;
				margin-left:100px;
			}
			.footer1 p{
				font-size: 20px;
				font-weight:bold;
			}
			.footer1 .payment img{
				width: 400px;
				height: 30px;
			}
			</style>
        <div class="menu">
            <div class="logo">
                <img src="pictures/logo/logo.png" alt="">
            </div>
               <ul>
                   <li class="active"><a href="home.php"><i class="fa fa-home">Home</i></a></li>
                   <li><i class="fa fa-bars"></i>Category
                       <div class="submenu1">
                            <ul>
                                <li class="sub1">Baby Products<i class="fa fa-angle-right"></i>
                                    <div class="submenu2">
                                        <ul>
                                            <li><a href="babydiaper.php"><i class="fa fa-angle-right"></i>Baby Diapers</a></li>
                                            <li><a href="babywipes.php"><i class="fa fa-angle-right"></i>Baby Wipes</a></li>
                                            <li><a href="babyaccessories.php"><i class="fa fa-angle-right"></i>Baby Accessories</a></li>
                                            <li><a href="babyfood.php"><i class="fa fa-angle-right"></i>Baby Food</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="chocolates.php">Chocolates & Candies</a></li>
                                <li class="sub3">Fruits & Vegetables<i class="fa fa-angle-right"></i>
                                    <div class="submenu3">
                                        <ul>
                                            <li><a href="vegetables.php"><i class="fa fa-angle-right"></i>Vegetables</a></li>
                                            <li><a href="fruits.php"><i class="fa fa-angle-right"></i>Fruits</a></li>
                                        </ul>
                                    </div>
                                </li>
                                </li>
                                <li class="sub4">Meat & Fish<i class="fa fa-angle-right"></i>
                                    <div class="submenu4">
                                        <ul>
                                            <li><a href="meat.php"><i class="fa fa-angle-right"></i>Meat</a></li>
                                            <li><a href="fish.php"><i class="fa fa-angle-right"></i>Fish</a></li>
                                            <li><a href="egg.php"><i class="fa fa-angle-right"></i>Egg</a></li>
                                        </ul>    
                                    </div>
                                </li>
                                <li class="sub5">Breads, Biscuits & Cakes<i class="fa fa-angle-right"></i>
                                    <div class="submenu5">
                                    <ul>
                                        <li><a href="breads.php"><i class="fa fa-angle-right"></i>Breads</a></li>
                                        <li><a href="biscuits.php"><i class="fa fa-angle-right"></i>Biscuits</a></li>
                                        <li><a href="cakes.php"><i class="fa fa-angle-right"></i>Cakes</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub6">Milk & Dairy<i class="fa fa-angle-right"></i>
                                    <div class="submenu6">
                                    <ul>
                                        <li><a href="cheese.php"><i class="fa fa-angle-right"></i>Cheese</a></li>
                                        <li><a href="butter&ghee.php"><i class="fa fa-angle-right"></i>Butter & Ghee</a></li>
                                        <li><a href="milk.php"><i class="fa fa-angle-right"></i>Milk</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub7">Snacks & Instant Food<i class="fa fa-angle-right"></i>
                                    <div class="submenu7">
                                    <ul>
                                        <li><a href="pastas.php"><i class="fa fa-angle-right"></i>Pastas</a></li>
                                        <li><a href="soups.php"><i class="fa fa-angle-right"></i>Soups</a></li>
                                        <li><a href="chips,nuts&others.php"><i class="fa fa-angle-right"></i>Chips, Nuts & Others</a></li>
                                        <li><a href="noodles,pastas&semai.php"><i class="fa fa-angle-right"></i>Noodles, Pasta & Semai</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub8">Drinks<i class="fa fa-angle-right"></i>
                                    <div class="submenu8">
                                    <ul>
                                        <li><a href="mineralwater.php"><i class="fa fa-angle-right"></i>Mineral Water</a></li>
                                        <li><a href="softdrinks.php"><i class="fa fa-angle-right"></i>Soft Drinks</a></li>
                                        <li><a href="tea&cofee.php"><i class="fa fa-angle-right"></i>Tea & Coffee</a></li>
                                        <li><a href="juice.php"><i class="fa fa-angle-right"></i>Juice</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub9">Cooking Essentials<i class="fa fa-angle-right"></i>
                                    <div class="submenu9">
                                    <ul>
                                        <li><a href="rice.php"><i class="fa fa-angle-right"></i>Rice</a></li>
                                        <li><a href="oil.php"><i class="fa fa-angle-right"></i>Oil</a></li>
                                        <li><a href="daal&chola.php"><i class="fa fa-angle-right"></i>Daal & Chola</a></li>
                                        <li><a href="salt&sugar.php"><i class="fa fa-angle-right"></i>Salt & Sugar</a></li>
                                        <li><a href="dryvegetables.php"><i class="fa fa-angle-right"></i>Dry Vegetables</a></li>
                                        <li><a href="ata,moyda&suji.php"><i class="fa fa-angle-right"></i>Ata, Moyda & Suji</a></li>
                                        <li><a href="spices.php"><i class="fa fa-angle-right"></i>Spices</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub10">Home Care & Cleaning<i class="fa fa-angle-right"></i>
                                    <div class="submenu10">
                                    <ul>
                                        <li><a href="cleaningproducts.php"><i class="fa fa-angle-right"></i>Cleaning Products</a></li>
                                        <li><a href="pestcontrol.php"><i class="fa fa-angle-right"></i>Pest Control</a></li>
                                        <li><a href="airfreshner.php"><i class="fa fa-angle-right"></i>Air Freshner</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub11"><a href="bags.php">Bags</a></a>
                                </li>
                                <li class="sub12"><a href="homeappliances.php">Home Appliances</a></a>
                                </li>
                                <li class="sub13">Personal Care<i class="fa fa-angle-right"></i>
                                    <div class="submenu13">
                                    <ul>
                                        <li><a href="shampoo&haircare.php"><i class="fa fa-angle-right"></i>Shapmoo & Hair Care</a></li>
                                        <li><a href="toothpaste&oralcare.php"><i class="fa fa-angle-right"></i>Toothpaste & Oral Care</a></li>
                                        <li><a href="shaving&facialcare.php"><i class="fa fa-angle-right"></i>Shaving & Facial Care</a></li>
                                        <li><a href="bath&body.php"><i class="fa fa-angle-right"></i>Bath & Body</a></li>
                                        <li><a href="deorantbodysprays.php"><i class="fa fa-angle-right"></i>Deorants / Body Sprays</a></li>
                                        <li><a href="napkins,contraceptives&others.php"><i class="fa fa-angle-right"></i>Napkins, Contraceptives & Others</a></li>
                                        <li><a href="cosmetics.php"><i class="fa fa-angle-right"></i>Cosmetics</a></li>
                                        <li><a href="skincare.php"><i class="fa fa-angle-right"></i>Skin Care</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub14">Sauces & Pickles<i class="fa fa-angle-right"></i>
                                    <div class="submenu14">
                                    <ul>
                                        <li><a href="sauces.php"><i class="fa fa-angle-right"></i>Sauces</a></li>
                                        <li><a href="pickels&others.php"><i class="fa fa-angle-right"></i>Pickels & Others</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub15">Fashion / Lifestyle<i class="fa fa-angle-right"></i>
                                    <div class="submenu15">
                                    <ul>
                                        <li><a href="women.php"><i class="fa fa-angle-right"></i>Women</a></li>
                                        <li><a href="men.php"><i class="fa fa-angle-right"></i>Men</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub16">Spreads<i class="fa fa-angle-right"></i>
                                    <div class="submenu16">
                                    <ul>
                                        <li><a href="jam&jelly.php"><i class="fa fa-angle-right"></i>Jam & Jelly</a></li>
                                        <li><a href="honey.php"><i class="fa fa-angle-right"></i>Honey</a></li>
                                        <li><a href="mayonnaise.php"><i class="fa fa-angle-right"></i>Mayonnaise</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub17">Electronics & Appliances<i class="fa fa-angle-right"></i>
                                    <div class="submenu17">
                                    <ul>
                                        <li><a href="kitchenappliances.php"><i class="fa fa-angle-right"></i>Kitchen Appliances</a></li>
                                        <li><a href="others.php"><i class="fa fa-angle-right"></i>Others</a></li>
                                        </ul> 
                                    </div>
                                </li>
                                <li class="sub18">Home & Living<i class="fa fa-angle-right"></i>
                                    <div class="submenu18">
                                    <ul>
                                        <li><a href="blanket&comforter.php">Blanket & Comforter</a></li>
                                        </ul> 
                                    </div>
                                </li>
                            </ul>
                        </div> 
                                
                    </li>
                   <li><a href="userproduct.php"><i class="fa fa-shopping-bag"></i>Products</a></li>
                   <li><a href="about.php"><i class="fa fa-users"></i>About Us</a></li>
                   <li><a href="contact.php"><i class="fa fa-envelope"></i>Contact Us</a></li>
                   <li><a href="login.php"><i class="fa fa-user-circle"></i>User</a></li>
				   <li><a href="adminlogin.php"><i class="fa fa-user"></i>Admin</a></li>
				   <li><a href="checksupplier.php"><i class="fa fa-truck"></i>Supplier</a></li>
               </ul> 
        </div>
    