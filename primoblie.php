
<html>
    <head>
       <style>
           body{
               background-color: green;
           }
             h1{
                color: blueviolet;
                 width: 50%;
                text-align: center;
                border: 2px solid aqua;
                 background-color: floralwhite;
                border-radius: 10px;
                margin: auto;
              }
           .login-1{
    max-width: 700px;
    min-width: 400px;           
    position: absolute;
    top: 20%;
    left:50%;
    transform: translate(-50%,-50%); 
               border: 2px solid black;
               border-radius: 5px;
}
           table{
               background-color:rgba(0,0,255,0.5);
        color: #fff;
        margin-bottom: 30px;
         border: none;
       border-bottom: 1px solid #fff;
    outline: none;         
           }
           th{
                            border: solid 2px red;
                            width: 160px;
                            height: 40px;
                            font-size: 25px;
                             color:yellow;
                         }
                        td{
                             border: solid 2px blue;
                            text-align: center;
                            font-size: 20px;
                        }
           h3,a{
             margin-top: -50px;
               padding: 0;
               color: red;
               text-decoration: none;
               font-size: 25px;
           }
           a:active{
               color: yellow;
           }
           a:hover{
               color: blue;
           }
        </style>
    </head>
<body>
    <h1>Previous Moblie Information</h1>
    <div class="login-1">
    <table cellpadding="10px" > 
        <tbody><thead>
            <th>Imei</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Problem</th>
            <th>Date</th>
            </thead>
            <?php 
     session_start();
    $imei=$_SESSION['imei'];
    $user=$_SESSION['suserid']; 
        
   $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
   $sql="select Imei,Brand,Model from mobile where Imei='{$imei}'"; 
     $re4=mysqli_query($conn,$sql);        
    $sql1="select p_id from mpr where Imei='{$imei}'";
        $res=mysqli_query($conn,$sql1);
        $val=mysqli_fetch_assoc($res);
        foreach($val as $r)
        {
            $sql="select p_name from problemlist where p_no=(select p_no from problem where p_id=$r)";
            $res2=mysqli_query($conn,$sql);
            $sql3="select Date from mpr where p_id=$r";
            $res3=mysqli_query($conn,$sql3);
         $sql4="select Date from mpr where Imei='{$imei}'";
              $res=mysqli_query($conn,$sql4);?>
            <tr>
                <?php while($row=mysqli_fetch_assoc($re4)){?>
                <td><?php echo $row['Imei']?></td>
                <td><?php echo $row['Brand']?></td>
                <td><?php echo $row['Model']?></td>
                <?php } ?>
                 
                <td><?php
            $val2=mysqli_fetch_assoc($res2);
            foreach($val2 as $r1)
                    {
                       echo $r1;
                     }
                   
                    ?></td>
                <td><?php 
            $val3=mysqli_fetch_assoc($res3); 
            foreach($val3 as $r2)
                    {
                       echo $r2;
                     }?></td>
            </tr>
            <?php }?>
        </tbody>        
    </table>
        
    </div>
                   <h3><a href="adminfront.php">Do You Want to Back?</a></h3>
    </body>
</html>