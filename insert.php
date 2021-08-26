<?php
$name=$_POST['OWNERS NAME'];
$date=$_POST['DATE'];
$time=$_POST['TIME'];
$type=$_POST['TYPE'];
$age=$_POST['AGE'];
$email=$_POST['EMAIL'];
$phone=$_POST['PHONE'];
if(!empty($name)||!empty($date)||!empty($time)||!empty($type)||!empty($age)||!empty($email)||!empty($phone)){
    $host="local host";
    $dbownername="root";
    $dbphone="";
    $dbname="pet appointment";
    $conn= new mysqli($host,$dbownername,$dbphone,$dbname);
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());

    }
    else{
        $SELECT="SELECT email From Vet Appointment Booking=? Limit 1";
        $INSERT="INSERT Into Vet Appointment Booking (name,date,time,type,age,email,phone)values (?,?,?,?,?,?,?)";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if ($rnum==0){
            $stmt->close();
            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssssii",$name,$date,$time,$type,$age,$email,$phone);
            $stmt->execute();
            echo "Data Updated Successfully...";
        }
        else{
            echo"This Appointment Schedule Are Booked";

        }
        $stmt->close();
        $conn->close();
    }
}
        
        else{
            echo"All Field Are Required";
            die();
       
}
?>