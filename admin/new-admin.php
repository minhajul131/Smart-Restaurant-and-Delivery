<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Admin Detail</h1>
        <br>
        <br>
        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>
        
        
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
    /*$sql = "INSERT INTO table_admin SET
        full_name='$full_name',
        contact_number='$contact_number',
        email='$email',
        user_name='$user_name',
        password='$password'
    ";*/

    $sql = "INSERT INTO table_admin ( `full_name`, `contact_number`, `email`, `username`, `password`) VALUES ('$full_name','$contact_number','$email','$user_name','$password')";

    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    /*//Check whether data is inserted or not
    if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/admin-control.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/new-admin.php');
        }*/

?>