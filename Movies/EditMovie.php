<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
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
        }

        #movie-image {
            width: 100%;
            margin-left: 105%;
        }

        #dropzone-upload {
            width: 100%;
            height: 100px; /* Adjust height based on content */
            border: 2px dashed #007b5e;
            border-radius: 8px;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #007b5e;
            margin-top: 40px;
            margin-bottom: 20px;
            overflow: hidden; /* Ensure no overflow */
        }
        .dz-image img {
            max-width: 100%;
            height: auto; /* Maintain aspect ratio */
            object-fit: contain; /* Ensure image fits container */
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
            border-color: #ced4da;
        }

        .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .btn-outline-secondary {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div id="navbar">
        <?php 
            require("../View/navBar.php");
        ?>
    </div>
    <div id="main" style="width: 600px;">
        <h4 class="section-title" style="background-color: #f8f9fa;">Edit Movie</h4>
        <form method="post" enctype="multipart/form-data" id="editForm">
            <input type="hidden" name="action" value="edit_movie" />
            <input type="hidden" name="id" value="<?php echo $movie['MovieID'] ?>" />
            <div class="mb-3" style="width: 180px; height: 250px;">
                <img src="<?php echo $movie['MovieImageUrl'] ?>" id="movie-image" alt="Movie Image">
            </div>

            <!-- Dropzone upload area -->
            <div id="dropzone-upload" class="dropzone">Drag & Drop Image or Click to Upload</div>

            <!-- Movie information form fields -->
            <div class="mb-3">
                <label class="form-label">Genres for this movie:</label>
                <?php foreach ($movie_genres as $genre) : ?>
                    <span><?php echo $genre['Name']; ?></span>
                <?php endforeach; ?>
                <br />
                <label for="genres" class="form-label">Choose new genres:</label>
                <select name="genre_ids[]" id="genres" class="form-control" multiple>
                    <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo $genre['GenreID']; ?>">
                            <?php echo $genre['Name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Actors in this movie:</label>
                <?php foreach ($movie_actors as $actor) : ?>
                    <span><?php echo $actor['FullName']; ?></span>
                <?php endforeach; ?>
                <br />
                <label for="actors" class="form-label">Choose new actors:</label>
                <select name="actor_ids[]" id="actors" class="form-control" multiple>
                    <?php foreach ($actors as $actor) : ?>
                        <option value="<?php echo $actor['ActorID']; ?>">
                            <?php echo $actor['FullName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Creative Director for this movie:</label>
                <span><?php echo $movie['DirectorName'] ?></span>
                <br />
                <label for="creative_director" class="form-label">Choose new creative Director:</label>
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
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $movie['Title'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $movie['Duration'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="<?php echo $movie['Description'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="<?php echo $movie['Price'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="publication_date" class="form-label">Publication Date</label>
                <input type="date" name="publication_date" id="publication_date" class="form-control" value="<?php echo $movie['PublicationDate'] ?>" required />
            </div>

            <input type="hidden" name="oldImageUrl" value="<?php echo $movie['MovieImageUrl'] ?>" />
            <input type="hidden" name="ImageUrl" id="imageUrl" value="<?php echo $movie['MovieImageUrl'] ?>" />
            <div class="d-grid">
                <input type="submit" value="Edit" class="btn btn-custom" />
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="../Movies" class="text-decoration-none">Go Back</a></button>
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
                var existingImageUrl = "<?php echo $movie['MovieImageUrl'] ?>";
                var name = existingImageUrl.split("/").pop();
                var type = existingImageUrl.split(".").pop();
                var mockFile = { name: name, size: 200000, type: "image/" + type };

                myDropzone.emit("addedfile", mockFile);
                myDropzone.emit("thumbnail", mockFile, existingImageUrl);
                myDropzone.emit("complete", mockFile);
                myDropzone.files.push(mockFile);

                this.on("addedfile", function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });

                document.getElementById("editForm").addEventListener("submit", function(e) {
                    e.preventDefault();

                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        document.getElementById("editForm").submit();
                    }
                });

                this.on("success", function(file, response) {
                    const jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                        document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                        document.getElementById("editForm").submit();
                    } else {
                        console.error(jsonResponse.error);
                    }
                });
            }
        };
    </script>
</body>
</html>
