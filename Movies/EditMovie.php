
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<style>
    .dz-image img{
        width: 100%;
        height: 100%;
    }
    #dropzone-upload{
        width: 200px;
        height: 200px;
    }
</style>

<div id="main">
    <h1>Edit Movie</h1>
    <form action="index.php" method="post" enctype="multipart/form-data" id="editForm">
        <input type="hidden" name="action" value="edit_movie" />
        <input hidden name="id" value="<?php echo $movie["MovieID"] ?>"/>
        <label>Genres for this movie:</label>
        <?php foreach ($movie_genres as $genre) : ?>
          <?php echo $genre['Name']; ?>
        <?php endforeach; ?>
        <br />
        <label for="genres">Choose new genres:</label>
        <select name="genre_ids[]" id="genres" multiple>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['GenreID']; ?>">
                    <?php echo $genre['Name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Actors in this movie:</label>
        <?php foreach ($movie_actors as $actor) : ?>
          <?php echo $actor['FullName']; ?>
        <?php endforeach; ?>
        <br />
        <label for="actors">Choose new actors:</label>
        <select name="actor_ids[]" id="actors" multiple>
            <?php foreach ($actors as $actor) : ?>
                <option value="<?php echo $actor['ActorID']; ?>">
                    <?php echo $actor['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Creative Director for this movie: </label>
        <span><?php echo $movie['DirectorName'] ?></span>
        <br />
        <label for="creative_director">Choose new creative Director:</label>
        <select name="director_id" id="creative_director">
            <?php foreach ($creative_directors as $director) : ?>
                <option value="<?php echo $director['CreativeDirectorID']; ?>">
                    <?php echo $director['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Title</label>
        <input type="input" name="title" value="<?php echo $movie["Title"] ?>"/>
        <br />
        <label>Duration</label>
        <input type="input" name="duration" value="<?php echo $movie["Duration"] ?>"/>
        <br />
        <label>Description</label>
        <input type="input" name="description" value="<?php echo $movie["Description"] ?>"/>
        <br />
        <label>Price</label>
        <input type="input" name="price" value="<?php echo $movie["Price"] ?>"/>
        <br />
        <label>Publication Date</label>
        <input type="date" name="publication_date" value="<?php echo $movie["PublicationDate"] ?>"/>
        <br />

        <input hidden name="oldImageUrl" value="<?php echo $movie["MovieImageUrl"] ?>" />
        <input type="hidden" name="ImageUrl" id="imageUrl" value="<?php echo $movie["MovieImageUrl"] ?>" />
        <div id="dropzone-upload" class="dropzone"></div>

        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Edit" />
        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="../Movies" class="text-decoration-none">Go Back</a></button>
        <br />
    </form>
</div>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneUpload = {
        url: "../upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        maxFiles:1,
        acceptedFiles: "image/*",
        autoProcessQueue: false,
        init: function(){
            var myDropzone = this;

            var existingImageUrl = "<?php echo $movie["MovieImageUrl"] ?>";
            var name = existingImageUrl.split("/");
            var type = existingImageUrl.split(".");
            var mockFile = { name: name[name.length-1], size: 200000, type: "image/" + type[type.length-1] };

            myDropzone.emit("addedfile", mockFile);
            myDropzone.emit("thumbnail", mockFile, existingImageUrl);
            myDropzone.emit("complete", mockFile);
            
            myDropzone.files.push(mockFile);


            this.on("addedfile", function(file){
                if(this.files.length > 1){
                    this.removeFile(this.files[0]);
                }
            });

            document.getElementById("editForm").addEventListener("submit", function(e){
                e.preventDefault();

                if(myDropzone.getQueuedFiles().length > 0){
                    myDropzone.processQueue();
                }else{
                    document.getElementById("editForm").submit(); // ako nema slika prikacheno kje napravem submit i kje pokazhe error deka nema ImageUrl
                }
            });
            this.on("success", function (file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                    document.getElementById("editForm").submit();
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    }

</script>