<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
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
            width: 400px; /* Maximum width for a smaller form */
            margin: auto; /* Center the form */
        }

        .form-group label {
            font-weight: 600;
            color: #555; /* Darker text for labels */
        }
        .form-group-custom {
            font-weight: 600;
            color: #555; /* Darker text for labels */
            margin-bottom: 17px;
        }
        .form-group-custom input {
            border-radius: 4px; /* Add a slight rounding to input fields */
            padding: 8px; /* Add padding for better readability */
            border: 1px solid #ced4da; /* Add a light border */
        }

        .form-group-custom label {
            display: block;
            margin-bottom: 5px; /* Add spacing between label and input */
        }

        .form-group-custom input:focus {
            outline: none;
            border-color: #7dced8; /* Highlight the border on focus */
            box-shadow: 0 0 5px rgba(125, 206, 216, 0.5); /* Add a slight shadow */
        }

        .btn-primary {
            background-color: #007bff; /* Blue color for primary buttons */
            border-color: #007bff;
            color: white; 
            width: 100%;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085;
            color: white; 
        }

        .form-footer p {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #007bff;
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

<!-- Error Alert -->
<?php if (isset($_SESSION["error"])) : ?>
    <div class="alert alert-danger d-flex justify-content-center" id="error-alert" role="alert">
        <?php 
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        ?>
    </div>
<?php endif; ?>

<!-- Form Section -->
<section class="container-fluid-login">
    <section class="row justify-content-center">
        <section class="col-12 col-sm-8 col-md-6 col-lg-4">
            <form class="form-container" action="index.php" method="POST">
                <input type="hidden" name="action" value="login"/> 
                <h4 class="text-center">Login</h4> 
                <div class="form-group form-group-custom">
    <label for="EmailAddress">Email Address</label>
    <input type="email" class="form-control" name="EmailAddress" placeholder="Enter your email" id="EmailAddress">
</div>
<div class="form-group form-group-custom">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="Password" placeholder="Enter your password" id="Password">
</div>

                <button type="submit" class="btn btn-primary btn-block">Log In</button> 
                <div class="form-footer">
                    <p>Don't have an account? <a href="Register">Create one!</a></p>
                </div>
            </form>
        </section>
    </section>
</section>

<!-- Include only necessary Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Fade Out Alert Script -->
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
