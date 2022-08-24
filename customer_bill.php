<html><head>
    <style>
        body{
                margin: 0;
               padding: 0;
                height: auto;
            font-family: sans-serif;
            background-color: rgba(128,0,128,0.6);
        }
        .login-2{
    position: absolute;
    top: 53%;
    left: 50%;      
    transform: translate(-50%,-50%);
    width: 600px;
    height: 800px;     
    padding: 40px;
    background-color: rgba(0,128,128,0.5); 
    box-sizing: border-box;
    border-radius: 60px;
}
 .login-2 .inputuser{
       width: 100%;
    padding: 0 0;
    font-size:20px; 
     background-color: white;
    color: black;
     margin-bottom: 20px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
}
input{
                font-size: 20px;
                border: 1px solid #fff;
                
    }
        .shop{
        color: blue;
          margin-top: 10px; 
       margin-left: 100px;       
        }
        button{
           color: black;
            background-color: aqua;
            margin-left: 30px;
     }
        label{
            color: rgba(0,0,255,0.7);
        }
    </style>
    </head>
    <body>
     <?php
    session_start();
     $user=$_SESSION['username'];
         
     $Imei=$_SESSION['imei'];
        
    $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
    $sql2="select Shop_name,Contact_no from admin where User_id=(select User_id from customer where Username='{$user}')";
    $res2=mysqli_query($conn,$sql2);
    $sql3="select C_fn,C_ln,C_no,Ali from customer where Username='{$user}'";
    $res3=mysqli_query($conn,$sql3);
    $sql4="select Brand,Model from mobile where Imei='{$Imei}'";
    $res4=mysqli_query($conn,$sql4);
        
    $sql5="select Invoice_no,Date2,Dil_charge,Discount,Repair_charge,Tax,Total from bill where  Username='{$user}' AND Imei='{$Imei}'";
    $res5=mysqli_query($conn,$sql5); ?>
    <form><div class="login-2">
    <?php while($row=mysqli_fetch_assoc($res2)){?> 
        <h1 class="shop"><?php echo $row['Shop_name']; ?></h1>
          <div class="inputuser">
              <label>Shop Contact: </label>   <input type="text" value="<?php echo $row['Contact_no']; ?>"></div>
        <?php } while($row1=mysqli_fetch_assoc($res3)){?>
        
        <div class="inputuser">
            <label>Customer Name::</label><input type="text" value="<?php echo $row1['C_fn'];?> <?php echo $row1['C_ln'];?>" ></div>
        <div class="inputuser"><label>Contact Number:: </label>  <input type="text" value="<?php echo $row1['C_no']; ?>"></div>
        <div class="inputuser"> <label>Address::  </label><input type="text" value="<?php echo $row1['Ali']; ?>"></div>
        <?php } while($row2=mysqli_fetch_assoc($res4)) {?>
        <div class="inputuser"> <label>Brand::     </label> <input type="text" value="<?php echo $row2['Brand']; ?>" ></div>
        <div class="inputuser"> <label>Model::       </label><input type="text" value="<?php echo $row2['Model']; ?>" ></div>
        <?php } while($row3=mysqli_fetch_assoc($res5)) {?>
        <div class="inputuser"> <label>Invoice_No::    </label><input type="text" value="<?php echo $row3['Invoice_no']; ?>" ></div>
        <div class="inputuser"><label>Date:</label><input type="text" value="<?php echo $row3['Date2']; ?>" ></div>
        <div class="inputuser"> <label>Delivery_charge::  </label><input type="text" value="<?php echo $row3['Dil_charge']; ?>" ></div>
        <div class="inputuser"><label>Discount::     </label><input type="text" value="<?php echo $row3['Discount']; ?>%" ></div>
        <div class="inputuser"><label>Repair_Charge::     </label> <input type="text" value="<?php echo $row3['Repair_charge']; ?>" ></div>
        <div class="inputuser"><label>Tax::       </label><input type="text" value="<?php echo $row3['Tax']; ?>%" ></div>
        <div class="inputuser"> <label>Total::     </label><input type="text" value="<?php echo $row3['Total']; ?>" ></div>
        <?php } ?>
        <button onclick="window.print()">Print</button>
        </div>    
    </form>
    </body>    
</html>