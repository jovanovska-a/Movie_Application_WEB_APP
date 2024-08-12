<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-custom {
            background-color: #28a745; /* Green color */
            border-color: #28a745;
            font-size: 0.875rem; /* Slightly smaller font size */
        }
        .btn-custom:hover {
            background-color: #218838; /* Darker green on hover */
            border-color: #1e7e34;
        }
        .custom-btn-container {
            display: flex;
            justify-content: flex-end; /* Aligns button to the right */
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyMovies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="./">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Actors">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../CreativeDirectors">Creative Directors</a>
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

<!-- Main Content -->
<div class="album py-3 bg-light">
    <div class="container">
        <div class="custom-btn-container">
            <a href="?action=show_add_form" class="btn btn-custom">Add New Movie</a>
        </div>
        <div class="row">
            <?php foreach($movies as $movie) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="<?php echo $movie['MovieImageUrl'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text"><?php echo $movie['Title'] ?></p>
                            <p class="card-text">- <?php echo $movie['FullName'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        <a href="?action=details&id=<?php echo $movie['MovieID'] ?>" class="text-decoration-none text-dark">View</a>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Shop</button>
                                </div>
                                <small class="text-muted">Price: <?php echo $movie['Price'] ?> $</small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
    </div>
</div>

<!-- Bootstrap JS (Popper.js is included with Bootstrap 5) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




