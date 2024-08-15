<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Actor</title>
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

        #actor-image {
            width: 100%;
            margin-left: 90%;
            height: 260px;
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
            margin-top: 30px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        .dz-image img {
            max-width: 100%;
            height: auto; 
            object-fit: contain; 
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
        <?php require("../View/navBar.php"); ?>
    </div>
    <div id="main" style="width: 600px;">
        <h4 class="section-title" style="background-color: #f8f9fa;">Edit Actor</h4>
        <form method="POST" enctype="multipart/form-data" id="editForm">
            <input hidden name="action" value="edit_actor"/>
            <input hidden name="actorID" value="<?php echo $actor['ActorID'] ?>"/>
            <input hidden name="oldImageUrl" value="<?php echo $actor['ActorImageUrl'] ?>" />

            <div class="mb-3" style="width: 200px; height: 260px;">
                <img src="<?php echo $actor['ActorImageUrl'] ?>" id="actor-image" alt="Actor Image">
            </div>

            <div id="dropzone-upload" class="dropzone">Drag & Drop Image or Click to Upload</div>

            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" name="FullName" id="fullName" class="form-control" value="<?php echo $actor['FullName'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <input type="text" name="Biography" id="biography" class="form-control" value="<?php echo $actor['Biography'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="birthDate" class="form-label">Birth Date</label>
                <input type="date" name="BirthDate" id="birthDate" class="form-control" value="<?php echo $actor['BirthDate'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <input type="text" name="Nationality" id="nationality" class="form-control" value="<?php echo $actor['Nationality'] ?>" required />
            </div>

            <input type="hidden" name="ImageUrl" id="imageUrl" value="<?php echo $actor['ActorImageUrl'] ?>" />

            <div class="d-grid">
                <input type="submit" value="Edit" class="btn btn-custom" />
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="../Actors" class="text-decoration-none">Go Back</a></button>
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
                var existingImageUrl = "<?php echo $actor['ActorImageUrl'] ?>";
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

