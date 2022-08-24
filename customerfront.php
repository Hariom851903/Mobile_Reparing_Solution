<?php
 $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
?>
<html>
    <head>  
        <style>
            body{
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-image: url("mobile-smartphone.jpg");
    background-repeat: repeat;
    background-size: cover;
}
.mobile{
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 600px;
    padding: 30px;
    background-color: rgba(255,255,255,.1); 
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.5);
    border-radius: 15px;
}
        .mobile .inputuser input{
      width: 90%;
    padding: 10px 0;
    font-size:16px; 
     background-color: rgba(0,0,0,0.8);
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
}
        .mobile .inputuser label{
    position: absolute;  
    padding: 10px 0;
    font-size:20px; 
    color:red;
    pointer-events: none;
    transition: .5s;
        }
        .mobile input[type="submit"]
{
    font-size: 15px;
    border: none;
    outline:none;
    color: white;
    background: lime;
    padding: 10px 20px;
    cursor: pointer;
}
            .lbel1{
                color: palevioletred;
               
            }
            .btn{
                margin-left: 10px;
                margin-top: 20px;
                font-size: 20px;
            }
            .inputuser-1{
                text-align: center;
                color: rgba(0,0,255,0.7);
                font-size: 25px; 
            }
            select{
                width: 90%;
    padding: 10px 0;
    font-size:16px; 
     background-color: black;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
}
        </style>
    </head>


    <body>
        <div class="mobile">
        <form action="customerfront.php" method="post"> 
            <div class="inputuser">
             <input type="text" name="mImei" required=""><label>Imei</label>
            </div>
             <div class="inputuser" >
            <input type="text" name="mbrand" required=""><label>Brand</label>
            </div>
                       <div class="inputuser">
             <input type="text" name="model" required=""><label>Model</label>
            </div>
            
            <div class="inputuser">
                <select class="input"  name="select-1[]">
                    <option disabled selected>select problem</option>
                <?php
                    $sql1="select * from problemlist";
                    $result=mysqli_query($conn,$sql1) or die("FAILED");
                    while($data=mysqli_fetch_assoc($result)){
                        $name=$data['p_name'];
                        $no=$data['p_no'];
                  echo "<option value='$no'>$name</option>";
                    }
                ?>
                
                </select> <label>Problems</label>   
                </div>
            <div class="inputuser-1">
            <label>Dilevery:</label><input type="radio" name="dilevery" value="1"><label>Yes</label> <input type="radio" name="dilevery" value="0"><label>No</label>   
            </div>
            <div class="inputuser-1">
            <label>Pickup:</label><input type="radio" name="Pickup" value="1"><label>Yes</label> <input type="radio" name="Pickup" value="0"><label>No</label>   
            </div>
            <div class="btn">
              <label class="lbel1">Do you want to continue?</label><input type="submit" value="Yes" onclick="alet()" name="Submit">
            </div>  
            <H1>OR</H1>
            <div class="btn">
              <label class="lbel1">Add more mobile</label><input type="submit" value="Yes" name="Submit-1">
            </div>    
        </form>
        </div>
    <?php
        if(isset($_POST['Submit'])){
            Insert();  
            problem();// function call-------1
        }
       if(isset($_POST['Submit-1']))
       {
           Insert();  
             problem();//function call--------1
           header("Location: customerfront.php");
       }
    ?>    
<?php
function Insert(){            //function diffination-------1
      session_start();
      $user=$_SESSION['username'];
       $m_brand= $_POST['mbrand'];
       $m_imei= $_POST['mImei'];
       $m_model= $_POST['model'];
       $m_del=(int)$_POST['dilevery'];
       $m_pic=(int)$_POST['Pickup'];
         $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
     $select="select Imei from mobile where Imei='{$m_imei}'"; 
    $res=mysqli_query($conn,$select);
    if(mysqli_num_rows($res)>0)
    {
           $sts= NULL;
            $sel="update  mobile set Brand='{$m_brand}',Model='{$m_model}',Username='{$user}',
      pickup={$m_pic},delivery={$m_del},Status=NULL where Imei='{$m_imei}'";
      if(mysqli_query($conn,$sel))
      {   
          header("Location: Userlogin.html");
          echo "RECORDE UPDATE";
      }
        else{
               echo "RECORDE NOT UPDATE".mysqli_error($conn);
             }  //function call-------------3
    }
    else
    {
     $sql="insert into mobile(Imei,Brand,Model,Username,pickup,delivery) values('{$m_imei}','{$m_brand}','{$m_model}','{$user}','{$m_pic}',
     '{$m_del}')";  
    if(mysqli_query($conn,$sql))
    {
        header("Location: Userlogin.html");
        mysqli_close($conn);
    }
    else
    {
        echo "unsuccess".mysqli_error($conn);
    }
   }
}
?>
    <?php 
    function problem()         // function diffination---------2
    {
          $m_imei= $_POST['mImei'];
        $date =date ('y-m-d');
         $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
        $m_pro=$_POST['select-1'];
       // $arr[];
       foreach($m_pro as $si)
      {
        $sql2="insert into problem(p_no) values({$si})";
        $sql3="select max(p_id) as max from problem";
             $res=mysqli_query($conn,$sql2);
           $result = mysqli_query($conn,$sql3);
           $row= mysqli_fetch_array($result);
           $sql4="insert into mpr values('{$m_imei}',{$row['max']},'{$date}')";
           if(mysqli_query($conn,$sql4)) 
           { ?><script>
    function alet(){
                 alert("Successfully Recorded");
        
    }    </script>  
           <?php }
           else
           {
                 echo "unsuccess".mysqli_error($conn);
           }
       }
  
        
    }
        
    ?>
    </body>
   </html>