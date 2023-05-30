<?php
require_once("connection.php");
class student extends DBconnection
{
    function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['create_student'])) {
                $student_name = $_POST['name'];
                $student_id = $_POST['id_num'];
                $student_gender = $_POST['gender'];
                $student_date=$_POST['date_of_bairth'];
                if (empty($_POST['name']) || empty($_POST['id_num']) || empty($_POST['gender']) || empty($_POST['date_of_bairth']) ) {
                    if (empty($_POST['name'])) {
                        ?>
                        <div class="card mb-4 py-3 border-left-danger shadow  ">
                            <label style="margin-left: 1.5rem;"> student Name is Required </label>
                        </div>
                        <?php
                    }
                    if (empty($_POST['id_num'])) {
                        ?>
                        <div class="card mb-4 py-3 border-left-danger shadow  ">
                            <label style="margin-left: 1.5rem;"> student ID is Required </label>
                        </div>
                        <?php
                    }
                        if (empty($_POST['gender'])) {
                            ?>
                            <div class="card mb-4 py-3 border-left-danger shadow  ">
                                <label style="margin-left: 1.5rem;"> student Gender is Required </label>
                            </div>
                        
                            <?php 
                        }
                            if (empty($_POST['date_of_bairth'])) {
                                ?>
                                <div class="card mb-4 py-3 border-left-danger shadow  ">
                                    <label style="margin-left: 1.5rem;">student Date is Required </label>
                                </div>
                                <?php 
                    }
                } else {
                    $sql = "INSERT INTO `student`(`id_num`, `name`, `date_of_bairth`, `gender`) VALUES ('$student_id','$student_name','$student_date','$student_gender')";
                    if ($this->conn->query($sql) == TRUE) {
                        echo '<script>Swal.fire("Done", "New student added successfully!", "success")</script>';
                    } else {
                        echo "error" . $sql . $this->conn->error;
                    }

                }

            }
        }

    }

    function show_edit()
    {
        $id = $_GET['id'];
        $data = array();
        $sql = "SELECT * FROM `student` WHERE id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data['name'] = $row['name'];
            $data['id_num'] = $row['id_num'];
            $data['gender'] = $row['gender'];
            $data['date_of_bairth'] = $row['date_of_bairth'];
        }
        return $data;
    }
    function edit()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['edit_student'])) {
                $student_name = $_POST['name'];
                $student_id = $_POST['id_num'];
                $student_gender = $_POST['gender'];
                $student_date=$_POST['date_of_bairth'];
                if (empty($_POST['name']) || empty($_POST['id_num']) || empty($_POST['gender']) || empty($_POST['date_of_bairth']) ) {
                    if (empty($_POST['name'])) {
                        ?>
                        <div class="card mb-4 py-3 border-left-danger shadow  ">
                            <label style="margin-left: 1.5rem;"> student Name is Required </label>
                        </div>
                        <?php
                    }
                    if (empty($_POST['id_num'])) {
                        ?>
                        <div class="card mb-4 py-3 border-left-danger shadow  ">
                            <label style="margin-left: 1.5rem;"> student ID is Required </label>
                        </div>
                        <?php
                    }
                        if (empty($_POST['gender'])) {
                            ?>
                            <div class="card mb-4 py-3 border-left-danger shadow  ">
                                <label style="margin-left: 1.5rem;"> student Gender is Required </label>
                            </div>
                        
                            <?php 
                        }
                            if (empty($_POST['date_of_bairth'])) {
                                ?>
                                <div class="card mb-4 py-3 border-left-danger shadow  ">
                                    <label style="margin-left: 1.5rem;">student Date is Required </label>
                                </div>
                                <?php 
                    }
                } else {
                    $sql = "UPDATE `student` SET `id_num`='$student_id',`name`='$student_name',`date_of_bairth`=' $student_date',`gender`=' $student_gender' ";
                    if ($this->conn->query($sql) == TRUE) {
                        echo '<script>Swal.fire("Done", "New student added successfully!", "success")</script>';
                    } else {
                        echo "error" . $sql . $this->conn->error;
                    }

                }

            }
        }
    }
    function delete()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM `student` WHERE id=$id";
        if ($this->conn->query($sql) == TRUE) {
            header("location:show_student.php?message=1");
            exit();
        } else {
            throw new Exception("Can not delete");
        }

    }
    function select()
    {
        $result = null;
        $sql = "SELECT * FROM `student` ";
        $result = $this->conn->query($sql);
        return $result;

    }
    
   

}


?>