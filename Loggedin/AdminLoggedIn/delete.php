<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['id'];
           $del="DELETE FROM userproduct WHERE id='$p' ";
           $res=mysqli_query($conn,$del);
           if($res)
           {
            echo "<script>alert('Product Deleted Successfully!');window.location='viewproduct.php'</script>";
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