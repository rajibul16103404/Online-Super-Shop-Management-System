<?php include('header.php'); ?>
    <br><br><br><br><br>


    <?php
        $db=mysqli_connect("localhost","root","","swapno");
        if($db)
        {
        $p=$_GET['id'];
        $sel="SELECT * FROM supplier WHERE id='$p ' ";
        $q=mysqli_query($db,$sel);
            if(mysqli_num_rows($q)>0){
            while($row=mysqli_fetch_assoc($q)){
                
		
		
?>


<style>
    table{
        margin:150px auto;
        border: 2px solid green;
    }
    table tr td{
        border-bottom:2px solid green;
        padding:20px;
    }
    table tr td input{
        font-size: 16px;
        width:100%;
        border-radius: 10px;
        text-align: center;
        border: none;
    }
</style>

<form action="" method="POST">
    <table>
        <tr>
            <td>
                Supplier Name
            </td>
            <td>
                <input type="text" name="name" value="<?php echo $row['name']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Supplier Phone Number
            </td>
            <td>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Update">
            </td>
        </tr>
    </table>
</form>

<?php

	if(isset($_POST['submit']))
	{
        $a=$_POST['name'];
        $b=$_POST['phone'];
		$sql="update supplier set name='$a', phone='$b' where id=$p";
		if(mysqli_query($db,$sql))
		{
            echo "<script>alert('Information Updated Successfully!');window.location='viewsupplier.php'</script>";
		}
		else
		{
			echo "not uploaded";
		}
    }
}}}
?>

















    <?php include('footer.php'); ?>