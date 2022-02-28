<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <h1>Reataurant Info</h1>
            <br>
            <br>

            <?php 
        
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>
            <br>

            <!-- Button to Add category -->
            <a href="<?php echo SITEURL;?>admin/restaurant_info_add.php" class="btn-add">Add Info</a>
            <br>
            <br>

            <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Location</th>
                    <th>Open Hours</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                <?php 

                    //Query to Get all Categories from Database
                    $sql = "SELECT * FROM restaurant_info";

                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //Check whether we have data in database or not
                    if($count>0)
                    {
                        //We have data in database
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $location = $row['location'];
                            $open_hours = $row['open_hours'];
                            $email = $row['email'];
                            $contact = $row['contact'];

                            ?>

                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $location; ?></td>
                                <td><?php echo $open_hours; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $contact; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/restaurant_info_update.php?id=<?php echo $id; ?>" class="btn-update">Update Info</a>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        ?>

                        <tr>
                            <td colspan="6"><div class="error">No Category Added.</div></td>
                        </tr>

                        <?php
                    }
                    
                ?>
            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>