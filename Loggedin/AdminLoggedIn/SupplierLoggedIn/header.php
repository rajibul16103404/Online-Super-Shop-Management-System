<!DOCTYPE html>
<html>
    <head>
        <title>
            Home
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
				width:200px;
				margin: 5px 5px;
				padding: 5px;
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
				   <li class="active"><a href="supplier.php?name=<?php echo $_GET['name']; ?>"><i class="fa fa-envelope"></i>Orders</a></li>
				   <li><a href="view.php?name=<?php echo $_GET['name']; ?>"><i class="fa fa-check-square-o"></i>Confirmed Orders</a></li>
				   <li><a href="../../../home.php"><i class="fa fa-power-off"></i>Log Out</a>
               </ul> 
        </div>
    