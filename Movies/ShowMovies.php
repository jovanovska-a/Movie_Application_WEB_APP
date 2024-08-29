<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <!-- Bootstrap CSS -->
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
        .btn-custom-view
        {
            border-radius: 0.25rem 0 0 0.25rem;
        }
        .btn-custom-shop
        {
            border-radius: 0 0.25rem 0.25rem 0;
        }
        body{
            background-image: url(https://img.freepik.com/premium-photo/green-background-trendy-health-business-website-template-with-copy-space_361486-17.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center"
        }
    </style>
</head>
<body>
<?php 
    require("../View/navBar.php");
?>

<div class="album py-4">
    <div class="container">
        <div class="search-add-container">
            <div class="search-forms">
                <form method="GET" class="search-bar">
                    <input type="input" placeholder="Search for movie by name.." name="search" value ="<?php echo $search ?>" class="form-control" style="font-size: 0.9rem;"/>
                    <button type="submit" class="btn btn-outline-secondary" style="font-size: 0.85rem;"><i class="bi bi-search"></i></button>
                </form>
                <form method="GET" class="search-bar">
                    <select name="searchByGenreId" class="form-control" style="color: #6c757d; font-size: 0.9rem;">
                        <option selected value=0 > Search for movie by genre.. </option>
                        <?php foreach($genres as $genre) :?>
                        <option <?php if(isset($chosen) && $chosen == $genre["GenreID"]) : echo "selected"; endif;?> value="<?php echo $genre["GenreID"] ?>"> <?php echo $genre["Name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-outline-secondary" style="font-size: 0.85rem;"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <?php if(isset($_SESSION["Role"]) && $_SESSION["Role"] == "admin") : ?>
            <a href="?action=show_add_form" class="btn btn-custom">Add New Movie</a>
            <?php endif; ?>
        </div>
        <div class="row py-4">
        <h3 class="section-title h3" style="background-color: #f8f9fa;">MOVIES</h3>
            <?php foreach($movies as $movie) : ?>
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
                                    <button type="button" class="btn btn-sm btn-outline-secondary btn-custom-view">
                                        <a href="?action=details&id=<?php echo $movie['MovieID'] ?>" class="text-decoration-none text-muted">View</a>
                                    </button>
                                    <?php 
                                        if(isset($user_movies)) :
                                            $exists = false;
                                            foreach($user_movies as $user_movie){
                                                if($user_movie["MovieID"] == $movie["MovieID"]){
                                                    $exists = true;
                                                    break;
                                                }
                                            }
                                            if(!$exists) :
                                    ?>
                                    <form method="POST">
                                        <input hidden name="action" value="add_item_to_cart"/>
                                        <input hidden name="UserID" value="<?php echo $_SESSION["UserID"] ?>"/>
                                        <input hidden name="MovieID" value="<?php echo $movie["MovieID"] ?>"/>
                                        <button type="submit" class="btn btn-sm btn-outline-secondary btn-custom-shop">Shop</button>
                                    </form>
                                    <?php endif; endif;?>
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





