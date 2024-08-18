<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="row">
    <div class="col-md-6 offset-3">
        <p>
            <h4>Sign up for a new account</h4>


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
</div> -->


<?php require("../View/navBar.php"); ?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        body{
            background: #393a3d;
            width: auto;	
        }
        
        .container-fluid-login{
            padding-top: 5vh;   
        }
        form{
            background: #fff;
        }
        .form-container{
            border-radius: 20px;
            padding: 40px;
        }
    </style>
    
</head>

 
<body>
    
<?php if(isset($_SESSION["error"])) : ?>
        <div class="alert alert-danger d-flex justify-content-center" id="error-alert" role="alert">
            <?php 
                echo $_SESSION["error"];
                unset($_SESSION["error"]);
            ?>
        </div>
<?php endif; ?>

  <section class="container-fluid-login">
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form class="form-container" action="index.php" method="POST">
            <input hidden name="action" value="register"/>
            <div class="form-group">
            <h4 class="text-center font-weight-bold"> Register </h4>
            <div class="form-group">
            <label>Username</label>
            <input type="input" class="form-control"  name="Username" placeholder="Username">
            </div>
            <label for="Inputuser1">EmailAddress</label>
            <input type="email" class="form-control"  name="EmailAddress" aria-describeby="usernameHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control"  name="Password" placeholder="Password">
            </div>
            <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control"  name="ConfirmPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            <div class="form-footer">
            <p> Already have an account? <a href="Login">Log in</a></p>
            </div>
        </form>
      </section>
    </section>
  </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#error-alert").slideUp(1000);
          $("#error-alert").remove();
        });
    });
</script>
