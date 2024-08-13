
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<div id="main">
    <h1>Add Movie</h1>
    <form action="index.php" method="post" enctype="multipart/form-data" id="addForm">
        <input type="hidden" name="action" value="add_movie" />
        <label for="genres">Genres:</label>
        <select name="genre_ids[]" id="genres" multiple>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['GenreID']; ?>">
                    <?php echo $genre['Name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label for="genres">Actors:</label>
        <select name="actor_ids[]" id="genres" multiple>
            <?php foreach ($actors as $actor) : ?>
                <option value="<?php echo $actor['ActorID']; ?>">
                    <?php echo $actor['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label for="creative_director">Creative Director:</label>
        <select name="director_id" id="creative_director">
            <?php foreach ($creative_directors as $director) : ?>
                <option value="<?php echo $director['CreativeDirectorID']; ?>">
                    <?php echo $director['FullName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        <label>Title</label>
        <input type="input" name="title"/>
        <br />
        <label>Duration</label>
        <input type="input" name="duration"/>
        <br />
        <label>Description</label>
        <input type="input" name="description"/>
        <br />
        <label>Price</label>
        <input type="input" name="price"/>
        <br />
        <label>Publication Date</label>
        <input type="date" name="publication_date"/>
        <br />
        <input type="hidden" name="ImageUrl" id="imageUrl"/>
        <div id="dropzone-upload" class="dropzone"></div>
        <br />
        <label>&nbsp;</label>
        <input type="submit" value="Add" />
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
            this.on("maxfilesexceeded", function(file){
               this.removeAllFiles();
               this.addFile(file);
            });
            document.getElementById("addForm").addEventListener("submit", function(e){
                e.preventDefault();

                if(myDropzone.getQueuedFiles().length > 0){
                    myDropzone.processQueue();
                }else{
                    this.submit; // ako nema slika prikacheno kje napravem submit i kje pokazhe error deka nema ImageUrl
                }
            });
            this.on("success", function (file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                    document.getElementById("addForm").submit();
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    }

</script>