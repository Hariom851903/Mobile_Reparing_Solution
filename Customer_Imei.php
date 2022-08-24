<html>
    <head>
        <style>
            body{
                background-color: lime;
            }
            marquee{
              color: white;
                background-color: black;
                font-size: 30px;
            }
            .harry{
                 
            margin-left: 40%;
                margin-top: 5%;
                color: red;
            }
            select{
                font-size: 20px;
                color: blue;
            }
            button{
                font-size: 20px;
               background-color:yellow;
            }
            input{
                color: black;
                font-size: 20px;
            }
            label{
                font-size: 20px;
                color: darkblue;
            }
        </style>
    </head>
    <body>
        <marquee scrollamount="30"><h1>Check Your Mobile Status</h1></marquee>
        <?php 
         session_start();
            $user=$_SESSION['username'];
           $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
           $sql="select Imei from mobile where Username='{$user}'";
           if($res=mysqli_query($conn,$sql))
           {?>
            <form method="post" action="" class="harry"><select name="select"> 
            <option disabled selected>select Imei</option>    
             <?php while($r=mysqli_fetch_assoc($res)){ 
               $_SESSION['imei']=$r['Imei'];
               $im =$_SESSION['imei'];
                ?>
                <option><?php echo $im ?></option>
                <?php } ?>  
                </select><button name="click">Confirm</button></form>
     <?php
        }?> 
    <?php    
    if(isset($_POST['click']))
    {
         $sel=$_POST['select'];
        $r="Repaired";
        $d="Delivard";
         $sql1="select Status from mobile where Imei='{$sel}'";
         $res1=mysqli_query($conn,$sql1);
         $row=mysqli_fetch_assoc($res1); 
                $status= $row['Status'];
    ?>
    <div class="harry">   
   <label>Status</label> <input type="text" name="Sta" value="<?php echo $status ?>">  <?php    
   if($row['Status']==$r or $row['Status']==$d)
   {?>
            <button ><a href="customer_bill.php">Show Bill</a></button>
     <?php }}
        ?> 
        </div>    
</body>
</html>
