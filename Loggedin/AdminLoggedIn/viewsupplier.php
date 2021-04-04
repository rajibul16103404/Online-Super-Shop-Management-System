<?php include('header.php'); ?>
    <br><br><br><br><br><br><br><br>
<style>
    .supplier{
        width:50%;
        margin:10px auto;
    }
    table{
        width: 100%;
        padding:20px;
        text-align: center;
        border: 2px solid lightgray;
        box-shadow: 0px 0px 20px 5px white;
        border-radius: 10px;
    }
    table tr td{
        border-right: 2px solid gray;
        border-top: 2px solid gray;
       padding: 10px;
    }
    a{
        text-decoration: none;
    }
    span .fa{
        width:50%;
        border: none;
        font-size:20px;
        padding: 5px 2px;
        cursor: pointer;
        margin: 5px;
    }
    h2{
        font-size:25px;
        text-align: center;
        color: white;
        margin:15px auto;
        background: black;
        border-radius: 10px;
        width: 200px;
    }
    form{
                position: fixed;
                margin-left: 15%;
                margin-top: -65px;
                opacity: .9;
                width:100%;
            }
            form .search{
                font-size: 18px; 
                color: white;
                background: lightgreen;
                padding: 10px;
                border: 2px solid white;
                box-shadow: 0px 0px 5px 2px whitesmoke;
                width: 60%;
                cursor: text;
                border-radius:10px;
            }
            form input{
                font-size: 18px;
                color: white;
                background: lightgreen;
                border: 2px solid white;
                padding: 10px;
                box-shadow: 0px 0px 5px 2px whitesmoke;
                cursor: pointer;
                width:10%;
            }
</style>
    <form action="" method="POST">
        <input class="search" type="text" name="valuetosearch" placeholder="Enter Keyword.....">
        <input type="submit" name="submit" value="Search">
    </form>
<div class="supplier">
<table>
    <tr>
        <td style="border-top: none;">
            Suppliers Name
        </td>
        <td style="border-top: none;">
            Suppliers Phone
        </td>
        <td style="border-top: none;">
            Suppliers Address
        </td>
        <td style="border-top: none; width:100px; border-right:none;">
            Action
        </td>
    </tr>
    <?php
    $db=mysqli_connect('localhost','root','','swapno');
    if(isset($_POST['submit']))
            {
                $valuetosearch=$_POST['valuetosearch'];
                $srch="select * from supplier where concat(name,phone) like '%".$valuetosearch."%' ";
                $qry1=mysqli_query($db,$srch);
                if(mysqli_num_rows($qry1)>0)
                {
                    while($r=mysqli_fetch_assoc($qry1))
                    {
                        echo "<tr><td>".$r['name']."</td>
                        <td>".$r['phone']."</td>
                        <td>".$r['address']."</td>
                        <td style='border-right: none;'><a href='deletesupplier.php?id=".$r['id']."'><span  style='float:left;'><i class='fa fa-trash'></i></span><a>
                        <a href='updatesupplier.php?id=".$r['id']."'><span  style='float:left;'><i class='fa fa-refresh'></i></span><a></td></tr>";
                    }
                }
                else{
                    echo "<h5>No Result Found!</h5>";
                }
            }
            else{
                $sql="select * from supplier";
                $qry=mysqli_query($db,$sql);
                if(mysqli_num_rows($qry)>0)
                {
                    while($row=mysqli_fetch_assoc($qry))
                    {
                        echo "<tr><td>".$row['name']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['address']."</td>
                        <td style='border-right: none;'><a href='deletesupplier.php?id=".$row['id']."'><span  style='float:left;'><i class='fa fa-trash'></i></span><a>
                        <a href='updatesupplier.php?id=".$row['id']."'><span  style='float:left;'><i class='fa fa-refresh'></i></span><a></td></tr>";
                    }
                }
            }
    
    ?>
</table>
</div>


















<br><br><br>

    <?php include('footer.php'); ?>