<?php $_SESSION["current_page_logout"] = $_SERVER["REQUEST_URI"] ?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .custom-navbar {
            height: 70px; 
        }
        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            line-height: 80px;
            font-size: 1.2rem;
        }
        #separator{
            height:0.1rem;
            background-color:red;
            margin-left: .9rem;
            margin-right: 1.2rem;
        }
        .btn-custom-green {
            background-color: #007bff; /* Blue color for primary buttons */
            border-color: #007bff;
            color: white;
        }

        .btn-custom-green:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085;
            color: white; 
        }
        .btn-custom-signin {
            background-color: #5bc0de; /* Light blue color */
            border-color: #46b8da; /* Slightly darker border */
            color: white; 
        }

        .btn-custom-signin:hover {
            background-color: #31b0d5; /* Darker blue on hover */
            border-color: #269abc;
            color: white; 
        }
        .btn-custom-cart {
            background: transparent; /* Blue color for primary buttons */
            border: none;
        }
        .btn-custom-red {
    background-color: #e60000; /* Very bright red */
    border-color: #c60000;
    color: white;
}

.btn-custom-red:hover {
    background-color: #c60000; /* Darker, more intense red on hover */
    border-color: #a40000;
    color: white;
}

        
    </style>
</head>

<?php
    $uriArray = explode("/" ,$_SERVER['REQUEST_URI']);
    $currentFolder = $uriArray[count($uriArray) - 2];
 ?>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container-fluid">
    <a class="navbar-brand" style="font-size: 1.6rem; color: #007b5e; font-weight: bold;" href="../Account">
    <i class="bi bi-film"></i> MyMovies
    </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "Movies") echo "style='color:red'"; else echo "style='color: black'"?> href="../Movies">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "Actors") echo "style='color:red'"; else echo "style='color: black'";?> href="../Actors">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if($currentFolder == "CreativeDirectors") echo "style='color:red'"; else echo "style='color: black'";?> href="../CreativeDirectors">Creative Directors</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if(!isset($_SESSION["logged_in"])) { ?>
                <li class="nav-item">
                <a class="btn btn-custom-signin me-2" href="../Account/Register">Sign Up</a>

                </li>
                <li class="nav-item">
                <a class="btn btn-custom-green" href="../Account/Login">Log In</a>

                </li>
                <?php }else{ ?>
                <li class="nav-item">
                    <a class="btn btn-custom-cart me-2"  href="../Cart"><i class="bi bi-cart"></i> Cart</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-custom-red" " href="../Account/?action=logout">Log out</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div id="separator"></div>


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
