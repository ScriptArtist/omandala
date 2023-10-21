<?php

if (isset($_POST["upload_url"])) {
    $upload_url = $_POST["upload_url"];

   // $post_params['photo'] = '@'.'1305295000_demotiv.jpg'; ///your picture
    $post_params['photo'] = '@' . $_FILES['photo']['tmp_name'].';filename=name.png' . ';type=image/png';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $upload_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
    $result = curl_exec($ch);
    curl_close($ch);

    //var_dump($result);
    $result = json_decode($result);

    $mess = array (server => $result->server, photo=> $result->photo, hash => $result->hash);

   // echo json_encode($mess);
    echo json_encode($result);

}
?>
