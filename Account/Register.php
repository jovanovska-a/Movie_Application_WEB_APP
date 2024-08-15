<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="row">
    <div class="col-md-6 offset-3">
        <p>
            <h4>Sign up for a new account</h4>

<?php if(isset($_SESSION["error"])) : ?>
        <div class="alert alert-danger d-flex justify-content-center" role="alert">
        <?php 
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
         ?>
        </div>
<?php endif; ?>


        <div class="row">
            <div class="col-md-8 offset-2">
                <form action="." method="POST">
                    <input hidden name="action" value="register" />
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="input" name="Username" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">EmailAddress</label>
                        <input type="email" name="EmailAddress" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="Password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">ConfirmPassword</label>
                        <input type="password" name="ConfirmPassword" class="form-control" />
                    </div>

                    <div class="form-group">
                        <input class="btn btn-outline-success float-right" type="submit" value="Sign Up" />
                        <a class="btn btn-outline-secondary" href="../index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>