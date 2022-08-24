<html>
   <head>
     <style>
          body{
       margin: 0;
       padding: 0;     
                height: auto;
            font-family: sans-serif;
    background-image: url("msolution.jpg");
    background-repeat: repeat;
              background-size: cover;
         }
       h1{
          text-align: center; 
           color: rgba(255,165,0,0.8);
           font-size: 60px;
        }    
         li a{
              text-decoration: none;
             }
         .Dis{
             width: 1300px;
             height: 80px;
             margin: 0 auto;
             padding: 0;
          } 
         .Dis ul{
             list-style: none;
             margin-top: 2%;
               } 
         
         .Dis ul li a{
             background: rgba(0,0,255,0.4);
             width: 170px;
             border: 1px solid #fff;
             line-height: 50px; 
             text-align: center;
             color: #fff;
             float: left;
             font-size: 14px;
             position: relative;
         }
        .Dis ul ul{
           display: none;
        }
         .Dis ul li:hover > ul
         {
             display: block;
         }
         .Dis ul ul{
             margin-left: 130px;
             top: 130px;
             position: absolute;
         }
         .nav{
             margin-left: 175px;
         }
         .Recorde
         {
             text-align: center;
         }
               th{
                            border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: deeppink;
                          
                         }
                        td{
                             border: solid 2px blue;
                            font-size: 20px;
                        }
                        table{
                            text-align: center;
                            margin: auto;
                            border: solid 2px green;
                            background-color: rgb(0,255,255,0.4);
                         
                        }
       </style>
    </head>
    <?php
    session_start();
    ?>
    <body><h1> All Mobile Solution</h1>
        <div>
            <div class="Dis">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Repirmen</a>
                        <ul class="none-1">
                        <li><a href="Riparmen.php">Add</a></li>
                        <li><a href="Re-updateDelete.php">Edit/Delete</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Dilevery Man</a>
                        <ul >
                        <li class="nav"><a href="dileveryboy.php">Add</a></li>
                        <li class="nav"><a href="del-updelete.php">Edit/Delete</a></li>
                      </ul>
                    </li>
                    <li><a href="upsrepaired.php"> update Status</a></li>
                     <li><a href="checkout.php">CheckOut</a></li>
                    <li><a href="showbill.php">Bills</a></li>
                     <li><a href="Adminlogin.html">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="Recorde">
        <table cellpadding="10px">
             <tbody>
           <thead >
                <th >First Name</th>
                 <th>Last Name</th>
                 <th>Phone Number</th>
                 <th>Email</th>
                  <th>Imei</th>
                 <th>Brand</th>
                 <th>Model</th>
                 <th>Problem</th>
                 <th>Request</th>
                 <th>NEW/OLd</th>
            </thead>
                 <?php
                       $user = $_SESSION['suserid'];
                       $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed"); 
                        $sq="select Imei from mobile where Status IS NULL AND Username in(select Username from customer where User_id='{$user}')";
                       $re=mysqli_query($conn,$sq);
                      while($value= mysqli_fetch_assoc($re)){
                       if(!(is_null($value))){
                       $_SESSION['imei']=$value['Imei'];
                      $harr=$_SESSION['imei'];?>
          <?php                
            $sql1="Select C_fn,C_ln,C_no,Email from customer where Username=(select Username from mobile where Imei='{$harr}')";
             if($res=mysqli_query($conn,$sql1))
               {?><tr><?php   
                 while($rows=mysqli_fetch_assoc($res))
                 {?><td><?php echo $rows['C_fn']?></td>
                <td><?php echo $rows['C_ln']?></td>
                <td><?php echo $rows['C_no']?></td>
                <td><?php echo $rows['Email']?></td><?php } }?>
                <?php 
                 $sql2="Select Imei,Brand,Model from mobile where Imei= '{$harr}'";
                    $res1=mysqli_query($conn,$sql2);     
                  while($rows1=mysqli_fetch_assoc($res1))
               { ?>
                <td><?php echo $rows1['Imei']?></td>
                <td><?php echo $rows1['Brand']?></td>
                <td><?php echo $rows1['Model']?></td><?php }?>
                <?php 
                 $sql3="select p_id from mpr where Imei= '{$harr}' AND Date=(select Max(Date) as date from mpr where Imei='{$harr}')";
                  $res3=mysqli_query($conn,$sql3);
                  $value1=mysqli_fetch_assoc($res3);
                  foreach($value1 as $sq2)
                  {
                  $sql4="select p_name from problemlist where p_no=(select p_no from problem where p_id='{$sq2}')";
                  }
                  $res4=mysqli_query($conn,$sql4);
                  while($row=mysqli_fetch_assoc($res4)){?>
                 <td><?php echo $row['p_name']; ?></td><?php } ?>
                  <?php $sql6="select P_id from mpr where Imei= '{$harr}'";
                    if(mysqli_query($conn,$sql6))
                    {
                       $pid= mysqli_fetch_assoc(mysqli_query($conn,$sql6));  
                       }
                           else{
                              
                         }
                          
                 ?>
                    <form action="Updatestatus.php" method="post"><td><input type="Radio" Name="status" value="Accept"><button name="Accept" value="<?php echo $pid['P_id']; ?>">Accept</button><input type="Radio" Name="status" Value="Reject"> <button name="Reject" value="<?php echo $pid['P_id']; ?>">Reject</button></td></form>
                   
               <?php $sql5="select p_id,Imei,Date from mpr where Imei= '{$harr}'";
                           
                  $res5=mysqli_query($conn,$sql5); 
                           
                    if(mysqli_num_rows($res5)>1)
                             {  ?><td>
                 
                 <a href="primoblie.php">Privious</a></td>
                        <?php } 
                           else{?> 
                               <td><a href="#">New</a>
                                  </td>   
                                <?php } ?> 
                 <?php }}?> </tr> 
             </tbody>          
      </table>
        </div>     
  </body>
</html>