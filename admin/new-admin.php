<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Admin Control</h1>
        <br>
        <br>

        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Full name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input type="text" name="contact_number" placeholder="Enter Your Number">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Your Email">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="user_name" placeholder="Enter Your username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-update">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>



<?php include('hd-ft/footer.php'); ?>

<?php
    if(isset($_POST['submit'])){
            //data from form
        $full_name = $_POST['full_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    }

        //sql quary
    $sql = "INSERT INTO table_admin SET
        full_name='$full_name',
        contact_number='$contact_number',
        email='$email',
        user_name='$user_name',
        password='$password'
    ";

    //saving data into datbase
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Check whether data is inserted or not
    if($res==TRUE){
        $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
        //redirect to admin control
        header("location:".SITEURL.'admin/manage-admin.php');
        }
?>