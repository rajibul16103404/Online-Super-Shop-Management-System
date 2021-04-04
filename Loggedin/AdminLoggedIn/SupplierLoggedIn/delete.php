<?php include('header.php') ?>
<br><br><br><br><br><br>

<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['id'];
           $del="DELETE FROM supplierorder WHERE id='$p' ";
           $res=mysqli_query($conn,$del);
           if($res)
           {
            echo "<script>alert('Order Deleted Successfully!');window.location='view.php?name=".$_GET['name']."'</script>";
           }
        }
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <title>Delete</title>
     </head>
     <body>
         <META http-equiv="refresh" content="0"; >
     </body>
 </html>



 <br><br><br><br>
 <?php include('footer.php') ?>