<?php require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    form {
        float: right;
    }
</style>

<a href = "<?php echo URLROOT; ?>/posts">Back</a>
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
    <a href = "<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">Edit</a>


    <form action = "<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
        <input type = "submit" name="Delete" value = "Delete">

    </form>
<?php endif;?>

<!--//--><?php ////endforeach; ?>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
