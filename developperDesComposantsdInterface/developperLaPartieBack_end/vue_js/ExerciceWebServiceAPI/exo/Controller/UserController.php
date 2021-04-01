<?php
if(isset($_POST['submitDel']) && !empty($_POST['id'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    $request = 'DELETE FROM user WHERE user_id = :id';
    $result = $db->prepare($request);
    $result->bindvalue(':id', $id, PDO::PARAM_INT);
    $result->execute();
}
if(isset($_POST['submitEdit']) && !empty($_POST['id'])){
    $array_user = [
        ':nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING),
        ':tel' => filter_input(INPUT_POST, 'tel', FILTER_VALIDATE_INT),
        ':groupe' => filter_input(INPUT_POST, 'groupe', FILTER_SANITIZE_STRING),
        ':id' => filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)
    ];

    $request = 'UPDATE user SET user_name = :nom, user_tel = :tel, user_groupe = :groupe WHERE user_id = :id';
    $result = $db->prepare($request);
    $result->execute($array_user);
}
if (isset($_POST['submitAdd']) && !empty($_POST['nom']))
{
    $array_user = [
        ':nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING),
        ':tel' => filter_input(INPUT_POST, 'tel' ),
        ':groupe' => filter_input(INPUT_POST, 'groupe', FILTER_SANITIZE_STRING),
    ];

    $request = 'INSERT INTO user(user_name, user_tel, user_groupe) VALUE (:nom, :tel, :groupe)';
    $result = $db->prepare($request);
    $result->execute($array_user);
}

?>