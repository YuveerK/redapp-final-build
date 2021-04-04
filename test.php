<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="tab-pane fade" id="app-hist" role="tabpanel" aria-labelledby="list-pat-list">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Join Meeting</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "registrationdb");
                global $con;

                $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus,url from appointmenttb where fname ='$fname' and lname='$lname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                    #$fname = $row['fname'];
                    #$lname = $row['lname'];
                    #$email = $row['email'];
                    #$contact = $row['contact'];
                ?>
                    <tr>
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $row['docFees']; ?></td>
                        <td><?php echo $row['appdate']; ?></td>
                        <td><?php echo $row['apptime']; ?></td>
                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                echo "Active";
                            }
                            if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                echo "Cancelled by You";
                            }

                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                echo "Cancelled by Doctor";
                            }
                            ?>
                        </td>
                        <td>
                            <!-- Add logic to check if apppointment has been canceled to disable the link !-->
                            <?php if (($row['userStatus'] == 0) || ($row['doctorStatus'] == 0)) : ?>
                                <button class="btn btn-primary" disabled>Join</button>
                            <?php else : ?>
                                <a href="<?php echo $row['url']; ?>" target="_blank" rel="noopener noreferrer"><button class="btn btn-primary">Join</button></a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                <a href="consultation.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                            <?php } else {
                                echo "Cancelled";
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
</body>

</html>