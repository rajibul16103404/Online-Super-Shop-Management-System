<?php include ('header.php') ?>
<br><br><br><br><br><br>
<style>
    table{
        width: 65%;
        background: gray;
        margin: 20px auto;
        text-align: center;
    }
    table tr td{
        font-size: 16px;
        padding: 15px;
        color: white;
    }
    a button{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
        margin-left: 40%;;
        float :left;
    }
    span a button{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: red;
        color: white;
        cursor: pointer;   
        margin-left: 20px;
        }
        h2{
            font-size: 18px;
            color: gray;
        }
        h3{
        font-size: 130px;
        color: lightgreen;
        text-align: center;
    }
    .confirm{
        background: lightgray;
        padding: 20px;
        width: 60%;
        box-shadow: 0px 0px 10px 5px lightgoldenrodyellow;
        margin: 20px auto;
    }
</style>
<?php
            $name=$_GET['name'];
            $db=mysqli_connect('localhost','root','','swapno');
            $sql="select * from supplierorder where status='unconfirmed'&& suppliername='$name'";
            $qry=mysqli_query($db,$sql);
            if(mysqli_num_rows($qry)>0)
            {
                while($row=mysqli_fetch_assoc($qry))
                {
                        ?>
                        <div class="confirm">
                    <table>
                        <br>
                        <h2><?php echo $row['date']; ?></h2>
                        <hr>
                        <tr>
                            <td>Product Name</td>
                            <td><?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Quantity</td>
                            <td><?php echo $row['quantity']; ?></td>
                        </tr>
                    </table>
                    
                    <a href="confirm.php?id=<?php echo $row['id']; ?>&&name=<?php echo $name; ?>&&quantity=<?php echo $row['quantity']; ?>"><button>Confirm</button></a>
                    <span><a href="delete.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a></span>
                    <br><br>
                </div>
                <?php
                }
            }
            else
            {
                echo "<h3>No Orders From Admin</h3>";
            }
        
    
      ?>
        <br><br>
        















<?php include ('footer.php') ?>