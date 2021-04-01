<?php
$requete1 = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete1->execute();
//Je creer une variable pour recuperer le total de row pour l'index'
$total = $requete1->rowcount();

if (!empty($key) && !empty($value)) {
    $requete1->bindParam(":" . $key . "", $value);
} elseif (!empty($key) && !empty($value)) {

    $requete1->bindValue(":" . $key . "", "%" . $value . "%");
}
$requete1->execute();
while ($index = $requete1->fetch(PDO::FETCH_OBJ)) {
    $row[] = $index;
}

?>