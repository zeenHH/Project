<?php
require("../../../Controller/class/student_class.php");
$student1=new Student();
try{
    $student1->delete();
}catch(Exception $e){
 echo "Can not delete";
}
