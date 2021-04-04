<?php include('header.php'); ?>
    <br><br><br><br><br>

<style>
    table{
        margin:50px auto;
        border: none;
        width:40%;
        box-shadow: 0px 0px 10px 5px lime;
        border-radius: 10px;
    }
    table tr td{
        padding:20px;
    }
    table tr td input{
        font-size: 16px;
        width:100%;
        border-radius: 10px;
        text-align: center;
        border: none;
        padding: 10px;
    }
    span input{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
    }
    textarea{
        border-radius: 10px;
        border: none;
        text-align: center;
    }
</style>

<form action="" method="POST">
    <table>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Supplier First Name (Capitalized*)" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="phone" placeholder="11 digit phone number" required>
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="address" id="address" cols="75" rows="5" placeholder="Suppliers Full Address" required></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <span><input type="submit" name="submit" value="Add"></span>
            </td>
        </tr>
    </table>
</form>


<?php
	if(isset($_POST['submit']))
	{
        $db=mysqli_connect("localhost","root","","swapno");
        $a=$_POST['name'];
        $b=$_POST['phone'];
        $c=$_POST['address'];

        $sql1="select * from supplier where phone='$b' || address='$c'";
        $qry1=mysqli_query($db,$sql1);
        if(mysqli_num_rows($qry1)==0)
        {
              $sql="INSERT INTO supplier (name,phone,address) VALUES ('$a','$b','$c')";
                  if(mysqli_query($db,$sql))
                   {
                      echo "<script>alert('".$a." Added Successfully!');window.location='viewsupplier.php'</script>";
                 }
                 else
                 {
                     echo "<script>alert('Something went wrong');window.location='addsupplier.php'</script>";
                }
        }
        else
        {
            echo "<script>alert('This Supplier already Exists.');window.location='addsupplier.php'</script>";
        }
    }
?>















<br><br><br>

    <?php include('footer.php'); ?>