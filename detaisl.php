<!-- <?php
//on démarre une session
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');
    
    // on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `pokemon` WHERE `id`=:id;';
    
    // on prépare la requete
    $query = $db->prepare($sql);

    // on "accroche" les paramètre(id)
    $query = bindValue(':id',$id, PDO::PARAM_INT);
    // on exécute la requete
    $querey->execute();
    // on récupère le pokemon
    $produit = $query->fetch();
    // on vérifie si le pokrmon existe
    if(!$pokemon){
        $_SESSION['erreur'] = "Cet id n'exist pas";
        header('Location:index.php');
    }
}else{
    $_SESSION['erreur'] = "URL(id) invalide";
    header('Location:index.php');
}
?>
 -->
