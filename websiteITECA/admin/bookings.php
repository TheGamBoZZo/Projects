<?php 

include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
//include('../functions/myfunctions.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4>Bookings / Appointments </h4> 
                </div>
                <div class="card-body" >
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Appointment Time</th>
                                <th>Service</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php 
                                $bookings = getAll("booking");

                                if(mysqli_num_rows($bookings) > 0 )
                                {
                                    foreach($bookings as $item)
                                    {
                                        ?>
                                <tr>
                                    <td><?=$item ['id']?></td>
                                    <td><?=$item ['user_id']?></td>
                                    <td><?=$item ['name']?></td>
                                    <td><?=$item ['service_start_time']?>-<?=$item ['service_end_time']?></td>
                                    <td><?=$item ['service_type']?></td>
                                </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "No records found";
                                }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include('includes/footer.php'); ?>