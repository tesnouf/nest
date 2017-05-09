<?php


include('connection2.php');
//Create a query
// $query = "SELECT * FROM employeeinfo";
// $query = "Select y1.id, y1.CustomerName, y1.InstructorName, y1.Request, y1.InstructorActivity, y1.TotalStudents, y1.Comments from wbyard y1 WHERE CHAR_LENGTH(CustomerName) > 5 IS NOT NULL ORDER BY CustomerName ASC ;";
$query1 = "Select Distinct Grp from accord;";




$result = mysqli_query($conn2, $query1);

while($row = mysqli_fetch_array($result)) {
  $m_grp = $row['Grp'];

  echo '  
    <li>
    <a class="toggle" href="javascript:void(0);">'.$m_grp.'</a>
    <ul class="inner">
    ';

    $query2 = "
Select 
  y1.id, 
  y1.CustomerName, 
  y1.Grp,
  y1.InstructorName, 
  y1.Request, 
  y1.InstructorActivity, 
  y1.TotalStudents, 
  y1.Comments, 
  y1.Phone 
from accord y1 
WHERE CHAR_LENGTH(CustomerName) > 5 IS NOT NULL AND y1.Grp='".$m_grp."'
ORDER BY CustomerName ASC ;";

    $result2 = mysqli_query($conn2, $query2);
          while($row = mysqli_fetch_array($result2)) {
        $s_grp = $row['Grp'];
        $id = $row['id'];
        $cust = $row['CustomerName'];
        $inst = $row['InstructorName'];
        $act = $row['InstructorActivity'];
        $comm = $row['Comments'];
        $Phone = $row['Phone'];
        $req = $row['Request'];

        echo '
      
      <li>
        <a href="#" class="toggle">'.$cust.'<em>&nbsp;'.$req.'</em></a>
        <div class="inner">
          <p>
            '.$act.'<br>'.$inst.'
            <br><a href="tel://'.$Phone.'">Cell Phone: '.$Phone.'</a>
          </p>
        </div>
      </li>
      
    ' ;



      }

echo '</ul>
    </li>';
}


// $query2 = "
// Select 
//   y1.id, 
//   y1.CustomerName, 
//   y1.Grp,
//   y1.InstructorName, 
//   y1.Request, 
//   y1.InstructorActivity, 
//   y1.TotalStudents, 
//   y1.Comments, 
//   y1.Phone 
// from accord y1 
// WHERE CHAR_LENGTH(CustomerName) > 5 IS NOT NULL 
// ORDER BY CustomerName ASC ;";



// Create a resultSet
// $result2 = mysqli_query($conn2, $query2); // or die(mysqli_error());



// while($row = mysqli_fetch_array($result)) {
//     $id = $row['ItemId'];
//     $item = $row['ItemName'];

      while($row = mysqli_fetch_array($result2)) {
      $grp = $row['Grp'];
      $id = $row['id'];
      $cust = $row['CustomerName'];
      $inst = $row['InstructorName'];
      $act = $row['InstructorActivity'];
      $comm = $row['Comments'];
      $Phone = $row['Phone'];
      $req = $row['Request'];
//   echo  
//   '    <div class="panel panel-default"><a data-toggle="collapse" href="#collapse_'.$id.'">
//       <div class="panel-heading">
//           <h4 class="panel-title">
//             '.$cust.'
//           </h4>
//       </div>
//       <div id="collapse_'.$id.'" class="panel-collapse collapse">
//         <div class="panel-body">'.$inst.'<br>  '.$act.' '.$req.'<br><br>'.$comm.'</div>
//         <div class="panel-footer"><a href="tel://'.$Phone.'">Cell Phone: '.$Phone.'</a></div>
//       </div></a>
//     </div>'
// ;

      // Seems way nicer this one -> need to investigate nesting the mysqli query to get the nesting to group correctly.
      // something like 1 query to get the distinct "A,B,...Z" then another based off that grp and getting the client

echo '
  <li>
    <a class="toggle" href="javascript:void(0);">'.$grp.'</a>
    <ul class="inner">
      <li>
        <a href="#" class="toggle">'.$inst.'</a>
        <div class="inner">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus placerat fringilla. Duis a elit et dolor laoreet volutpat. Aliquam ultrices mauris id mattis imperdiet. Aenean cursus ultrices justo et varius. Suspendisse aliquam orci id dui dapibus
            blandit. In hac habitasse platea dictumst. Sed risus velit, pellentesque eu enim ac, ultricies pretium felis.
          </p>
        </div>
      </li>
      
      <li>
        <a href="#" class="toggle">Open Inner #2</a>
        <div class="inner">
          <p>
            Children will automatically close upon closing its parent.
          </p>
        </div>
      </li>
      
      <li>Option 3</li>
    </ul>
  </li>
  ';

// may need this?? seems to stop the connection by itself
// mysql_close($result);
} 

?>