
<?php 
    if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
        $error = "You dont have permision for this page";
        header("Location: ../errors/error.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            color: #333;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #navbar {
            flex-shrink: 0;
        }

        #main {
            flex-grow: 1;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
            overflow-y: auto;
            height: calc(100vh - 70px);
        }

        #dropzone-upload {
            width: 100%;
            height: 100px;
            border: 2px dashed #007b5e;
            border-radius: 8px;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #007b5e;
            margin-bottom: 20px;
        }

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

        .form-label {
            font-weight: bold;
            color: #007b5e;
        }

        .form-control {
            border-radius: 5px;
            width: 600px;
            border-color: #ced4da;
        }

        .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div id="navbar">
        <?php 
            require("../View/navBar.php");
        ?>
    </div>
    <div id="main">
        <h4 class="section-title" style="background-color: #f8f9fa;">Add Movie</h4>
        <form action="index.php" method="post" enctype="multipart/form-data" id="addForm">
            <input type="hidden" name="action" value="add_movie" />

            <div class="mb-3">
                <label for="genres" class="form-label">Genres:</label>
                <select name="genre_ids[]" id="genres" class="form-control" multiple>
                    <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo $genre['GenreID']; ?>">
                            <?php echo $genre['Name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="actors" class="form-label">Actors:</label>
                <select name="actor_ids[]" id="actors" class="form-control" multiple>
                    <?php foreach ($actors as $actor) : ?>
                        <option value="<?php echo $actor['ActorID']; ?>">
                            <?php echo $actor['FullName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="creative_director" class="form-label">Creative Director:</label>
                <select name="director_id" id="creative_director" class="form-control">
                    <?php foreach ($creative_directors as $director) : ?>
                        <option value="<?php echo $director['CreativeDirectorID']; ?>">
                            <?php echo $director['FullName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control" required />
            </div>

            <input type="hidden" name="ImageUrl" id="imageUrl" />
            <div id="dropzone-upload" class="dropzone">Drag & Drop Image or Click to Upload</div>

            <div class="d-grid">
                <input type="submit" value="Add" class="btn btn-custom" />
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.dropzoneUpload = {
            url: "../upload_photo.php",
            paramName: "photo",
            maxFilesize: 20,
            maxFiles: 1,
            acceptedFiles: "image/*",
            autoProcessQueue: false,
            init: function() {
                var myDropzone = this;
                this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
                });
                document.getElementById("addForm").addEventListener("submit", function(e) {
                    e.preventDefault();
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        this.submit();
                    }
                });
                this.on("success", function(file, response) {
                    const jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                        document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                        document.getElementById("addForm").submit();
                    } else {
                        console.error(jsonResponse.error);
                    }
                });
            }
        };
    </script>
</body>
</html>
