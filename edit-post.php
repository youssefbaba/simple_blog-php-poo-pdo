<?php

require_once("./templates/header.php");
include(dirname(__FILE__) . '/classes/post-classe.php');


$posts = new Posts();
$listData2 = $posts->idetPostById($_GET["id"]);
$id = $listData2["id"];
$title = $listData2["title"];
$body = $listData2["body"];
$author = $listData2["author"];



?>

<!--Form input  -->
<form action="post-process.php?id=<?php echo $id; ?>&send=update" method="POST">
    <div class="form-group">
        <label for="inputTitle">Title:</label>
        <input type="text" name="post-title" class="form-control" id="inputTitle" value="<?php echo (htmlspecialchars($title)); ?> " required>
    </div>
    <div class="form-group">
        <label for="textareacontent">Content:</label>
        <textarea name="post-content" class="form-control" id="textareacontent" rows="4" required> <?php echo (htmlspecialchars($body)); ?></textarea>
    </div>
    <div class="form-group">
        <label for="inputAuthor">Author:</label>
        <input type="text" name="post-author" class="form-control" id="inputAuthor" value="<?php echo (htmlspecialchars($author)); ?>" required></br>
    </div>
    <div>
        <a href="index.php" class="btn btn-secondary">Close</a>
        <button type="submit" name="update" class="btn btn-primary">Update Post</button>
    </div>
</form>