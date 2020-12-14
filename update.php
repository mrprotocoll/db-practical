
<?php
    include("conn.php");
    ini_set("display_errors",1);
    $id = $_GET['id'];
    $sql = "SELECT * FROM `level`";
    $query = mysqli_query($connect, $sql);  
    $num_row = mysqli_num_rows($query);
    $sql2 = "SELECT * FROM `student` WHERE id = '$id'";
    $query2 = mysqli_query($connect, $sql2); 
    $r = mysqli_fetch_assoc($query2)
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
      
      <div class="row mt-5">
         <div class="col-md-6 card card-body mx-auto">
            
            <h3 class="pb-4 text-center">Update Student Record</h3>
            <form action="controller.php?action=update" method="post" class="pb-4">
               
               <div class="form-group">
                  Matric Number
                 <input type="text" class="form-control" readonly value="<?php echo $r['matric_no'] ?>" placeholder="Matric Number" name="matric">
               </div>

               <div class="form-group">
                   First Name
                 <input type="text"
                  class="form-control" name="firstname" value="<?php echo $r['firstname'] ?>"  placeholder="First Name">
               </div>
               <div class="form-group">
                   Last Name
                 <input type="text"
                  class="form-control" name="lastname" value="<?php echo $r['lastname'] ?>"  placeholder="Last Name">
               </div>
               <div class="form-group">
                  Student Level
                 <select class="form-control" name="level">
                    <?php 
                     if ($num_row > 0){
                        while($row = mysqli_fetch_assoc($query)){?>
                     <option <?php echo $row['level'] == $r['level'] ? "selected" : ""; ?>>
                     <?php echo $row['level']?>
                     </option>
                     <?php }
                     }
                     ?> 
                  
                 </select>
               </div>
   
               <div class="form-group">
                Program
                <select class="form-control" name="program">
                    <option <?php echo $r['program'] == "ND" ? "selected" : "" ?>>ND</option>
                    <option <?php echo $r['program'] == "HND" ? "selected" : "" ?>>HND</option>
                </select>
               </div>
               

               <div class="form-group">
               Entry Year
                 <input type="year" class="form-control" name="entry" value="<?php echo $r['entry_year'] ?>"   placeholder="Entry Year">
               </div>

               <div class="form-group">
                 <input type="submit" class="btn btn-primary" name="submit"  value="Update Record">
               </div>
               
            </form>
         </div>   

      </div>
   </div>
</body>
</html>