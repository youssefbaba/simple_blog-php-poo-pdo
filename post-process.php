<?php
include(dirname(__FILE__) . '/classes/post-classe.php');

$posts= new Posts();

if (isset($_POST["submit"])) {

    $title = htmlspecialchars($_POST["post-title"]);
    $body= htmlspecialchars($_POST["post-content"]);
    $author = htmlspecialchars($_POST["post-author"]);
    $listData = $posts->addPost($title,$body,$author);
    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-php-version2/index.php?status=added");

}else if($_GET["send"] === "update") {
     
    $title = htmlspecialchars($_POST["post-title"]);
    $body= htmlspecialchars($_POST["post-content"]);
    $author = htmlspecialchars($_POST["post-author"]);
    $posts->updatePost($_GET["id"] , $title , $body ,$author);
    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-php-version2/index.php?status=updated");

}else if($_GET["send"] === "delete") {
    $id = $_GET["id"];
    $posts->deletPost($id);
    header("location: {$_SERVER['HTTP_ORIGIN']}/crud-php-version2/index.php?status=deleted");


}
