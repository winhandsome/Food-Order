<?php 

    //Include constants.php file here
    include('./config/constants.php');
    include('./partials/function.php');
    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    // $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // //Execute the Query
    // $res = mysqli_query($conn, $sql);

    $sql = $db->query("DELETE FROM tbl_admin WHERE id=$id");

    // Check whether the query executed successfully or not
    if($sql==true)
    {
        //Query Executed Successfully and Admin Deleted
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to Manage Admin Page
        redirect_to('manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        redirect_to('manage-admin.php');
    }

    //3. Redirect to Manage Admin page with message (success/error)

?>