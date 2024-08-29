<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo htmlspecialchars($actor['FullName']); ?> - Actor Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: #333;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .actor-image {
            width: 100%;
            max-width: 240px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .actor-details {
            overflow: hidden;
        }
        .actor-details h2 {
            margin-top: 0;
            color: #007b5e;
        }
        .actor-details p {
            margin: 5px 0;
        }
        .actor-details ul {
            list-style-type: none;
            padding: 0;
        }
        .actor-details ul li {
            margin-bottom: 5px;
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
        .btn-container {
            display: flex;
            gap: 5px;
            margin-top: 20px;
            justify-content: flex-end;
        }
        .btn-container form {
            margin: 0;
        }
        .btn-container a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php 
        require("../View/navBar.php");
    ?>
    <div class="container">
        <div class="actor-details">
            <h2><?php echo htmlspecialchars($actor['FullName']); ?></h2>
            <div class="row">
                <div class="col-md-4">
                    <img class="actor-image" src="<?php echo htmlspecialchars($actor['ActorImageUrl']); ?>" alt="<?php echo htmlspecialchars($actor['FullName']); ?>">
                </div>
                <div class="col-md-8">
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($actor['FullName']); ?></p>
                    <p><strong>Birth Date:</strong> <?php echo htmlspecialchars($actor['BirthDate']); ?></p>
                    <p><strong>Biography:</strong> <?php echo htmlspecialchars($actor['Biography']); ?></p>
                    <p><strong>Nationality:</strong> <?php echo htmlspecialchars($actor['Nationality']); ?></p>
                    <p><strong>Movies:</strong></p>
                    <ul>
                        <?php foreach($movies as $movie) : ?>
                            <li><?php echo htmlspecialchars($movie['Title']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="btn-container">
            <?php if (isset($_SESSION["Role"]) && $_SESSION["Role"] == "admin") : ?>
                <form method="POST" action="index.php">
                    <input type="hidden" name="action" value="delete_actor"/>
                    <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor['ActorID']); ?>"/>
                    <input type="hidden" name="ImageUrl" value="<?php echo htmlspecialchars($actor['ActorImageUrl']); ?>"/>
                    <button type="submit" class="btn btn-delete btn-sm">Delete</button>
                </form>
                <form method="GET" action="index.php">
                    <input type="hidden" name="action" value="show_edit_form"/>
                    <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor['ActorID']); ?>"/>
                    <button type="submit" class="btn btn-edit btn-sm">Edit</button>
                </form>
            <?php endif; ?>
            <button type="button" class="btn btn-go-back btn-sm">
                <a href="../Actors" class="text-decoration-none text-white">Go Back</a>
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
