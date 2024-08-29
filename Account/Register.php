<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        body {
            background: #e0f7f7; /* Pale turquoise background */
            color: #333; /* Darker text for readability */
            font-family: Arial, sans-serif;
        }

        .container-fluid-login {
            padding-top: 5vh;
        }

        .form-container {
            background: #ffffff; /* White background for the form */
            border-radius: 8px; /* Slightly rounded corners */
            padding: 20px; /* Smaller padding for a compact form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            max-width: 400px; /* Maximum width for a smaller form */
            margin: auto; /* Center the form */
        }

        .form-group label {
            font-weight: 600;
            color: #555; /* Darker text for labels */
        }
        .form-group-custom {
            font-weight: 600;
            color: #555; /* Darker text for labels */
        }

        .form-group-custom label {
            display: block;
            margin-bottom: 5px; /* Add spacing between label and input */
        }

        .form-group-custom input {
            border-radius: 4px; /* Add a slight rounding to input fields */
            padding: 10px; /* Add padding for better readability */
            border: 1px solid #ced4da; /* Add a light border */
        }

        .form-group-custom input:focus {
            outline: none;
            border-color: #7dced8; /* Highlight the border on focus */
            box-shadow: 0 0 5px rgba(125, 206, 216, 0.5); /* Add a slight shadow */
        }

        .btn-primary {
            background-color: #7dced8; /* Pale turquoise green */
            border-color: #7dced8;
        }

        .btn-primary:hover {
            background-color: #6abdc0; /* Slightly darker turquoise on hover */
            border-color: #6abdc0;
        }

        .form-footer p {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #7dced8;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php require("../View/navBar.php"); ?>

<?php if (isset($_SESSION["error"])) : ?>
    <div class="alert alert-danger d-flex justify-content-center" id="error-alert" role="alert">
        <?php 
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        ?>
    </div>
<?php endif; ?>

<section class="container-fluid-login">
    <section class="row justify-content-center">
        <section class="col-12">
            <form class="form-container" action="index.php" method="POST">
                <input hidden name="action" value="register"/>
                <h4 class="text-center">Register</h4>
                <div class="form-group form-group-custom">
    <label for="Username">Username</label>
    <input type="text" class="form-control" name="Username" placeholder="Username" id="Username">
</div>
<div class="form-group form-group-custom">
    <label for="EmailAddress">Email Address</label>
    <input type="email" class="form-control" name="EmailAddress" placeholder="Email Address" id="EmailAddress">
</div>
<div class="form-group form-group-custom">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="Password" placeholder="Password" id="Password">
</div>
<div class="form-group form-group-custom">
    <label for="ConfirmPassword">Confirm Password</label>
    <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password" id="ConfirmPassword">
</div>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <div class="form-footer">
                    <p>Already have an account? <a href="Login">Log in</a></p>
                </div>
            </form>
        </section>
    </section>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#error-alert").fadeTo(2000, 500).slideUp(500, function() {
            $("#error-alert").slideUp(1000);
            $("#error-alert").remove();
        });
    });
</script>
</body>
</html>
