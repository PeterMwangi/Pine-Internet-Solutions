<?php include 'header.php'?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="sigup_handler.php" method="post">
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <span class="btn-danger">
                        <?php
                        if (isset($_GET['f_error'])){
                            echo "Firstname is required";
                        }
                        ?>
                    </span>
                    <input type="text" name="firstname" class="form-control" id="firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Last name:</label>
                    <span class="btn-danger">
                        <?php
                        if (isset($_GET['l_error'])){
                            echo "Lastname is required";
                        }
                        ?>
                    </span>

                    <input type="text" name="lastname" class="form-control" id="lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <span class="btn-danger">
                        <?php
                        if (isset($_GET['e_error'])){
                            echo "Email is required";
                        }
                        ?>
                    </span>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <?php
                    if (isset($_GET['p1_error'])){
                        echo "Password 1 is required";
                    }
                    ?>
                    <input type="password" name="password_1" class="form-control" id="pwd" >
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <?php
                    if (isset($_GET['p2_error'])){
                        echo "Password 2 is required";
                    }
                    ?>
                    <input type="password" name="password_2" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label><input type="date" name="date" > Date Registered</label>
                </div>
                <button type="submit" name="signup" class="btn btn-default">Signup</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php include 'footer.php'?>

