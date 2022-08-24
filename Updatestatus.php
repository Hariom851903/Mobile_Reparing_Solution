<?php
session_start();
$user=$_SESSION['suserid'];
$status=$_POST['status'];
if(isset($_POST['Accept'])){
    $pid= $_POST['Accept'];
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
     $sql="update mobile set Status='{$status}' where Imei=(select Imei from mpr where P_id='{$pid}')";
     if(mysqli_query($conn,$sql));
    {
        $sql2="select Imei from mpr where P_id='{$pid}'";
        $res1=mysqli_query($conn,$sql2);
        $value=mysqli_fetch_assoc($res1);
         $_SESSION['imei']=$value['Imei']; 
    }
    $sql4="update mobile set dop=CURRENT_TIMESTAMP where Imei=(select Imei from mpr where P_id='{$pid}')";
    if(mysqli_query($conn,$sql4))
    {
        
    }
    $sql3="select pickup from mobile where Imei=(select Imei from mpr where P_id='{$pid}')";
    $res3=mysqli_query($conn,$sql3);
    $value1=mysqli_fetch_assoc($res3);
    $pic=$value1['pickup'];
    if($pic==0)
    {
       header("Location: assignedmoblieR.php"); 
    }
    else{
        header("Location: Dilevary.php"); 
    }
}
if(isset ($_POST['Reject']))
{ 
     $pid=$_POST['Reject'];
       $sta=$_POST['sta'];
    $conn=mysqli_connect('localhost','root','','project') or die("connectionfailed");
    $sql1="update mobile set Status='{$sta}' where Imei=(select Imei from mpr where P_id='{$pid}')";
    if(mysqli_query($conn,$sql1))
    {
        header("Location: adminfront.php");
    }
    else
    {
        echo "unsuccess".mysqli_error($conn);
    }
}
?>
