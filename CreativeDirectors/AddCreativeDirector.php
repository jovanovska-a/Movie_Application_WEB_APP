
<?php 
    if(!isset($_SESSION["Role"]) || $_SESSION["Role"] != "admin") {
        header("Location: ../errors/unauthorized.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Director</title>
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
            margin: 0;
            padding: 0;
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
            max-width: 600px;
            margin: 20px auto;
            overflow-y: auto;
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

        .form-label {
            font-weight: bold;
            color: #007b5e;
        }

        .form-control {
            border-radius: 5px;
            border-color: #ced4da;
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

        .text-center {
            color: #007b5e;
            margin-bottom: 20px;
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
        <h4 class="text-center">Add Director</h4>
        <form action="index.php" method="POST" enctype="multipart/form-data" id="addForm">
            <input type="hidden" name="action" value="add_director" />
            <input type="hidden" name="ImageUrl" id="imageUrl" />
            <div id="dropzone-upload" class="dropzone">Drag & Drop Image or Click to Upload</div>

            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" name="FullName" id="fullName" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea name="Biography" id="biography" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="birthDate" class="form-label">Birth Date</label>
                <input type="date" name="BirthDate" id="birthDate" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" name="Nationality" id="nationality" class="form-control" required />
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Add</button>
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
                        document.getElementById("addForm").submit();
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
