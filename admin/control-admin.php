<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <h1>Admin Control</h1>
            <br>

            <?php 
                if(isset($_SESSION['add'])){

                    echo $_SESSION['add']; //Display the Session Message if Set
                    unset($_SESSION['add']); //Remove Session Message
                }
                if(isset($_SESSION['delete'])){

                    echo $_SESSION['delete']; //Display the Session Message if Set
                    unset($_SESSION['delete']); //Remove Session Message
                }
                if(isset($_SESSION['update'])){

                    echo $_SESSION['update']; //Display the Session Message if Set
                    unset($_SESSION['update']); //Remove Session Message
                }
                if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
            ?>

            <br>
            <!-- Button to Add Admin -->
            <a href="new-admin.php" class="btn-add">Add Admin</a>
            <br>
            <br>
            <br>

            <table class="table-full">
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>Contuct Number</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //get data from db
                    $sql = "SELECT * FROM table_admin";
                    $res = mysqli_query($conn, $sql);

                    if($res == TRUE){

                        $count = mysqli_num_rows($res);

                        if($count>0){

                            while($rows=mysqli_fetch_assoc($res)){

                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $contact_number = $rows['contact_number'];
                                $email = $rows['email'];
                                $username = $rows['username'];

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $contact_number; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/change-password.php?id=<?php echo $id; ?>" class = "btn-add">Change Password</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class = "btn-update">Update</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class = "btn-delete">delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else{
                            //no data
                        }
                    }
                ?>
            </table>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>