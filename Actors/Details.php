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
        .btn-custom {
            background-color: #007b5e;
            border-color: #007b5e;
            font-size: 0.875rem;
            color: white;
        }
        .btn-custom:hover {
            background-color: #005f43;
            border-color: #004d35;
            color: white;
        }
        .btn-container {
            display: flex;
            gap: 10px;
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
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="../Actors" class="text-decoration-none">Go Back</a></button>
            <form method="POST" action="index.php">
                <input type="hidden" name="action" value="delete_actor"/>
                <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor['ActorID']); ?>"/>
                <input type="hidden" name="ImageUrl" value="<?php echo htmlspecialchars($actor['ActorImageUrl']); ?>"/>
                <button type="submit" class="btn btn-custom">Delete</button>
            </form>
            <form method="GET" action="index.php">
                <input type="hidden" name="action" value="show_edit_form"/>
                <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor['ActorID']); ?>"/>
                <button type="submit" class="btn btn-custom">Edit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

