<?php
$server = "localhost";
$username="root";
$password="";
$dbname="test";


$conn=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

	if(!empty($_POST['name']) && !empty($_POST['email'])&& !empty($_POST['message'])){

	   $name =$_POST['name'];
	   $email =$_POST['email'];
	   $message =$_POST['message'];

	   $query = "INSERT INTO message(name,email,message) values ('$name','$email','$message')";

	   $run = mysqli_query($conn,$query) or die(mysqli_error());

	   if($run){
        echo"THANK YOU SO MUCH FOR FILLING THIC FORM";
       }
	   else{
	    echo"Not submitted";
	   }
	}
	else{
	  echo "all fields required";
	}
}

?>