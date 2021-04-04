<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['cartid'];
            $q=$_GET['id'];
           $del="DELETE FROM cart WHERE id='$p' ";
           $res=mysqli_query($conn,$del);
           if($res)
           {
               $sql="select * from userproduct where id=".$q." ";
               $qry=mysqli_query($conn,$sql);
               if(mysqli_num_rows($qry)>0)
               {
                   while($row=mysqli_fetch_assoc($qry))
                   {
                    $quantity=$row['quantity']+$_GET['quantity'];
                    $upd="update userproduct set quantity=$quantity where id=".$q." ";
                    $qry2=mysqli_query($conn,$upd);
                    if($qry2)
                    {
                        echo "<script>alert('Item Removed Successfully!');window.location='cart.php?user=".$_GET['user']."'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Something went wrong!');window.location='cart.php?user=".$_GET['user']."'</script>";
                    }
                   }
               }
            
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