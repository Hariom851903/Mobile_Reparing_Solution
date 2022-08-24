<?php
   session_start();
  $user= $_SESSION['suserid'];
 $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
   $sql="select Invoice_no,Dil_charge,Repair_charge,Discount,Tax,Total,Date2 from bill where User_id='{$user}'";
  $res= mysqli_query($conn,$sql);
?>
<html><head><style>
     body
    {
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-color: turquoise;
    background-size: cover;
    }
            h1{
                text-align: center;
                color: mediumvioletred;
            }
                      th{
                            border: solid 2px red;
                            width: 140px;
                            height: 40px;
                            font-size: 20px;
                            color: blue;
                          
                         }
                        td{
                             border: solid 2px blue;
                            font-size: 20px;
                        }
                        table{
                            text-align: center;
                            margin: auto;
                            border: solid 2px black;
                            border-radius: 15px;
                            background-color: bisque;
                         
                        } 
    </style></head>
    <body>
         <h1>CUSTOMERES BILLS</h1> 
        <ul><li>
            <a href="adminfront.php">Home</a></li></ul>
    <table>
        <thead>
            <th>Invoice number</th>
            <th>Dilevery Charge</th>
            <th>Repairman Charge </th>
             <th>Discount</th>
              <th>Tax</th>
             <th>Total Amount</th>
             <th>Date</th>
        </thead><?php while($rows=mysqli_fetch_assoc($res)){?>
        <tr>
            <td><?php echo $rows['Invoice_no']?></td>
             <td><?php echo $rows['Dil_charge']?></td>
             <td><?php echo $rows['Repair_charge']?></td>
             <td><?php echo $rows['Discount']?></td>
             <td><?php echo $rows['Tax']?></td>
            <td><?php echo $rows['Total']?></td>
            <td><?php echo $rows['Date2']?></td>
           
        </tr> <?php } ?>
        </table>
    </body>
</html>