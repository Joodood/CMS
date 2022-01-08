<?php
require_once APPROOT . "/views/inc/header.php"; ?>

<style>
    .error {
        color: red;
    }
</style>

<div class = "login-container">

    <?php flash('register_successful'); ?>
    <h1>Login</h1>

    <form action = "<?php echo URLROOT;?>/users/login" method = "POST">



    <label>Email: </label>
    <input type = "text" name = "login_email" value = "<?php if(isset($_POST['login_email']) ? htmlspecialchars($_POST['login_email']) : '');?>"><br />
    <div class = "error">
        <?php echo $data['login_email'] ?? '';?>
    </div>



    <label>Password: </label>
    <input type = "password" name = "login_password" value = "<?php if(isset($_POST['login_password']) ? htmlspecialchars($_POST['login_password']) : '');?>"><br />
        <div class = "error">
            <?php echo $data['login_password'] ?? '';?>
        </div>


    <input type = "submit" name = "login_submit" value = "submit">


    </form>
</div>


<?php require_once APPROOT . "/views/inc/footer.php"; ?>
