<!DOCTYPE html>
 
<meta charset=utf-8 />
<title>test</title>
 
<script>
</script>
 
<style>
</style>
 
<div>
<?php
  include_once "CourseDAO.php";
  include_once "DB.php";
  include_once "Course.php";
  
  echo "Hello there, look at the source code to see how it works";
  
  $dbc = new DB('localhost', 'srs', 'interpro', 'utGvWqeYyQb5rMZm');
  $cdao = new CourseDAO($dbc);
  
  $courses = $cdao->listAll();
  
  echo "<br><br>";
  echo print_r($courses);
  echo "<br><br>";
  
?>

<table>
<tr>
  <th>id</th>
  <th>name</th>
  <th>description</th>
</td>

<?php
foreach($courses as $course) {
  echo "<tr>";
  echo "  <td>" . $course->getId() . "</td>";
  echo "  <td>" . $course->getName() . "</td>";
  echo "  <td>" . $course->getDescription() . "</td>";
  echo "</tr>";
}
?>

</table>
</div>

