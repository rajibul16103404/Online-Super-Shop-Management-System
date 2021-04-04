<?php include('header.php'); ?>
    <br><br><br>

    <style>
        h1{
	font-size:40px;
	margin-top: 100px;
	color: lightgray;
	text-align:center;
}
.wrapper{
	position: absolute;
	top: 55%;
	transform: translateY(-50%);
	width: 98%;
	padding: 0px 20px;
}
.contact-form{
	max-width: 950px;
	margin: 0px auto;
	background: rgba(0,0,0,0.8);
	padding:70px;
	border-radius: 15px;
	display: flex;
	box-shadow: 0 0 10px;
	height:400px;
}
.contact-form:hover{
	box-shadow:0px 0px 40px black;
}
.input-fields{
	display: flex;
	flex-direction: column;
	margin-right:4%;
}
.input-fields,
.msg{
	width: 70%;
}
.input-fields .a,
.msg textarea{
	margin:10px 0px;
	background: transparent;
	border: 0;
	border-bottom: 3px solid #c5ecfd;
	padding: 10px;
	color: #c5ecfd;
	width:100%;
	font-size:15px;
}
.msg textarea{
	height: 220px;
}
.btn input{
	background: #c5ecfd;
	color:white;
	text-align:center;
	padding: 5px;
	border-radius:20px;
	color: black;
	font-weight: bold;
	cursor: pointer;
	float: right;
	width: 50%;
	border:none;
}
    </style>

<?php
	if(isset($_POST['submit']))
	{
		$conn=mysqli_connect('localhost','root','','swapno');
		if($conn)
		{
		$name=$_POST['fullname'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$subject=$_POST['subject'];
		$message=$_POST['area'];
		$sql="INSERT INTO contact(fullname,email,phone,subject,message,status) VALUES ('$name','$email','$phone','$subject','$message','unconfirmed')";
		$query=mysqli_query($conn,$sql);
		if($query)
		{
			echo "<script>alert('Be Patient. Your complaint seen by admin soon. Thanks for your opinion.....');window.location='home.php'</script> ";
		}
		else
		{
			echo "Not inserted";
		}
		}
		else
		{
			echo "Not Connected";
		}
	}
?>


		<form action="" method="POST">
		<div class="wrapper">
			<div class="contact-form">
				<div class="input-fields">
					<input type="text" class="a"name="fullname" placeholder="Name" />
					<input type="email" class="a" name="email" placeholder="Email-Address" />
					<input type="int" class="a" name="phone" placeholder="Phone Number" />
					<input type="text" class="a"name="subject" placeholder="Subject" />
				</div>
				<div class="msg">
					<textarea name="area" placeholder="Type Your Message"></textarea>
					<div class="btn"><input type="submit" name="submit" value="Send"></div>
				</div>
			</div>
		</div>
        </form>
        
        <br><br><br>
        <?php include('footer.php'); ?>