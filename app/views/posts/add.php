<?php
require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    .error {
        color: red;
    }

</style>

<a href = "<?php echo URLROOT; ?>/posts">Back</a>



<div class = "post-container">

    <h1>Add Post</h1>
    <p>Create a post with this form</p>

    <form action = "<?php echo URLROOT;?>/posts/add" method = "POST">



        <label>Title: </label>
<!--        <input type = "text" name = "title" --><?php //echo (!empty($data['title'])) ? '' : "";?><!-- value = "--><?php //echo $data['title']; ?><!--"><br />-->
        <input type = "text" name = "title"><br />


        <div class = "error">
            <?php echo $data['title'] ?? '';?>
        </div>



        <label>Body: </label>
        <textarea name = "body" value = "<?php if(isset($_POST['body_err']) ? htmlspecialchars($_POST['body']) : '');?>"></textarea>
        <div class = "error">
            <?php echo $data['body'] ?? '';?>
        </div>


        <input type = "submit" value = "submit_post">


    </form>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>
