<?php include('header.php'); ?>
    <br><br><br><br><br>
    <style>
        .hi{
            width: 50%;
            background: gray;
            border: none;
            border-radius:10px;
            color: white;
            margin: 20px auto;
        }
        table{
            width: 100%;
            height: 100%;
        }
        table tr td{
            width: 50%;
            font-size: 16px;
            padding: 5px;
            text-align: center;
            border-bottom: 3px solid lime;
        }
        a button{
        width:100px;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: red;
        color: white;
        cursor: pointer;
        margin-left: 45%;
    }

    </style>


    

    
        <?php
            $db=mysqli_connect('localhost','root','','swapno');
            $sql="select * from contact where status='unconfirmed'";
            $qry=mysqli_query($db,$sql);
            if(mysqli_num_rows($qry)>0)
            {
                while($row=mysqli_fetch_assoc($qry))
                {
                ?><div class="hi">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td ><?php echo $row['fullname']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td ><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td ><?php echo $row['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td ><?php echo $row['subject']; ?></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><?php echo $row['message']; ?></td>
                        </tr>
                    </table>
                    </div>

                    <a href="deletefeedback.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a>

                <?php
                }
            }
        ?>















<br><br><br>




    <?php include('footer.php'); ?>




