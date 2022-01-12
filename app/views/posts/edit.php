<?php
require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    * {
        font-size: 22px;
        font-family: 'space';

    }
    .post-container {
        display: grid;
        justify-content: center;
    }

    .back {
        font-size: 32px;
        text-decoration: none;
    }

    .error {
        color: red;
    }

    .sub {
        color: #007FFF;
    }
</style>

<!--<a href = "--><?php //echo URLROOT; ?><!--/posts/">Back</a>-->
<a class = "back" href = "<?php echo URLROOT; ?>/posts/show/<?php echo $data['id'];?>">Back</a>


<div class = "post-container">

    <h1>Edit Post</h1>
    <p>Create a post with this form</p>

    <form action = "<?php echo URLROOT;?>/posts/edit/<?php echo $data['id'];?>" method = "POST">

<!--        --><?php //echo (!empty($data['title'])) ? '' : "";?>

        <label>Title: </label>
                <input type = "text" name = "title" value = "<?php echo $data['title']; ?>"><br />
<!--        <input type = "text" name = "title"><br />-->


        <div class = "error">
            <?php echo $data['title'] ?? '';?>
        </div>



        <label>Body: </label>
        <textarea name = "body" rows ="4" cols = "50"><?php echo $data['body']?> </textarea>
        <div class = "error">
            <?php echo $data['body'] ?? '';?>
        </div>


        <input class = "sub" type = "submit" value = "submit_post">


    </form>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>
