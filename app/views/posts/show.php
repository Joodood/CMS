<?php require_once APPROOT . "/views/inc/header.php"; ?>

<style>

    * {
        font-size: 22px;
        font-family: 'space';

    }
    .edit {
        text-decoration: none;
        font-size: 36px;
        color: #ffffff;
        background-color: #007FFF;
    }

    .back {
        text-decoration: none;
        font-size: 36px;
    }

    form {
        float: right;
    }
</style>

<a class = "back" href = "<?php echo URLROOT; ?>/posts">Back</a>
<br>


<?php //      foreach($data['post'] as $post) :                   ?>
<!---->
<!--<h1>--><?php //echo $post->title; ?><!--</h1>-->
<!---->


<?php // print_r($data['post']);          ?>
<!---->
<h1> <?php print_r($data['post']->title); ?></h1>
<br>
<h2><?php print_r($data['post']->body); ?></h2>

<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a class = "edit" href = "<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">Edit</a>


    <form action = "<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
        <input type = "submit" name="Delete" value = "Delete">

    </form>
<?php endif;?>

<!--//--><?php ////endforeach; ?>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
