<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $details['Title']; ?> - Movie Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            background: none;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .movie-poster {
            width: 100%;
            max-width: 300px;
            float: left;
            margin-right: 20px;
        }
        .movie-detailss {
            overflow: hidden;
        }
        .movie-detailss h2 {
            margin-top: 0;
        }
        .movie-detailss p {
            margin: 5px 0;
        }
        .movie-detailss ul {
            list-style-type: none;
            padding: 0;
        }
        .movie-detailss ul li {
            margin-bottom: 5px;
        }
        .clear {
            clear: both;
        }
        .btn-delete {
            background-color: #dc3545; /* Red color */
            border-color: #dc3545;
            color: white;
            font-size: 1rem;
        }
        .btn-delete:hover {
            background-color: #c82333; /* Darker red on hover */
            border-color: #bd2130;
        }
        .btn-edit {
            background-color: #6c757d; /* Muted color */
            border-color: #6c757d;
            color: white;
             font-size: 1rem;
        }
        .btn-edit:hover {
            background-color: #5a6268; /* Darker muted color on hover */
            border-color: #545b62;
        }
        .btn-go-back {
            background-color: #17a2b8; /* Light blue color */
            border-color: #17a2b8;
            color: white;
            font-size: 1rem;
        }
        .btn-go-back:hover {
            background-color: #138496; /* Darker light blue on hover */
            border-color: #117a8b;
        }
        .custom-btn-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
<?php 
    require("../View/navBar.php");
?>
<div class="container" style="margin-top: 40px; display: flex; position: relative;">
    <div style="width: 900px; height: 400px; margin-right: 20px;">
        <img style="height: 400px;" class="movie-poster" src="<?php echo $details['MovieImageUrl']; ?>" alt="<?php echo $details['Title']; ?>">
    </div>
    <div style="width: 1720px; height: 400px; display: flex; flex-direction: column; justify-content: space-between;">
        <div>
            <h2><?php echo $details['Title']; ?></h2>
            <p><strong>Description: </strong> <?php echo $details['Description']; ?></p>
            <p><strong>Duration:</strong> <?php echo $details['Duration']; ?> minutes</p>
            <p><strong>Creative Director:</strong> <?php echo $details['DirectorName']; ?></p>
            <p><strong>Genres: </strong>
            <?php foreach($genres as $genre) : ?>
                <?php echo $genre['Name'] ?>
            <?php endforeach; ?>
            </p>
            <p><strong>Actors: </strong>
                <?php foreach($actors as $actor) : ?>
                    <?php echo $actor['FullName'] ?>
                <?php endforeach; ?>
            </p>
            <p><strong>Price:</strong> <?php echo $details['Price'] ?> $</p>
        </div> 
    </div> 
</div>      
<?php
$marginLeft = isset($_SESSION["Role"]) && $_SESSION["Role"] == "admin" ? '67%' : '77%';
?>
<div style="display: flex; gap: 5px; margin-left: <?php echo $marginLeft; ?>; margin-top: 20px;">
    <?php if(isset($_SESSION["Role"]) && $_SESSION["Role"] == "admin") : ?>
    <form action="." method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="movie_id" value="<?php echo $details['MovieID']; ?>" />
        <input type="hidden" value="<?php echo $details["MovieImageUrl"] ?>" name="ImageUrl" />
        <input class="btn btn-sm btn-delete" type="submit" value="Delete" />
        <button type="button" class="btn btn-sm btn-edit">
            <a href="?action=show_edit_form&id=<?php echo $details['MovieID'] ?>" class="text-decoration-none text-white">Edit</a>
        </button>
    </form>
    <?php endif; ?>
    <button type="button" class="btn btn-sm btn-go-back">
        <a href="../Movies" class="text-decoration-none text-white">Go Back</a>
    </button>
</div>

<!-- Bootstrap JS (Popper.js is included with Bootstrap 5) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
