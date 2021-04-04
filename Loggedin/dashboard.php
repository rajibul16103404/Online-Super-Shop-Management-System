<!DOCTYPE html>
<html>
    <head>
        
        <style>
           #clock{
            font-family: 'Permanent Marker', cursive;
            width:30%;
            margin: auto;
            font-size: 50px;
            text-align: center;
            background: greenyellow;
            color: gray;
            box-shadow: 0px 0px 10px 5px green;
           } 
           #date{
            font-family: 'Permanent Marker', cursive;
            width:40%;
            margin: auto;
            font-size: 50px;
            text-align: center;
            color: green;
           } 
           .order, .info{
                width: 40%;
                border: 2px solid lightgoldenrodyellow;
                border-radius: 10px;
                margin: auto;
                padding: 50px;
                margin-top: 20px;
                float: left;
                margin: 5%;
           }
           .info img{
               width: 200px;
               height:200px;
               margin: auto;
               margin-top: -20px;
           }
           .info table tr td{
                border: 2px solid gray;
                width: 50%;
                padding: 10px;
           }
           .info table tr td button{
                width: 100%;
                height: 100%;
                color: lightgray;
                border-radius: 10px;
                border-bottom: 2px solid lightgreen;
                box-shadow: 0px 0px 5px green;
                color: lemonchiffon;
                background: black;
                cursor: pointer;
                padding: 5PX;
           }
           
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br><br><br><br>
        <div id="clock">

        </div>
        <div id="date">
           <?php 
           $month=date('m');
                if($month == 1)
                    echo date('D    ,d  ')."January".date(' Y');
                else if($month == 2)
                    echo date('D    ,d  ')."February".date('    Y');
                else if($month == 3)
                    echo date('D    ,d  ')."March".date('   Y');
                else if($month == 4)
                    echo date('D    ,d  ')."April".date('   Y');
                else if($month == 5)
                    echo date('D    ,d  ')."May".date(' Y');   
                else if($month == 6)
                    echo date('D    ,d  ')."June".date('    Y');
                else if($month == 7)
                    echo date('D    ,d  ')."July".date('    Y');
                else if($month == 8)
                    echo date('D    ,d  ')."August".date('  Y');
                else if($month == 9)
                    echo date('D    ,d  ')."September".date('   Y');
                else if($month == 10)
                    echo date('D    ,d  ')."October".date(' Y');
                else if($month == 11)
                    echo date('D    ,d  ')."November".date('    Y');
                else
                    echo date('D    ,d  ')."December".date('    Y');
                
                    
           ?>
        </div>

        <div class="container">
           <div class="order">
           <table class="date">
                                    <tr>
                                        <td style="border: 2px solid gray; padding:5px;">
                                           List of orders date
                                        </td>
                                    </tr>
                <?php
                    $db=mysqli_connect('localhost','root','','swapno');
                    $a=0;
                    $sql1="select * from porder where username='$_GET[user]' ";
                    $qry1=mysqli_query($db,$sql1);
                    if(mysqli_num_rows($qry1)>0)
                    {
                        while($row1=mysqli_fetch_assoc($qry1))
                        {
                            $a++;
                            ?>
                                    <tr>
                                        <td>

                                        </td>
                                        <td style="border: 2px solid gray; padding:5px;">
                                            <?php echo $row1['day']."/".$row1['month']."/".$row1['year']; ?>
                                            <?php echo "<br>"; ?>
                                        </td>
                                    </tr>
                            <?php
                        }
                    }

                ?>
                                </table>
                                <br>
                                <br>
                                <br>
                                <table class="number">
                                    <tr>
                                        <td style="border: 2px solid gray; padding:5px;">
                                            Number Of Purchased Orders From This Site
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td style="border: 2px solid gray; padding:5px;">
                                            <?php echo $a; ?>
                                        </td>
                                    </tr>
                                </table>
           </div>
           <div class="info">
                <?php
                      
                    $sql="select * from register where fullname='$_GET[user]'";
                    $qry=mysqli_query($db,$sql);
                    if(mysqli_num_rows($qry)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry))
                        {
                            ?>
                                <table>
                                    <tr>
                                        <img src="../pictures/logo/user.png" alt="User">
                                    </tr>
                                    <tr>
                                        <td>
                                            Name
                                        </td>
                                        <td>
                                            <?php echo $row['fullname']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email Address
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Phone
                                        </td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            <?php echo $row['address']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                        <td>
                                        <a href="updateuser.php?user=<?php echo $_GET['user']; ?>"><button>Change</button></a>
                                        </td>
                                    </tr>
                                    
                                </table>
                            <?php
                        }
                    }
                ?>
           </div>
        </div>


        <script>
            setInterval(displayclock, 500);
            function displayclock(){
                var time = new Date();
                var hrs = time.getHours();
                var min = time.getMinutes();
                var sec = time.getSeconds();
                var en='AM';
                if(hrs>12)
                {
                    en = 'PM';
                    hrs = hrs-12;
                }

                if(hrs == 0)
                {
                    hrs = 12;
                }

                if(hrs<10)
                {
                    hrs = '0' + hrs;
                }
                if(min<10)
                {
                    min = '0' + min;
                }
                if(sec<10)
                {
                    sec = '0' + sec;
                }

                document.getElementById('clock').innerHTML= hrs + ' :   ' + min + ' :   ' + sec + ' '+en;
            }
        </script>



        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>