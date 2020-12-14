
<?php
   include("conn.php");
   ini_set("display_errors",1);
   
   $sql = "SELECT * FROM student";
   $query = mysqli_query($connect, $sql);
   $num_row = mysqli_num_rows($query);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Student Record</title>
   <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class=""> 
   <div class="container mt-5">
      <h1 class="text-center">Studet Record</h1>
      <div class="row pt-5">
         <div class="mx-auto">
            <a href="new.php" class="btn mb-3 btn-success btn-lg justify-content-right ">Add new Student</a>
            <table class="table table-responsive table-bordered">
               <thead>
                  <tr>
                     <th>S/N</th>
                     <th>MatricNo</th>
                     <th>Full Name</th>
                     <th>Level</th>
                     <th>ENtry Year</th>
                     <th>Date Created</th>
                     <th colspan="2" class="text-center">ACTION</th>
                  </tr>
               </thead>
               <tbody>
               <?php
               if ($num_row > 0){
                  $num = 0;
                  while($r = mysqli_fetch_assoc($query)){
                     $num++;
                  ?>
                  <tr class="border">
                     <td scope="row"><?php echo $num ?></td>
                     <td> <?php echo $r["matric_no"] ?></td>
                     <td> <?php echo $r["firstname"]." ".$r["lastname"] ?></td>
                     <td> <?php echo $r["level"] ?></td>
                     <td> <?php echo $r["entry_year"] ?></td>
                     <td> <?php echo $r["date_created"] ?></td>
                     <td><a target="_blank" href="update.php?id=<?php echo $r["id"] ?>" class="btn btn-primary">Update</a></td>
                     <td><a href="controller.php?action=del&id=<?php echo $r["id"]?>" onclick=" return confirm('are you sure you want to delete this record?')" class="btn btn-danger">Delete</a></td>
                  </tr>
                  <?php
                  }
               } else{
                  ?>
                  <tr>
                     <td colspan="6"><?php echo "No Record Found"; ?></td>
                  </tr>
                  <?php
                  
               }
                  ?>
               </tbody>
            </table>
            
          
         </div>
      </div>
   </div>
</body>
</html>