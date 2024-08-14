<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .custom-navbar {
            height: 80px; /* Change this value to the desired height */
        }
        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            line-height: 80px; /* This ensures that the content is vertically centered */
            font-size: 1.2rem;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" style="font-size: 1.4rem;" href="#">MyMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($currentFolder == "Movies") : echo "active"; endif ?>" href="../Movies">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($currentFolder == "Actors") : echo "active"; endif ?>" href="../Actors">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($currentFolder == "CreativeDirectors") : echo "active"; endif ?>" href="../CreativeDirectors">Creative Directors</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sign In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
