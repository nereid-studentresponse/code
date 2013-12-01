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
  
  //$courses = $cdao->listAll();
  $courses = $cdao->listAll();
  $course = $cdao->get(1);
  
  echo "<br><br>";
  echo print_r($course);
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
  echo "  <td>" . $course->getTitle() . "</td>";
  echo "  <td>" . $course->getDescription() . "</td>";
  echo "</tr>";
}
?>

</table>
</div>

<p> 
  <h3>To go to the registration page: <a href="index_router.php?page=register">it's over here.</a> (Students only for now)</h3>
</p>

