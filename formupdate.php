<div class="container-fluid"> 
<h2>PokemonUPDATE</h2>
<div class="col-lg-12">
    <form action="" method="POST" enctype="multipart/form-data" class="col-5">
       <div class="row">
        <input type="hidden" name="id" value="<?php echo $_GET['idpok']; ?>">
            <label>Numero</label>
            <input type="text" name="numero" class="form-control" min="18" max="100">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" min="18" max="100">
            <label>Type1</label>
            <input type="text" name="type1" class="form-control" min="18" max="100">
            <label>Type2</label>
            <input type="text" name="type2" class="form-control" min="18" max="100"> 
            <div class="col-12 my-3">
            <label>Image:</label>
            <input type="file"  name="image">
       </div>
    <div class="container-fluid">
    <div class="text-right">
    <input type="submit" name="updatePok" value="Modifier" class="btn btn-secondary btn-lg">
   </form>
</div>
</div>
 