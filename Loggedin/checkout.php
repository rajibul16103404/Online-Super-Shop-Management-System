<html>
    <head>
        <title>CheckOut</title>
        <style>
            h1{
                font-size: 150px;
                color: lightgreen;
                text-align: center;
            }
        </style>
    </head>
<body>
    <?php include('header.php'); ?>
<br><br><br><br><br><br>
                                                            

<?php
if(isset($_POST['submit1']))
{
    $db=mysqli_connect('localhost','root','','swapno');
       
                   $username=$_GET['user'];
                    $sum=$_POST['price'];
                    $quantity=$_POST['quantity'];
                    $deliverycharge=$_POST['deliverycharge'];
                    
                    $sql4="select * from delivery where name='$deliverycharge'";
                    $qry4=mysqli_query($db,$sql4);
                    if(mysqli_num_rows($qry4)>0)
                    {
                        $row1=mysqli_fetch_assoc($qry4);
                    }
                        $delivery=$row1['price'];
                        if($sum!=0 && $quantity!=0)
                        {
                            $d=date('d');
                            $m=date('m');
                            $y=date('yy');
                            $status=$_POST['payment'];
                            $sql3="insert into porder(username,totalquantity,totalprice,deliverycharge,day,month,year,status)
                            values('$username','$quantity','$sum','$delivery','$d','$m','$y','$status')";
                        
                            if(mysqli_query($db,$sql3))
                            {
                                $sql6="select * from cart where username='$username'";
                                $qry6=mysqli_query($db,$sql6);
                                if(mysqli_num_rows($qry6)>0 )
                                { 
                                    while($row2=mysqli_fetch_assoc($qry6))
                                    {
                                
                                        $sql4="select * from porder where username='$username' && totalquantity='$quantity' && totalprice='$sum' && deliverycharge='$delivery'" ;
                                        $qry4=mysqli_query($db,$sql4);
                                        if(mysqli_num_rows($qry4)>0)
                                        {
                                            $r=mysqli_fetch_assoc($qry4);
                                        }
                                                $sql5="insert into checkout (orderid,username,name,price,offer,discountedprice,amountsave,quantity,day,month,year,payment)
                                                values('$r[id]','$username','$row2[name]','$row2[price]','$row2[offer]','$row2[discountedprice]','$row2[amountsaved]','$row2[quantity]','$d','$m','$y','$_POST[payment]') ";
                                                if(mysqli_query($db,$sql5))
                                                {  
                                                    $total=$row2['discountedprice']*$row2['quantity'];
                                                    $sql7="insert into copycart (orderid,username,name,price,offer,discountedprice,amountsave,quantity,total)
                                                   values ('$r[id]','$username','$row2[name]','$row2[price]','$row2[offer]','$row2[discountedprice]','$row2[amountsaved]','$row2[quantity]','$total') ";

                                                   if(mysqli_query($db,$sql7))
                                                   {
                                                    $del="DELETE FROM cart WHERE id='$row2[id]' ";
                                                    $res=mysqli_query($db,$del);
                                                    if($res)
                                                    {
                                                        echo "<script>alert('Checkout Successfully');window.location='checkoutfinal.php?user=".$username."&&orderid=".$r['id']."'</script>";
                                                    }
                                                    else
                                                    {
                                                        echo "Not Successful";
                                                    }
                                                   }
                                                   else
                                                   {
                                                    echo "<script>alert('Not ok1');</script>";
                                                   }
                                                    
                                                } 
                                                else
                                                {
                                                    echo "<script>alert('Not ok2');</script>";
                                                } 
                                    } 
                                    ?>




                                    <?php
                                }
                            }
                        }
                        else{
                            echo "<h1>Empty</h1>";
                        }
                        }
                                        
                                                           
                                        
                                    ?>
                                                            <br><br><br>
                                                            <?php include('footer.php'); ?>
                                                        </body>
                                                        </html>


                                       
