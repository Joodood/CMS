<?php
require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    * {
        font-family: 'space';
    }
    .post-container {
        display: grid;
        justify-content: center;
        margin-top: 100px;
    }

        .body {
            font-size: 22px;
        }

        .tit {
            font-size: 25px;
        }

    .error {
        color: red;
    }
    .back {
        background-color: #007FFF;
        color: white;
        text-decoration: none;
        font-size: 32px;
        font-family: 'space';
        margin: 14px 10px;
    }

</style>

<a class = 'back' href = "<?php echo URLROOT; ?>/posts">Back</a>



<div class = "post-container">

    <h1>Add Post</h1>
    <p>Create a post with this form</p>

    <form action = "<?php echo URLROOT;?>/posts/add" method = "POST">



        <label>Title: </label>
<!--        <input type = "text" name = "title" --><?php //echo (!empty($data['title'])) ? '' : "";?><!-- value = "--><?php //echo $data['title']; ?><!--"><br />-->
        <input type = "text" class = 'tit' name = "title"><br />


        <div class = "error">
            <?php echo $data['title'] ?? '';?>
        </div>



        <label>Body: </label>
        <textarea name = "body" class = 'body' rows = '5' cols = '50' value = "<?php if(isset($_POST['body_err']) ? htmlspecialchars($_POST['body']) : '');?>"></textarea>
        <div class = "error">
            <?php echo $data['body'] ?? '';?>
        </div>


        <input type = "submit" value = "submit_post">


    </form>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>
