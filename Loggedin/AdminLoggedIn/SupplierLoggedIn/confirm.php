<?php include('header.php') ?>
<br><br><br><br><br><br>

<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['id'];
            $name=$_GET['name'];
            $quantity=$_GET['quantity'];
            $del="update supplierorder set status='confirmed' where id='$p' ";
            $res=mysqli_query($conn,$del);
            if($res)
            {
                $sql="select * from supplierorder where id='$p'";
                $qry=mysqli_query($conn,$sql);
                if(mysqli_num_rows($qry)>0)
                {
                    if($row=mysqli_fetch_assoc($qry))
                    {
                        $total=0;
                        $sql1="select * from userproduct where name='".$row['name']."'";
                        $qry1=mysqli_query($conn,$sql1);
                        if(mysqli_num_rows($qry1)>0)
                        {
                            if($row1=mysqli_fetch_assoc($qry1))
                            {
                            
                            $total=$row1['quantity']+$row['quantity'];
                            $update="update userproduct set quantity='$total' where name='".$row['name']."'";
                            if(mysqli_query($conn,$update))
                            {
                                echo "<script>alert('Order Confirmed Successfully!');window.location='supplier.php?name=".$name."'</script>";
                            }
                        }}
                    }
                }
                
            }
        }
        
           
        
 ?>




 <br><br><br><br>
 <?php include('footer.php') ?>