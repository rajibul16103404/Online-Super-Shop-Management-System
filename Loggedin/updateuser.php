<!DOCTYPE html>
<html>
    <head>
        <style>
            .reg{
                background-color: gray;
                margin:auto;
                margin-top:100px;
                width:60%;
                height:80%;
                text-align: center;
                border-radius: 10px;
            }
            .reg input, textarea{
                font-size:15px;
                padding: 10px;
                margin: 5px;
                border: 1px solid white;
                box-shadow: 1px 1px 5px 5px gray;
                width: 70%;
                border-radius: 10px;
            }
            .reg input[name="submit"]
            {
                width:30%;
                cursor: pointer;
            }
            .reg input[name="email"]
            {
                margin-top: 20px;
            }
            .reg table{
                width: 100%;
                margin: auto;
            }
            .reg table tr td{
                padding: 10px;
                width: 800px;
            }
        </style>
    </head>
    <body>
        <?php include('header.php'); ?>
        <br><br><br>

        <div class="reg">
            <form action="" method="POST">
                <?php
                    $db=mysqli_connect('localhost','root','','swapno');
                    $sql="select * from register where fullname='$_GET[user]' ";
                    $qry=mysqli_query($db,$sql);
                    if(mysqli_num_rows($qry)>0)
                    {
                        while($row=mysqli_fetch_assoc($qry))
                        {
                ?>
                            <table>
                                <tr>
                                    <td>
                                        Email
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="<?php echo $row['email']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Phone Number
                                    </td>
                                    <td>
                                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Address
                                    </td>
                                    <td>
                                        <textarea name="address" cols="10" rows="2"><?php echo $row['address']; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Password
                                    </td>
                                    <td>
                                        <input type="text" name="password" value="<?php echo $row['password']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <input type="submit" name="submit" value="Update">
                                    </td>
                                </tr>
                            </table>    
                <?php
                        }
                    }
                ?>
            </form>
        </div>

        <?php
            if(isset($_POST['submit']))
            {
                $sql1="update register set email='$_POST[email]', phone='$_POST[phone]', address='$_POST[address]', password='$_POST[password]' where fullname='$_GET[user]' ";
                if(mysqli_query($db,$sql1))
                {
                    echo "<script>alert('".$_GET['user']." s info updated Successfully');window.location='dashboard.php?user=".$_GET['user']."'</script>";
                }
                else
                {
                    echo "<script>alert('Something went wrong!');window.location='updateuser.php?user=".$_GET['user']."'</script>";
                }
            }
        ?>

        <br><br><br>
        <?php include('footer.php'); ?>
    </body>
</html>