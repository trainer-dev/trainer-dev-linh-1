<?php
    include "View/components/Auth/header.php";
?>
<title>Login Page</title>
<style>
    form.error{
        color:red;
    }
    label.error{
        font-size: .5em;
        margin-bottom: -25em;
        margin-top: .5em;
    }
</style>
<body>
<div class="wrapper">

    <h2 style="text-align: center; padding: 10px; margin-top: 50px;">
        <content>LOGIN PAGE</content>

        <p style="text-align: center; font-size: 15px; margin-top: 20px" >
            <content>Welcome to login page!<br> Please enter your username and password .</content>
        </p>

        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post" id="register">

            <?php
                if(isset($error)) {
                    ?>
                    <div class="form-group">
                        <!-- push template here -->
                        <div class='alert alert-danger' style='font-size: 0.5em'><strong>Error! </strong>
                            <?php echo $error; ?></div>
                    </div>
                    <?php
                }
            ?>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your username" name ="username" id ="username">
            </div>


            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>

            <button type="submit" class="btn btn-primary" style="float:right; margin-right:20px" name="submit">
                Submit
            </button>

        </form>

        <div class="left">
            <a href="/register" style="font-size: 15px">Do you have account yet?</a>
        </div>

        <a href="#" style="margin-left: 10px; font-size: 15px; text-align: center; color: black; margin-top: 30px" >Forget your username?</a>


</div>

<?php
    include "View/components/Auth/footer.php"
?>
<!--Load Auth.js here-->