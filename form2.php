<!-- <form action="index.php" method="POST">
    <input type="text" name="name" >
    <input type="text" name="image">
    <input type="submit" name="update">
    <input type="submit" name="delete" value="Supprimer" class="btn btn-danger ml-3">
    <h2>Champion</h2>
</form> -->
<div class=text-center>
<h2>Champion</h2>
</div>
<form action="#" method="POST" enctype="multipart/form-data" class="col-7">
    <div class="row">
        <div class="col-12 my-2">
            <label>Ville</label>
            <input type="text" placeholder="" name="ville" class="form-control" required>
        </div>
        <div class="col-12 my-2">
            <label>Champion</label>
            <input type="text"  placeholder="" name="champion" class="form-control" required>
        </div> 
        <div class="col-12 my-2">
            <label>Type:</label>
            <input type="text" placeholder="Type" name="type" class="form-control" min="18" max="150" required>
        </div>
        <div class="col-12 my-2">
            <label>Badge</label>
            <input type="text" placeholder="" name="badge" class="form-control" min="18" max="150" required>
        </div>
        <div class="col-12 my-2">
            <label>Image du Champion</label> </br>
            <input type="file" placeholder="Image du Champion" name="image">
        </div>
        <div class="container">
           <div class="col-12 my-3">
                <input type="submit" name="submitchampion"> 
           </div>
        </div>  
        <div class="container">
           <div class="col-12 my-3">
            <div class="text-right">
              <a href="index.php" class="btn btn-secondary btn-lg"> Retour</a>
            </div>
           </div>
        </div>     
    </div>
</form>
 

 
