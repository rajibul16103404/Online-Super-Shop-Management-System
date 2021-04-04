<!DOCTYPE html>
<html>
    <head>
        <style>
            h4{
                width:60%;
                text-align: center;
                font-size: 50px;
                color: green;
                
                margin: auto;
                margin-bottom: 20px;
            }
            form{
                margin:auto;
                text-align: center;
                
            } 
            select{
                width:20%;
                text-align: center;
                font-size: 20px;
                color: gray;
                background: whitesmoke;
                border-radius: 50px;
                padding: 10px;
            }
            input{
                width:10%;
                background: gray;
                color: whitesmoke;
                font-size: 20px;
                padding: 10px;
                border:none;
                border-radius: 50px;
                margin-left:20px;
                cursor: pointer;
            }
            
            table{
                box-shadow: 0px 0px 5px 5px lightyellow;
                margin: 10px auto;
                width: 95%;
                padding: 50px;
            }
            table tr td{
                padding: 10px;
                text-align:center;
            }
            .print{
                margin-left:45%;
                width:15%;
                background: greenyellow;
                color: whitesmoke;
                font-size: 20px;
                padding: 10px;
                border:1px solid green;
                border-radius: 50px;
                text-align:center;
                cursor: pointer;
            }
            .logo1{
                margin: auto;
                border: 1px solid green;
                width: 400px;
                height: 100px;
            }
            .logo1 img{
                width: 400px;
                height: 100px;
                margin: auto;
            }
            .shopdetails{
                margin :auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include('header.php') ?>
        <br><br><br><br><br><br>
        <form action="" method="POST">
            <h4>Report Generate For</h4>
            <select name="report" id="">
                <option value="">Select One</option>
                <option value="7">This Week</option>
                <option value="30">This month</option>
            </select>
            <input type="submit" name="submit" value="Generate">
        </form>

        <?php
            
            $db=mysqli_connect('localhost','root','','swapno');
            if(isset($_POST['submit']))
            {
                ?>
                <div id="printablearea">
                    <br><br>
                    <div class="logo1">
                        <img src="../../pictures/logo/logo.png" alt="Logo">
                    </div>
                    <div class="shopdetails">
                        <h2>Swapno Super Shop.</h2>
                        <p>Road #12, Sector #10, Uttara Model Town, Dhaka - 1230.</p> 
                    </div>
                    <table>
                        <tr style="font-size:25px;font-weight:bold;background:lightgray;">
                            <td>
                                Order Id
                            </td>
                            <td>
                                Username
                            </td>
                            <td>
                                Total Quantity
                            </td>
                            <td>
                                Total Price
                            </td>
                            <td>
                                Delivery Charge
                            </td>
                            <td>
                                Sales Date
                            </td>
                            <td>
                                Payment Status
                            </td>
                            
                        </tr>
                    
                <?php
                $get=$_POST['report'];
                        if($get==7)
                        {
                            if(date('d')<=7)
                            {
                                
                                $month=date('m')-1;
                                $day=date('d')+30;
                                for($i=$day; $i>=$day-7;$i--)
                                {
                                $sql="select * from porder where day='$i' and month='$month'";
                                $qry=mysqli_query($db,$sql);
                                if(mysqli_num_rows($qry)>0)
                                {
                                    
                                        while($row=mysqli_fetch_assoc($qry))
                                        {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['totalquantity']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['totalprice']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['deliverycharge']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['day']."-".$row['month']."-".$row['year']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['status']; ?>
                                        </td>
                                    </tr>
                                
                                    <?php
                                    }
                                }
                                }
                            }
                            else
                            {
                                
                                $day=date('d');
                                $month=date('m');
                                for($i=$day; $i>=$day-7;$i--)
                                    {
                                    $sql="select * from porder where day='$i' and month='$month' ";
                                    $qry=mysqli_query($db,$sql);
                                    if(mysqli_num_rows($qry)>0)
                                    {
                                        
                                        while($row=mysqli_fetch_assoc($qry))
                                        {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['username']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['totalquantity']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['totalprice']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['deliverycharge']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['day']."-".$row['month']."-".$row['year']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['status']; ?>
                                            </td>
                                        </tr>
                                    
                                        <?php
                                       
                                        }
                                    }
                                }
                            }
                        }
                    
                    else if($get==30)
                        {    
                            if(date('d')<=30)
                            {
                                $month=date('m');
                                $day=date('d');
                                for($i=$day; $i>=$day-30;$i--)
                                {
                                        $sql="select * from porder where day='$i' and month='$month'";
                                        $qry=mysqli_query($db,$sql);
                                        if(mysqli_num_rows($qry)>0)
                                        {
                                            
                                            while($row=mysqli_fetch_assoc($qry))
                                            {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['id']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['username']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['totalquantity']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['totalprice']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['deliverycharge']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['day']."-".$row['month']."-".$row['year']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }

                                }
                            }
                        } 
            
            
        
                            
  

                    echo "</table></div>";
            
        
        }
        ?>

    <input class="print" type="button" onclick="printDiv('printablearea')" value="Download PDF" />
<script>
function printDiv(printablearea) {
    var printContents = document.getElementById(printablearea).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}</script>


        <br><br><br>
        <?php include('footer.php') ?>
    </body>
</html>