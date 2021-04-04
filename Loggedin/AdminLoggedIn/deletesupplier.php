<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['id'];
           $del="DELETE FROM supplier WHERE id='$p' ";
           $res=mysqli_query($conn,$del);
           if($res)
           {
            echo "<script>alert('Supplier Removed Successfully!');window.location='viewsupplier.php'</script>";
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