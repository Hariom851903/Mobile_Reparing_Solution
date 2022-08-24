<html>
    <body>
       <div class="password"><h1>Change password</h1>
        <form  action="" method="post">
            <div class="inputuser">
                <input type="text" name="name" required=""><label>Old Password</label>
            </div>
             <div class="inputuser">
                <input type="password" name="Cpassword" required=""><label>Confirm Password</label>
            </div>
            <button name="submit-2"  Class="btnlogin">
                Submit
            </button>
            </form>
        </div>               
    
<?php
function forget()
{ 
$confirm=$_POST['Cpassword'];

     $conn=mysqli_connect("localhost","root","","project") or die("connection faild");

              $user=$_POST['name'];
        $sql="Update customer set Password='{$confirm}' where Password='{$user}'";
     if(mysqli_query($conn,$sql)>0)
     {  ?>
             <script>
           alert("Password is change");  
          </script> 
     <?php }
     else{ ?>
      <script>
           alert("OLd Password is not correct");      
    </script>  
         <?php 
     }} ?>
<?php 
if(isset($_POST['submit-2']))
{
    forget();
}
?>
</body>
</html>