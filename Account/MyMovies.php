<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .btn-custom {
            background-color: #007b5e; 
            color: white;
            border-color: #007b5e;
            font-size: 0.875rem; 
        }
        .btn-custom:hover {
            background-color: beige; 
            color: #007b5e;
            border-color: #007b5e;
        }
        .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .card-custom {
            background-color: #f8f9fa;
            border: 1px solid #007b5e;
            color: #007b5e;
        }
        .card-text-custom {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<?php 
    require("../View/navBar.php");
?>

<div class="album py-4">
    <div class="container">
        <div class="row py-2">
            <h3 class="section-title" style="background-color: #eaf5f2;">Your Movies</h3>
            <?php if(!isset($_SESSION["logged_in"])) : ?>
                <div class="col-md-12 text-center" style="margin-top: 30px;">
                    <h4 class="section-title" style="font-size: 1.4rem;">You are not logged in</h4>
                    <p>Please log in to see your movies.</p>
                </div>
            <?php 
                die();
                endif; 
            ?>

            <?php foreach($userMovies as $movie) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow card-custom">
                        <img style="height: 400px;" class="card-img-top" src="<?php echo $movie['MovieImageUrl'] ?>" alt="Movie image">
                        <div class="card-body" style="height: 160px;">
                            <div style="height: 50px; font-size: 1rem;">
                                <p class="card-text"><?php echo $movie['Title'] ?></p>
                            </div>
                            <p class="card-text card-text-custom">- <?php echo $movie['DirectorName'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                        <a href="../Movies/?action=details&id=<?php echo $movie['MovieID'] ?>" class="text-decoration-none text-muted">View</a>
                                    </button>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
