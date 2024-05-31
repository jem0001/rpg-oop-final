<h2>Edit Home Section</h2>
<?php
if (isset($_GET['msg'])) {

  if ($_GET['msg'] == 'updated') {
?>
    <div class="alert alert-success text-center" role="alert">
      Successfully Updated !
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
<form method="post" action="php/uhome.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <img src="../assets/img/<?= $data['profilepic'] ?>" class="oo img-thumbnail"><br>
      <label>Profile Pic (Minimum 600px X 600px, Maxsize 2mb)</label>
      <div class="custom-file">
        <input type="file" name="profile" class="custom-file-input" id="profilepic">
        <label class="custom-file-label" for="profilepic">Choose Profile Pic...</label>
      </div>
    </div>
    <div class="form-group col-md-6">
      <img src="../assets/img/<?= $data['homewallpaper'] ?>" class="oo img-thumbnail">
      <label>Home Cover (Minimum 1920 X 1280, Maxsize 2mb)</label>
      <div class="custom-file">
        <input type="file" name="cover" class="custom-file-input" id="profilepic">
        <label class="custom-file-label" for="profilepic">Choose Home Cover...</label>
      </div>
    </div>

    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="name" name="name" value="<?= $data['name'] ?>" class="form-control" id="name" placeholder="Mohan Goswami">
    </div>


    <div class="form-group col-md-6">
      <label for="netlify">netlify</label>
      <input type="text" class="form-control" value="<?= $data['netlify'] ?>" name="netlify" id="netlify" placeholder="https://linkedin.com/MohanGo94273231">
    </div>
    <div class="form-group col-md-6">
      <label for="github">Github</label>
      <input type="text" class="form-control" value="<?= $data['github'] ?>" name="github" id="github" placeholder="https://github.com/MohanGo94273231">
    </div>
  </div>


  <input type="submit" name="save" class="btn btn-primary" value="Save Changes">
</form>