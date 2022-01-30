<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <h1>User Control</h1>
            <br>

            <?php
                if(isset($_SESSION['delete'])){

                    echo $_SESSION['delete']; //Display the Session Message if Set
                    unset($_SESSION['delete']); //Remove Session Message
                }
            ?>

            <br>

            <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>Contuct Number</th>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //Query to Get all user from Database
                    $sql = "SELECT * FROM user_signup";

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
                            $id = $row['user_id'];
                            $full_name = $row['full_name'];
                            $image_name = $row['image_name'];
                            $email = $row['email'];
                            $contact_number = $row['contact_number'];
                            $username = $row['username'];

                            ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $contact_number; ?></td>

                                    <td>

                                        <?php  
                                            //Chcek whether image name is available or not
                                            if($image_name!="")
                                            {
                                                //Display the Image
                                                ?>
                                                
                                                <img src="<?php echo SITEURL; ?>images/user/<?php echo $image_name; ?>" width="100px" >
                                                
                                                <?php
                                            }
                                            else
                                            {
                                                //DIsplay the MEssage
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                        ?>

                                    </td>

                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/delete-user.php?user_id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete User</a>
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
                            <td colspan="6"><div class="error">No User.</div></td>
                        </tr>

                        <?php
                    }

                ?>

            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>