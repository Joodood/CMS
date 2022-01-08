<?php require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    .row {
        display: grid;
        grid-template-columns: 300px 30px;
        grid-template-rows: 40px 1px;
        justify-content: center;
    }

    .first-col {
        background: lightcoral;
    }

    .second-col {
        background: cadetblue;
    }

    .bottom-notes {
        display: grid;
        background: bisque;
        align-content: center;
        justify-content: center;
    }

</style>


<div class = "row">
    <div class = "first-col">
        <h1>Posts</h1>
    </div>

    <div class = "second-col">
        <a href = "<?php echo URLROOT; ?>/posts/add">Add Post</a>
    </div>

</div>

<div class = "bottom-notes">
 <?php foreach($data['posts'] as $post) : ?>

        <h4><?php echo $post->title; ?></h4>
        <p>Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?></p>
        <p2><?php echo $post->body; ?></p2>
<!--        <a href = "--><?php //echo URlROOT; ?><!--/posts/show/--><?php //echo $post->postId; ?><!--">More</a>-->

     <a href = "<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More</a>


 <?php endforeach; ?>
</div>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
