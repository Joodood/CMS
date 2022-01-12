<?php require_once APPROOT . "/views/inc/header.php";
?>

<style>
    * {
        font-family: 'space';
    }
</style>

<?php
echo '<h1>Welcome to the Home Page! </h1>';

echo $data['title'];

require_once APPROOT . "/views/inc/footer.php";

?>

