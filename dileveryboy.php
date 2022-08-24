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
.delevery{
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    padding: 30px;
    background-color: rgba(0,0,128,.8); 
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0,0,0,.5);
    border-radius: 10px;
}
.delevery h1{
    font-size: 30px;
    margin: 0 0 30px;
    padding: 0;
    color: deeppink;
    text-align: center;
}
.delevery .inputuser{
    position: relative;
}
 .delevery .inputuser input{
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
.delevery .inputuser label{
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size:16px; 
    color: #fff;
    pointer-events: none;
    transition: .5s;
    
}
.delevery .inputuser input:focus~label,
.delevery .inputuser input:valid~label{
    top: -18px;
    left: 0;
    color: aqua;
    font-size:12px; 
}
.delevery input[type="submit"]
{
    font-size: 15px;
    border: none;
    outline:none;
    color: white;
    background: lime;
    padding: 10px 20px;
    cursor: pointer;
}
                   li{
                       list-style: none;
                   }
                   a{
                       color: aqua;
                       margin-left: -40px;
                       font-size: 30px;
                       text-decoration: none;
                   }
        </style>
    </head>
    <body>
        <div class="delevery">
            <ul><li><a href="adminfront.php">Home</a></li></ul>
            <h1>DELEVERY BOY Information</h1>
        <form  action="" method="post">
            <div class="inputuser">
                <input type="text" name="name" required=""><label>Name</label>
            </div>
            <div class="inputuser">
                <input type="text" name="cphone" required=""><label>Phone Number</label>
            </div>
            <div class="inputuser">
                <input type="email" name="demail" required=""><label>Email</label>
            </div>
            <button name="submit-2"  Class="btnlogin">Sumbit</button>             
            </form>    
        </div>
    <?php
            session_start();
         if(isset($_POST['submit-2']))
         {
                $job=0;
              $user= $_SESSION['suserid'];
             $d_name=$_POST['name'];
             $d_no=$_POST['cphone'];
             $d_email=$_POST['demail'];
             $conn=mysqli_connect("localhost","root","","project") or die("connection faild");
              $sql="insert into d_boys(Name,Contact_no,email,jobs,User_id) values('{$d_name}','{$d_no}','{$d_email}',$job,'{$user}')";
           if(mysqli_query($conn,$sql)>0)
            { 
               echo "Successfully";
              header("Location: dileveryboy.php");
           }
          else
          {
                 echo "unsuccess".mysqli_error($conn);
          }
     }
    ?>
    </body>    
</html>