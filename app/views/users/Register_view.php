<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php //print_r($data);?>

<style>


    .error {
        color: red;
    }
</style>

<div class = "register-container">
    <h1>Create an Account</h1>
    <form action = "<?php echo URLROOT;?>/users/register" method = "POST">
        <label>Username:</label>
        <input type = "text" name = "username"  value = "<?php if(isset($_POST['username']) ? $_POST['username'] : '') ?>"><br />
        <div class = "error">
            <?php echo $data['username'] ?? ''?>
        </div>


        <label>Email:</label>
        <input type = "email" name = "email" value = "<?php if(isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '') ?>"><br />
        <div class = "error" >
            <?php echo $data['email'] ?? ''?>
        </div>


        <label>Password</label>
        <input type = "password" name="password" value = "<?php if(isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '') ?>"><br /><br />
        <div class = "error" >
            <?php echo $data['password'] ?? ''?>
        </div>

        <label>Confirm Password</label>
        <input type = "password" name="confirm_password" value = "<?php if(isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '') ?>"><br /><br />
        <div class = "error" >
            <?php echo $data['confirm_password'] ?? ''?>
        </div>

        <div class = "error" >
            <?php echo $data['matchy'] ?? ''?>
        </div>

        <br />

        <input type = "submit" name = "wuby" value = "submit">
    </form>
</div>





<?php require_once APPROOT . "/views/inc/footer.php"; ?>
