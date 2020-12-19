<?php

require_once("./templates/header.php");
require_once(dirname(__FILE__) . '/classes/post-classe.php');


?>

<!-- Button trigger modal -->
<div class="text-center">
    <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddPostModal">
        Create Post
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="AddPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Form input  -->
                <form action="post-process.php" method="POST">
                    <div class="form-group">
                        <label for="inputTitle">Title:</label>
                        <input type="text" name="post-title" class="form-control" id="inputTitle" placeholder="title.." required>
                    </div>
                    <div class="form-group">
                        <label for="textareacontent">Content:</label>
                        <textarea name="post-content" class="form-control" id="textareacontent" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputAuthor">Author:</label>
                        <input type="text" name="post-author" class="form-control" id="inputAuthor" placeholder="author.." re>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add Post</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="row" style=" padding: 5px;border: 1px solid blue;background-color: yellow;">
    <?php
    $posts = new Posts();
    if ($posts->getPost()) {

        foreach ($posts->getPost() as $post) { ?>

            <div class="col-md-6 mt-4">
                <div class="card" style="border: 1px solid blue;">
                    <div class="card-body">
                        <h5 class='card-title'> <?php echo $post['title']; ?> </h5>
                        <p class='card-text'> <?php echo $post['body']; ?></p>
                        <h6 class='card-subtitle text-muted text-right'>Author: <?php echo  $post['author']; ?> </h6></br>
                        <a href="edit-post.php?id=<?php echo $post['id']; ?> " class='btn btn-warning'>Edit</a>
                        <a href="post-process.php?id=<?php echo $post['id']; ?>&send=delete " class='btn btn-danger'>Delete</a>

                    </div>
                </div>
            </div>
        <?php  }
    } else { ?>
        <p class='mt-5 mx-auto'>Post is empty...</p>
    <?php }  ?>
</div>

<?php
require_once("./templates/footer.php");
?>