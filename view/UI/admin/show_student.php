<?php
include("../../includes/header1.php");
$student1 = new Student();
$result = $student1->select();



?>
<!--Heading of Page -->
<h1>Show Student </h1>
</nav>


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
  <form action="create_student.php" method="post">
    <button type="submit" class="btn btn-primary" name="Add">Add Student</button>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student Id Number</th>
        <th scope="col">Student Name</th>
        <th scope="col">Student Gender</th>
        <th scope="col">Student Date </th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <th scope="row">
              <?= $row['id'] ?>
            </th>
            <td>
              <?= $row['id_num'] ?>
            </td>
            <td>
              <?= $row['name'] ?>
            </td>
            
			 <td>
              <?= $row['gender'] ?>
            </td>
			 <td>
              <?= $row['date_of_bairth'] ?>
            </td>
            <td>
              <a class="text-decoration-none" href="edit_student.php?id=<?= $row['id'] ?>"> <button type="button"
                  class="btn btn-primary" name="edit_student">Edit</button> </a>
              <a class="text-decoration-none delete" href="delete_student.php?id=<?= $row['id'] ?>"> <button
                  type="button" class="btn btn-danger " name="delete">Delete</button> </a>
            </td>
          </tr>
          <?php

        }
      }
      ?>




    </tbody>
  </table>
  <?php
  if (isset($_GET['message'])) {
    ?>
    <div class="flash-data" data-flashdata="<?= $_GET['message'] ?>"></div>
    <?php
  }


  ?>

  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php
include("../../includes/footer.php");



?>
<script>
  $('.delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  }
  )
  const flashdata = $('.flash-data').data('flashdata')
  if (flashdata) {
    Swal.fire(
      'Deleted!',
      'Record Deleted',
      'success'
    )
  }

</script>