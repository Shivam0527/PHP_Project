<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<div class="box1">
  <h2>ALL STUDENTS</h2>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    ADD STUDENTS
  </button>

  <!-- Modal -->
</div>
<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Update</th>
      <th>Delete</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $query = "select * from `students`";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Query Failed" . mysqli_error($connection));
    } else {
      while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['age']; ?></td>
          <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
          <td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>

<?php
if (isset($_GET['error'])) {
  echo "<div class='alert alert-danger' role='alert'>" . $_GET['error'] . "</div>";
}
?>
<?php
if (isset($_GET['insert_msg'])) {
  echo "<div class='alert alert-success' role='alert'>" . $_GET['insert_msg'] . "</div>";
}
?>
<?php
if (isset($_GET['update_msg'])) {
  echo "<div class='alert alert-success' role='alert'>" . $_GET['update_msg'] . "</div>";
}
?>
<?php
if (isset($_GET['delete_msg'])) {
  echo "<div class='alert alert-success' role='alert'>" . $_GET['delete_msg'] . "</div>";
}
?>
<form action="insert_data.php" method="POST"> 
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENTS</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" name="add_students" value="ADD">
        </div>
      </div>
    </div>
  </div>
</form>

<?php include('footer.php'); ?>