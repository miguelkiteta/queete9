<div class="container-fluid"> 
<h2>ChampionUPDATE</h2>
<div class="col-lg-12">
    <form action="" method="POST" enctype="multipart/form-data" class="col-5">
       <div class="row">
        <input type="hidden" name="id" value="<?php echo $_GET['idchamp']; ?>">
            <label>Ville</label>
            <input type="text" name="ville" class="form-control" min="18" max="100">
            <label>Champion</label>
            <input type="text" name="champion" class="form-control" min="18" max="100">
            <label>Type</label>
            <input type="text" name="type" class="form-control" min="18" max="100">
            <label>Badge</label>
            <input type="text" name="badge" class="form-control" min="18" max="100"> 
            <div class="col-12 my-3">
            <label>Image:</label>
            <input type="file"  name="image">
       </div>
    <div class="container-fluid">
    <div class="text-right">
    <input type="submit" name="updatechamp" value="Modifier" class="btn btn-secondary btn-lg">
   </form>
</div>
</div>