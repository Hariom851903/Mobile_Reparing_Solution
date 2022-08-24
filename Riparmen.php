<html>
    <head>
               <style>
            body{
    margin: 0;
    padding: 0;
                height: auto;
    font-family: sans-serif;
    background-image: url("admin2.jpg");
    background-repeat: repeat;
    background-size: cover;
}
.Repaire{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    padding: 30px;
    background-color: rgba(0,0,128,.8); 
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.5);
    border-radius: 10px;
}
.Repaire h1{
    font-size: 30px;
    margin: 0 0 30px;
    padding: 0;
    color: deeppink;
    text-align: center;
}
.Repaire .inputuser{
    position: relative;
}
 .Repaire .inputuser input{
width: 100%;
    padding: 10px 0;
    font-size:16px; 
     background-color: black;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
}
.Repaire .inputuser label{
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size:16px; 
    color: #fff;
    pointer-events: none;
    transition: .5s;
    
}
.Repaire .inputuser input:focus~label,
.Repaire .inputuser input:valid~label{
    top: -18px;
    left: 0;
    color: aqua;
    font-size:12px; 
}
.Repaire input[type="submit"]
{
    font-size: 15px;
    border: none;
    outline:none;
    color: white;
    background: lime;
    padding: 10px 20px;
    cursor: pointer;
}
                   a{
                       font-size: 30px;
                       color: aqua;
                       text-decoration: none;
                   }
                   li{
                       list-style: none;
                   }
        </style>
    </head>
    <body>
        
        <div class="Repaire">
        <div><ul><li><a href="adminfront.php">Home</a></li></ul></div>    
            <h1>Reparimen Information</h1>
        <form  method="post">
            <div class="inputuser">
                <input type="text" name="name" required=""><label>Name</label>
            </div>
            <div class="inputuser">
                <input type="text" name="cphone" required=""><label>Phone Number</label>
            </div>
            <div class="inputuser">
                <input type="text" name="Add" required=""><label>Adddress</label>
            </div >
            <div class="inputuser">
                <input type="text" name="city" required=""><label>City</label>
            </div >
            <input type="submit" name="submit-2" Class="btnlogin">
            </form>
        </div>
    <?php
            session_start();
         if(isset($_POST['submit-2']))
         {
           $user= $_SESSION['suserid'];
             $r_name=$_POST['name'];
             $r_no=$_POST['cphone'];
             $r_address=$_POST['Add'];
             $r_city=$_POST['city'];
             $job=0;
             $date= date('y-m-d');
             $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
              $sql="insert into repaireman(Name,jobs,C_no,DOJ,Address,City,User_id) values('{$r_name}','$job','{$r_no}',$date,'{$r_address}','{$r_city}','{$user}')";
           if(mysqli_query($conn,$sql))
            {  
                header("Loction: adminfront.php");
            }
          else
          {
                 echo "unsuccess".mysqli_error($conn);
          }
     }
    ?>
    </body>    
</html>