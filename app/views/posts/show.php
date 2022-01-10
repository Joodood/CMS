<?php require_once APPROOT . "/views/inc/header.php"; ?>


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

<?php endif;?>

<!--//--><?php ////endforeach; ?>

<?php require_once APPROOT . "/views/inc/footer.php"; ?>
