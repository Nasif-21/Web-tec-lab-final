<?php
session_start();
$username=$password=$mobileno="";
$isPost=false;
if(isset($_POST["btnClick"]))
{
    $isPost=true;
	if($_POST["uname"]!="")
	$username=$_POST["uname"];
	    
}
if(isset($_POST["btnClick"]))
{
    $isPost=true;
	if($_POST["pass"]!="")
	$password=$_POST["pass"];
	    
}
if(isset($_POST["btnClick"]))
{
    $isPost=true;
	if($_POST["mblno"]!="")
	$mobileno=$_POST["mblno"];
	    
}
?>
<form action="DataShow.php" method="post">
<center>Username: <input type="text" name="uname" id="uname" placeholder="Type your name" value="<?php echo $_SESSION["uname"]; ?>"></center><br><br><br>
<?php
if($isPost==true && $username=="")
 echo "<span style='color:red;'>Required</span>";
?>
<center>Password: <input type="password" name="pass" id="pass" placeholder="Your PIN" value="<?php echo $_SESSION["pass"]; ?>"></center><br><br><br>
<?php
if($isPost==true && $password=="")
 echo "<span style='color:red;'>Required</span>";
?>
<center> Mobile No:<input type="text" name="mblno" id="mblno" placeholder="Ex:017....." value="<?php echo $_SESSION["mblno"]; ?>"></center><br><br><br>
<?php
if($isPost==true && $mobileno=="")
 echo "<span style='color:red;'>Required</span>";
?>
<center><input type="submit" name="btnClick" value="Submit"><br><br>
<input type="submit"name="btnClick2" value="Delete"><br><br>
<input type="submit" name="btnClick3" value="Update"><br><br></center>
</form>
<?php
if($_POST["uname"]!="" && $_POST["pass"]!=""&& $_POST["mblno"]!=""){
//$servername="localhost:3306";
//$username="root";
//$password="";
$dbname="mydb";
$conn=mysqli_connect('localhost:3306','root','',$dbname);
//$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}
else
{
    //echo "Successful connection";
    $q="UPDATE information SET user_name='".$_POST["uname"]."',Password='".$_POST["pass"]."',Mobile no='".$_POST["mblno"]."' WHERE user_name='".$_SESSION["uname"]."'";
    $result=$conn->query($q);
	if($result)
	  echo "data updated";
    else
		echo "data not updated";	



}
$_SESSION["uname"] = $_POST["uname"];
$_SESSION["pass"] = $_POST["pass"];
$_SESSION["mblno"]=$_POST["mblno"];
}
?>
