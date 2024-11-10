<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "select * from `students` where `id`='$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die("Query Failed" . mysqli_error($connection));
        } else {
            $row=mysqli_fetch_row($result);
        }
    }
?>

<?php
if (isset($_POST['update_students'])) {
    if (isset($_GET['id_new'])) {
        $idnew=$_GET['id_new'];
    }
    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $age=$_POST['age'];

    $query = "update `students` set `first_name`='$fname', `last_name`='$lname', `age`='$age' where `id`='$idnew'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    }else{
        header("Location: index.php?update_msg=Your data has been updated successfully");
    }
}
?>

<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="POST"> 
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo (isset($row) ? $row[1] : ''); ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo (isset($row) ? $row[2] : ''); ?>" >
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo (isset($row) ? $row[3] : ''); ?>">
    </div>
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">

</form>

<?php include('footer.php'); ?>