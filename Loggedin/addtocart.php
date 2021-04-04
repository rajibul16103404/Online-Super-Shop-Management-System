<?php
    $db=mysqli_connect('localhost','root','','swapno');
    $b=$_GET['id'];
    $user=$_GET['user'];
    $a=1;
    $sql="select * from userproduct where id='$b'";
    $qry=mysqli_query($db,$sql);
    if(mysqli_num_rows($qry)>0)
    {
        while($row=mysqli_fetch_assoc($qry))
        {
            $quantity=$row['quantity']-$a;
            $c=$row['price'];
            $d=$c-($c*($row['offer']/100));
            $e=$c-$d;
            $f=$d*$a;
            $sql1="insert into cart (username,name,price,offer,quantity,discountedprice,amountsaved,total) values 
            ('$user','$row[name]','$c','$row[offer]','$a','$d','$e','$f')";
            $qry1=mysqli_query($db,$sql1);
            if($qry1)
            {
                echo "<script>alert('".$row['name']." Added To Cart.');window.location='userproduct.php?user=".$user."'</script>"; 
            }
            else
            {
                echo "<script>alert('Something Went Wrong.');window.location='details.php?user=".$user."&&id=".$b."'</script>"; 
            }
        }
    }
?>