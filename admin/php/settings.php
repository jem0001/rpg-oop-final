 <h2>Edit Settings Section</h2>
 <?php
  if (isset($_GET['msg'])) {

    if ($_GET['msg'] == 'updated') {
  ?>
     <div class="alert alert-success text-center" role="alert">
       Settings Successfully Added !
     </div>
   <?php
    }
    if ($_GET['msg'] == 'error') {
    ?>
     <div class="alert alert-danger text-center" role="alert">
       something wrong with your image please check type or size !
     </div>
 <?php
    }
  }
  ?>
 <form method="post" action="php/usettings.php" enctype="multipart/form-data">
   <div class="form-row">
     <div class="form-group col-md-6">
       <label>Settings Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
       <div class="custom-file">
         <input type="file" name="settpic" class="custom-file-input" id="profilepic">
         <label class="custom-file-label" for="settpic">Choose Pic...</label>
       </div>
     </div>

     <div class="form-group col-md-6 mt-auto">
       <label for="name">Setting Name</label>
       <input type="name" name="settname" class="form-control" id="name" placeholder="">
     </div>




     <div class="form-group col-md-2 ml-auto">
       <input type="submit" name="addtosettings" class="btn btn-primary" value="Add To Settings">
     </div>

 </form>
 <table class="table table-striped table-sm">
   <thead>
     <tr>
       <th>Id</th>
       <th>Setting Image</th>
       <th>Setting Name</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
     <?php
      $query2 = "SELECT * FROM settings";
      $queryrun2 = mysqli_query($db, $query2);
      $count = 1;
      while ($data2 = mysqli_fetch_array($queryrun2)) {
      ?>
       <tr>
         <div class="modal fade" id="modal<?= $data2['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h6 class="modal-title" id="exampleModalLabel">Edit Setting</h6>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 <form method="post" action="php/usettings.php" enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?= $data2['id'] ?>">
                   <div class="form-row">
                     <div class="form-group col-md-12">
                       <img src="../assets/img/<?= $data2['settpic'] ?>" class="oo img-thumbnail">
                     </div>
                     <div class="form-group col-md-6">
                       <label>Project Screenshot/Image (Minimum 600px X 600px, Maxsize 2mb)</label>
                       <div class="custom-file">
                         <input type="file" name="settpic" class="custom-file-input" id="profilepic">
                         <label class="custom-file-label" for="projectpic">Choose Pic...</label>
                       </div>
                     </div>

                     <div class="form-group col-md-6 mt-auto">
                       <label for="name">Character Name</label>
                       <input type="name" name="settname" value="<?= $data2['settname'] ?>" class="form-control" id="name" placeholder="Tanggol">
                     </div>





                   </div>


                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <input type="submit" class="btn btn-primary" name="supdate" value="Update">
                 </form>
               </div>
             </div>
           </div>
         </div>
         <td>#<?= $count ?></td>
         <td><img src="../assets/img/<?= $data2['settpic'] ?>" class="oo img-thumbnail"></td>
         <td><?= $data2['settname'] ?></td>
         <td>

           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?= $data2['id'] ?>">
             Edit
           </button> <a href="php/usettings.php?del=<?= $data2['id'] ?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
               Delete
             </button></a>
         </td>
       </tr>
     <?php $count++;
      } ?>
   </tbody>
 </table>