<?php
    $db=mysqli_connect('localhost','root','','swapno');
    $a=$_POST['quantity'];
    $b=$_GET['id'];
    $user=$_GET['user'];
    $sql="select * from userproduct where id='$b'";
    $qry=mysqli_query($db,$sql);
    if(mysqli_num_rows($qry)>0)
    {
        while($row=mysqli_fetch_assoc($qry))
        {
            $c=$row['price'];
            $d=$c-($c*($row['offer']/100));
            $e=$c-$d;
            $f=$d*$a;
            $sql1="insert into cart (username,name,price,offer,quantity,discountedprice,amountsaved,total) values 
            ('$user','$row[name]','$c','$row[offer]','$a','$d','$e','$f')";
            $qry1=mysqli_query($db,$sql1);
            if($qry1)
            {
                $quantity=$row['quantity']-$a;
                $upd="update userproduct set quantity=$quantity where id=$b";
                $qry2=mysqli_query($db,$upd);
                if($qry2)
                {
                    echo "<script>alert('Cart Updated Successfully.');window.location='userproduct.php?user=".$user."'</script>";
                }
                else{
                    echo "<script>alert('Something Went Wrong.');window.location='details.php?user=".$user."&&id=".$b."'</script>";
                }
            }
            else
            {
                echo "<script>alert('Something Went Wrong.');window.location='details.php?user=".$user."&&id=".$b."'</script>"; 
            }
        }
    }
?>