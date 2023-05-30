<?php
include("../../includes/header1.php");
$student1=new Student();
?>

<!--Heading of Page -->
<h1 class="d-flex">Edit Student </h1>

</nav>

<!-- Begin Page Content -->
<div class="container-fluid">
    <form method="post">
        <?php 
       $data= $student1->show_edit();
       $student1->edit();
        
        ?>
         <div class="mb-3">
            <label for="id_num" class="form-label mt-4">Student Id Number</label>
            <input type="text" class="form-control" id="id_num" name="id_num"  value="<?=$data['id_num']?>">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label mt-4">Student Name</label>
            <input type="text" class="form-control" id="name" name="name"  value="<?=$data['name']?>" >
        </div>
        <div class="mb-3">
            <label for=""> Choose Gender : </label>
        <input type="radio"  id="male" name="gender"  <?=($data['gender']==="male")?"checked":""?> value="male">
        <label for="male" class="form-label mt-4">Male</label>
        <input type="radio"  id="female" name="gender"  <?=($data['gender']==="female")?"checked":""?> value="female">
        <label for="female" >Female</label>
        </div>
        <div class="mb-3">
            <label for="date_of_bairth" class="form-label mt-4">Student Date</label>
            <input type="date" class="form-control" id="date_of_bairth" name="date_of_bairth" value="<?=$data['date_of_bairth']?>" >
        </div>

        <button type="submit" class="btn btn-primary" name="edit_student">Save</button>
    </form>
 
    <form action="show_student.php" method="post">
    <button type="submit"    class="btn btn-primary" name="cancel">Cancel</button>
  </form>


    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



</div>
<!-- End of Content Wrapper -->

</div>
<?php


include("../../includes/footer.php");


?>