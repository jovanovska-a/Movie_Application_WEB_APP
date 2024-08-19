<?php $_SESSION["current_page_logout"] = $_SERVER["REQUEST_URI"] ?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        .custom-navbar {
            height: 70px; /* Change this value to the desired height */
        }
        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            line-height: 80px; /* This ensures that the content is vertically centered */
            font-size: 1.2rem;
        }
        #separator{
            height:0.1rem;
            background-color:red;
            margin-left: .9rem;
            margin-right: 1.2rem;
        }
        
    </style>
</head>

<?php
    $uriArray = explode("/" ,$_SERVER['REQUEST_URI']);
    $currentFolder = $uriArray[count($uriArray) - 2];
 ?>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-size: 1.4rem;color:white" href="#">MyMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "Movies") echo "style='color:red'"; else echo "style='color:white'";?> href="../Movies">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "Actors") echo "style='color:red'"; else echo "style='color:white'";?> href="../Actors">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "CreativeDirectors") echo "style='color:red'"; else echo "style='color:white'";?> href="../CreativeDirectors">Creative Directors</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if(!isset($_SESSION["logged_in"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" <?php if($uriArray[count($uriArray) - 1] == "Register") echo "style='color:red'"; else echo "style='color:white'";?> href="../Account/Register">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if($uriArray[count($uriArray) - 1] == "Login") echo "style='color:red'"; else echo "style='color:white'";?> href="../Account/Login">Log In</a>
                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Account/?action=logout">Log out</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div id=separator></div>

<body  style="
        background-image: url(https://img.freepik.com/free-photo/movie-background-collage_23-2149876028.jpg?t=st=1724062348~exp=1724065948~hmac=5205772cc694be8a1297a350a557625cf1eac0e7ba7140b8e89920118992fefd&w=996);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center">
</body>

<?php if(isset($_SESSION["success"])) : ?>
        <div class="alert alert-success d-flex justify-content-center" id="success-alert" role="alert">
        <?php 
            echo $_SESSION["success"];
            unset($_SESSION["success"]);
         ?>
        </div>
<?php endif; ?>


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
          $("#success-alert").remove();
        });
    });
</script>
