<?php require_once APPROOT . "/views/inc/header.php"; ?>
<?php //print_r($data);?>

<style>
    * {
        font-family: 'space';
        font-size: 22px;
    }

    .register-container {
        padding-top: 100px;
        padding-bottom: 100px;
        /*display: flex;*/
        /*align-content: center;*/
        /*justify-content: center;*/
        display: grid;
        justify-content: center;
        /*grid-template-columns: 200px;*/
        /*grid-template-rows: 300px;*/
        border-style: solid;

        /*border-radius: 30px;*/
        /*border-color: #737373;*/
        /*position: absolute;*/
    }
    /*input {*/
    /*    line-height: 5px;*/
    /*}*/

    .error {
        color: red;
    }

    #inme {
        background-color: #007FFF;

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

        <input type = "submit" id = "inme" name = "wuby" value = "submit">
    </form>
</div>





<?php require_once APPROOT . "/views/inc/footer.php"; ?>
