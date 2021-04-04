
<?php include('header.php'); ?>
    <br><br><br><br><br>

<style>
    button{
        width:100%;
        border: none;
        font-size:16px;
        padding: 10px 10px;
        border-radius: 10px;
        background: green;
        color: white;
        cursor: pointer;
    }
</style>

<?php
        $conn=mysqli_connect("localhost","root","","swapno");

        if($conn)
        {
            $p=$_GET['id'];
           $del="DELETE FROM contact WHERE id='$p' ";
           $res=mysqli_query($conn,$del);
           if($res)
           {
            echo "<script>alert('Feedback Deleted Successfully!');window.location='feedback.php'</script>";
           }
        }
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <title>Delete</title>
     </head>
     <body>
         <META http-equiv="refresh" content="0"; >
     </body>
 </html>

 <br><br><br>




    <?php include('footer.php'); ?>