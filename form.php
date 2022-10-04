<!-- <form action="" method="POST">
    <input type="text" name="name" >
    <input type="text" name="image">
    <input type="submit" name="submit">
</form> -->
 
<div class="container-fluid"> 
<h2>Pokemon</h2>
    <div class="col-lg-12 my-2">
    <form action="#" method="POST" enctype="multipart/form-data" class="col-7">
    <div class="row">
        <div class="col-12">
            <label>Numéro:</label>
            <input type="text" placeholder="Numero" name="numero" class="form-control" required>
        </div>
        <div class="col-12 my-2">
            <label>Nom:</label>
            <input type="text"  placeholder="Nom" name="first_name" class="form-control" required>
        </div> 
        <div class="col-12 my-2">
            <label>Type1:</label>
            <input type="text" placeholder="Type du pokémon" name="type1" class="form-control" min="18" max="150" required>
        </div>
        <div class="col-12 my-2">
            <label>Type2:</label>
            <input type="text" placeholder="Type du pokémon" name="type2" class="form-control" min="18" max="150" required>
        </div>
        <div class="col-12 my-3">
            <label>Image:</label>
            <input type="file" placeholder="Type du pokémon" name="image">
        </div>
        <div class="container">
           <div class="text-right ">
           <button type="button" class="btn btn-secondary btn-lg">Envoyer</button>
           <a href="index.php" class="btn btn-secondary btn-lg"> Retour</a>
           </div>
        </div>
        <div class="container">
           <div class="col-12 my-3">
                <input type="submit" name="submitpokemon"> 

           </div>
        </div>            
    </div>
</form>
    </div>
</div>
 
