<?php require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    *{
        font-family: 'space';
    }

    p {
        display: grid;
        justify-content: center;
    }


    .row {
        display: grid;
        grid-template-columns:40px 40px;
        grid-template-rows: 80px 80px;
        justify-content: center;
    }

    .first-col {
        background: #007FFF;
        padding: 5px 10px;
        position: absolute;
    }

    .second-col {
        /*background: cadetblue;*/
        /*display: grid;*/
        /*justify-content: center;*/
        box-shadow:
        border-color: #007FFF;
        padding: 10px;
    }

    .bottom-notes {
        display: grid;
        background: #ffffff;
        grid-template-columns: 1fr;
        grid-template-rows; 100vh
        align-content: center;
        justify-content: center;
        font-family: 'space';

        border-radius: 10px;
        border-style: solid;
        border-color: #737373;
    }
    .more {
        font-size: 24px;
        text-decoration: none;
        /*background-color: #007FFF;*/
        /*left: 50px;*/
        display: grid;
        /*left: 50px;*/
        align-content: center;
        justify-content: center;

    }
    .add-daddy {
        font-family: 'space';
        font-size: 28px;
        list-style: none;
        text-decoration: none;

    }
    h4 {
        /*display: grid;*/
        /*justify-content: center;*/
        float: right;
    }
    .info {
        margin-left: auto;
        margin-right: 2px;
        font-family: "Courier New";
    }

</style>


<div class = "row">
    <div class = "first-col">
        <h1>Posts</h1>
    </div>

    <div class = "second-col">
        <a class = 'add-daddy' href = "<?php echo URLROOT; ?>/posts/add">Add Post</a>
    </div>

</div>

<?php foreach($data['posts'] as $post) : ?>
<div class = "bottom-notes">
<!-- --><?php //foreach($data['posts'] as $post) : ?>

        <h4><?php echo $post->title; ?></h4>

<!--     <h5>--><?php //echo $post->postId; ?><!--</h5>-->
<!--    --><?php //echo gettype($post->postId);?>

<!--        <p>Written by --><?php //echo $post->name; ?><!-- on --><?php //echo $post->postCreated; ?><!--</p>-->
        <p2><?php echo $post->body; ?></p2>
<!--        <a href = "--><?php //echo URlROOT; ?><!--/posts/show/--><?php //echo $post->postId; ?><!--">More</a>-->
     <p class = "info">Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?></p>
<!-- getting a new set of information when you click on show-->

     <a class = 'more' href = "<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?> ">More</a>

<!--     --><?php //echo $post->postId; ?>
</div>
 <?php endforeach; ?>
<!--</div>-->

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
