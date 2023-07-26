<?php 

session_start();

include('../config/dbcon.php');
include('../functions/myFunctions.php');


if(isset($_SESSION['auth']))
{
    if(isset($_POST['submitBookingTime']))
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $number = $_POST['number'];
        $service_start_time = $_POST['service_start_time'];
        $service_end_time = $_POST['service_end_time'];
        $service_type = $_POST['service_name'];

 
        $insertB_query = "INSERT INTO booking (user_id,name, number ,service_start_time,service_end_time, service_type)
                            VALUES ('$user_id','$name','$number', '$service_start_time','$service_end_time', '$service_type')";
        $insertB_query_run = mysqli_query($con, $insertB_query);

        if($insertB_query_run)
        {
            redirect("../appointments.php","Booking Added Successfull Boss");
        }
        else
        {
            redirect("../appointments.php","Something went wrong");
        }


    }
}
else
{
    header('Location: ../index.php');
}


?>