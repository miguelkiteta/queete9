<!-- <?php
//on démarre une session
session_start();
// on inclut la connexion à la base
require_once('con.php');
// read
if(isset($_GET['pokemon'])){
        echo'c\'est le Read';
        $sql = 'SELECT * FROM `pokemon`';
        $prepare = $db->prepare($sql);
        $prepare->execute();
        $liste = $prepare->fetchAll();

        foreach ($liste as $value){
            echo $value['numero'] . '</br>';
            // on mettre une card ici
            echo $value['id']. '</br>';
            ?>
            <a href="index.php?id=<?php echo $value['id'];?>">Hello</a> 
            <?php
        }
    }

$sql = 'SELECT *FROM `pokemon`';
// on prépare la requete
$query = $db->prepare($sql);
// on exécute la requête
$query->execute();
// on stock le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result); // pour afficher les tableau
require_once('close.php'); // fermer la connexion
?> -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <div>
    <a href="index.php" class="btn btn-dark">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
  </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav p-3 mx-3">
        <li class="nav-item mx-2">
        <a href="index.php?champion" class="btn btn-outline-secondary ml-3">Champion</a>
        </li>
        <li class="nav-item mx-2">
        <a href="index.php?pokemon" class="btn btn-outline-secondary ml-3">Pokémon</a>
        </li>
        <li class="nav-item mx-2">
        <a href="index.php?ajouterChampion" class="btn btn-warning ml-3">Ajouter un Champion</a>
        </li>
        <li class="nav-item mx-2">
        <a href="index.php?ajouteurpokemon" class="btn btn-warning ml-3">Ajouter un Pokémon</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="text-center">
    <div class="jumbotron jumbotron-fluid bg-dark">
    <img src="public/images/fondJumbo.png"  width="1500" height="600" >
    </div>
   </div>  
</header> 

<?php
if(isset($_GET['ajouterChampion'])){
  include 'form2.php';
}
if(isset($_GET['ajouteurpokemon'])){
  include 'form.php';
}
include 'con.php';

if(isset($_POST['submitpokemon'])){
  $sql = "INSERT INTO `pokemon` (`numero`, `first_name`, `type1`, `typ2`,`image`) VALUES (:numero, :firstname, :type1, :type2,:image1)";
  $prepare = $db->prepare($sql);
  $prepare->execute([
      'numero' => $_POST['numero'],
      'firstname' => $_POST['first_name'],
      'type1' => $_POST['type1'],
      'type2' => $_POST['type2'],
      'image1' => 'public/images/' . $_FILES['image']['name']
  ]);
  $fileName = 'public/images/'. basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
} 

if(isset($_GET['pokemon'])){
  $sql='SELECT * FROM pokemon';
      $sql = "SELECT * FROM `pokemon` ";
     // On prépare la requête
      $prepare= $db->prepare($sql);
      $prepare->execute();
      // On stocke le résultat dans un tableau associatif
      $pokemon = $prepare->fetchAll();?>

      <section class="container-fluid">
          <div class="row text-center">
            <?php
            foreach($pokemon as $list){?>
              <div class="col-4">
              <div class="card-body" style="width: 23rem;">
                <img src="<?php echo $list['image'] ;?>" alt="" height="200">
                <h5 class="card-title"><?php echo 'numero : ' . $list['numero']; ?></h5>
                <p class="card-text"><?php echo 'first_name : ' . $list['first_name']; ?></p>
                <p class="card-text"><?php echo 'Yype1 : ' . $list['type1']; ?><p>
                <p class="card-text"><?php echo 'typ2 : ' .  $list['typ2']; ?></p>
                <a href="index.php?formupdate&idpok=<?php echo $list['id'] ?>"><button type="button" class="btn btn-outline-secondary" name="modifier">Modifier?</button></a>
                <a href="index.php?delete&id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-outline-danger" name="deletepok">Supprimer</button></a>
              </div>
              </div>
              <?php } ?>
          </div>
      </section>
      <?php
}
 
// update
if(isset($_GET['formupdate'])){
  include 'formupdate.php';

if(isset($_POST['updatePok'])){
  $sql ="UPDATE `pokemon` SET  `numero` = :numero1,`first_name` = :first_name1, `type1` = :type1 , `typ2` = :type2, `image` = :image1  WHERE `id`= :id";
  $prepare = $db->prepare($sql);
  $test = $prepare ->execute([
    'numero1' => $_POST['numero'],
    'first_name1' => $_POST['first_name'],
    'type1' => $_POST['type1'],
    'type2' => $_POST['type2'],
    'image1' => 'public/images/' . $_FILES['image']['name'],
    'id' => $_POST['id']
  ]);
  
  $fileName = 'public/images/'. basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
  var_dump($test);
}
}
//detele
if(isset($_GET['delete'])){
  $sql = "DELETE FROM `pokemon` WHERE `id`=:id";
  // $sql = "DELETE * FROM `pirate`";
  $prepare = $db ->prepare($sql);
  $prepare -> execute([
      'id'=> $_GET['id']
  ]);
}
//read Champion

if(isset($_POST['submitchampion'])){
  $sql = "INSERT INTO `champion` (`ville`, `champion`, `type`, `badge`,`image`) VALUES (:ville, :champion, :type, :badge, :image1)";
  $prepare = $db->prepare($sql);
  $prepare->execute([
      'ville' => $_POST['ville'],
      'champion' => $_POST['champion'],
      'type' => $_POST['type'],
      'badge' => $_POST['badge'],
      'image1' => 'public/images/' . $_FILES['image']['name']
  ]);
  $fileName = 'public/images/'. basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
} 
if(isset($_GET['champion'])){
  $sql='SELECT * FROM champion';
      $sql = "SELECT * FROM `champion` ";
     // On prépare la requête
      $prepare= $db->prepare($sql);
      $prepare->execute();
      // On stocke le résultat dans un tableau associatif
      $tb_champion = $prepare->fetchAll();?>

      <section class="container-fluid">
          <div class="row text-center">
            <?php
            foreach($tb_champion as $list){?>
              <div class="col-4">
              <div class="card-body" style="width: 23rem;">
                <img src="<?php echo $list['image'] ;?>" alt="" height="200">
                <h5 class="card-title"><?php echo 'Ville : ' . $list['ville']; ?></h5>
                <p class="card-text"><?php echo 'Type : ' . $list['type']; ?></p>
                <p class="card-text"><?php echo 'Badge : ' . $list['badge']; ?><p>
                <!-- <p class="card-text"><?php echo 'typ2 : ' .  $list['typ2']; ?></p> -->
                <a href="index.php?formupdatechampion&idchamp=<?php echo $list['id'] ?>"><button type="button" class="btn btn-outline-secondary" name="modifier">Modifier</button></a>
                <a href="index.php?delete&id=<?php echo $list['id'] ?>"><button type="button" class="btn btn-outline-danger" name="deletechamp">Supprimer</button></a>
              </div>
              </div>
              <?php } ?>
          </div>
      </section>
      <?php
}
// update champion
if(isset($_GET['formupdatechampion'])){
  include 'formupdatechampion.php';


  if(isset($_POST['updatechamp'])){
    $sql ="UPDATE `champion` SET  `ville` = :ville1,`champion` = :champion1, `type` = :type1 , `badge` = :badge , `image` = :image1  WHERE `id`= :id";
    $prepare = $db->prepare($sql);
    $test = $prepare ->execute([
      'ville1' => $_POST['ville'],
      'champion1' => $_POST['champion'],
      'type1' => $_POST['type'],
      'badge' => $_POST['badge'],
      'image1' => 'public/images/' . $_FILES['image']['name'],
      'id' => $_POST['id']
    ]);  
  $fileName = 'public/images/'. basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
  
}
}
//detele
if(isset($_GET['delete'])){
  $sql = "DELETE FROM `champion` WHERE `id`=:id";
  // $sql = "DELETE * FROM `pirate`";
  $prepare = $db ->prepare($sql);
  $prepare -> execute([
      'id'=> $_GET['id']
  ]);
}


?>

    <!-- footer-->
<footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">

                  <!-- Linkedin -->
            <a href="https://www.linkedin.com/in/miguel-antonio-87b451227/" role="button">
            <i class="fab fa-linkedin-in"></i>
            <img src="public/images/Linkedin-icon.png" alt="" width="30" height="24" title="Clique pour voir">
          </a>
            
          </section>
          <!-- Section: Social media -->
        </div>
       
        <!-- Copyright -->          
        <br>    <a href="https://www.linkedin.com/in/miguel-antonio-87b451227/" role="button">    <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">Miguel ANTONIO</a>
        </div>
        <!-- Copyright -->
</footer>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>


 
 