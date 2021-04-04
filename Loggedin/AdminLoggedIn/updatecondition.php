<?php include('header.php'); ?>
    <br><br><br><br><br>


    <?php
	if(isset($_POST['submit']))
	{
        $db=mysqli_connect("localhost","root","","swapno");
        if($db){
            echo "Connected";
        }
        $filename=$_FILES['image']['name'];
        $filetempname=$_FILES['image']['tmp_name'];
        $folder='../../productimages/'.$filename;
        move_uploaded_file($filetempname, $folder);
        $a=$_POST['name'];
        $b=$_POST['price'];
        $c=$_POST['offer'];
        $d=$b-($b*($c/100));
        $e=$b-$d;
        $g=$_POST['quantity'];
        $j=$_POST['quantity1'];
        $k=$_POST['quantity2'];
        $l=($g*100)+($j*10)+$k;
        $h=$_POST['category'];
        $m=$_POST['day'];
        $n=$_POST['month'];
        $q=$_POST['year'];
        $p=$_GET['id'];
        $sql="update userproduct set category='$h' , image='$filename' , name='$a' , price='$b' , offer='$c', discountedprice='$d'
        ,amountsave='$e' , quantity='$l' ,expiryday='$m', expirymonth='$n', expiryyear='$q' where id='$p' ";
		if(mysqli_query($db,$sql))
		{
            echo "<script>alert('Product Information Updated Successfully.');window.location='viewproduct.php'</script>";
		}
		else
		{
			echo "not uploaded";
		}
	}
?>


<br><br><br>
<?php include('footer.php'); ?>