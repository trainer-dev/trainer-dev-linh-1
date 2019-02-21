<?php
include "View/components/Auth/header.php";
?>
<title>Register Page</title>
<style>
    form.input{

    }
    form.error{
        color:red;
    }
    label.error{
        margin-bottom: -25em;
        margin-top: .5em;
        margin-left: 7em;
    }
    .alert{
        margin:10px;
    }
</style>
<body>

<div class="wrapper">
    <h2 style="text-align: center; padding: 10px; margin-top: 50px;">
        <content>SIGN UP</content>
    </h2>

    <h5 style="text-align: center">
        <content>Welcome to Sign up page!<br></content>
    </h5>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]);?>" id="register">
        <?php
        if(isset($fail)) {
            ?>
            <div class="form-group">
                <!-- push template here -->
                <div class='alert alert-danger' style='font-size: 1em; text-align: center;'><strong>Error! </strong>
                    <?php echo $fail; ?></div>
            </div>
            <?php
        }
        ?>

        <?php
        if(isset($success)) {
            ?>
            <div class="form-group">
                <!-- push template here -->
                <div class='alert alert-success' style='font-size: 1em; text-align: center;'><strong>Congrat! </strong>
                    <?php echo $success; ?></div>
            </div>
            <?php
        }
        ?>
        <div class="form-group">
            <input type="text" class="form-control"  placeholder="Enter your username" name ="username" id ="username">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your password" name="password" id="password">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your password again" name="re-password" id="re-password">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email">
        </div>

        <button type="submit" class="btn btn-primary" style="float:right; margin-right:20px" name="submit">Register</button>
    </form>
    <div class="left">
        <a href="/login">Do you have account yet?</a>
    </div>


</div>

<?php
include "View/components/Auth/footer.php"
?>
