<?php
    require("../View/navBar.php");

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .search-add-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .search-forms {
            display: flex;
            align-items: center;
        }
        .search-bar {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
        .search-bar input, .search-bar select {
            margin-right: 5px; 
        }
        .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
    </style>



<div class="album py-4">
    <div class="container">
        
        <div class="row py-4">
            <h5 class="section-title h3">YOUR MOVIES</h5>
            
<!-- Ako ne e logiran da mu kazhe deka ne e logiran i da mu dade kopche koe go vode do login page i kodo podole da ne se izvrshe(die()) -->
            <?php if(!isset($_SESSION["logged_in"])) : ?>
                <h5 class="section-title h3">You are not logged in</h5>
                <a class="nav-link" href="../Account/?action=login-form">Log In</a>
            <?php 
                die();
                endif; 
            ?>

            <?php foreach($userMovies as $movie) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img style="height: 400px;" class="card-img-top" src="<?php echo $movie['MovieImageUrl'] ?>" alt="Card image cap">
                        <div class="card-body bg-light" style="height: 160px; color: #007b5e;">
                            <div style="height: 50px; font-size: 1rem;">
                                <p class="card-text"><?php echo $movie['Title'] ?></p>
                            </div>
                            <p class="card-text" style="font-size: 0.875rem;">- <?php echo $movie['DirectorName'] ?></p>
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
