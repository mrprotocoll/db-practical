
<?php
    include("conn.php");
    ini_set("display_errors",1);

    $sql = "SELECT * FROM `level`";
    $query = mysqli_query($connect, $sql);  
    $num_row = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-success"> 
   <div class="container">
      
      <div class="row mt-5 ">
         <div class="col-md-6 card card-body mx-auto">
            
            <h3 class="pb-4 text-center">Add New Student</h3>
            <form action="controller.php?action=new" method="post" class="pb-4">
               
               <div class="form-group">
                  Matric Number
                 <input type="text" class="form-control" placeholder="Matric Number" name="matric">
               </div>

               <div class="form-group">
                   First Name
                 <input type="text"
                  class="form-control" name="firstname"  placeholder="First Name">
               </div>
               <div class="form-group">
                   Last Name
                 <input type="text"
                  class="form-control" name="lastname"  placeholder="Last Name">
               </div>
               <div class="form-group">
                  Student Level
                 <select class="form-control" name="level">
                    <?php 
                     if ($num_row > 0){
                        while($row = mysqli_fetch_assoc($query)){?>
                     <option>
                     <?php echo $row['level']; ?>
                     </option>
                     <?php }
                     }
                     else
                     echo "no record found"
                     ?> 
                  
                 </select>
               </div>
   
               <div class="form-group">
                  Program
                 <select class="form-control" name="program">
                   <option>ND</option>
                   <option>HND</option>
                 </select>
               </div>
               

               <div class="form-group">
               Entry Year
                 <input type="year" class="form-control" name="entry"  placeholder="Entry Year">
               </div>
 

               <div class="form-group">
                 <input type="submit" class="btn btn-primary" name="submit"  value="Add New Student">
               </div>
               
            </form>
         </div>   

      </div>
   </div>
</body>
</html>