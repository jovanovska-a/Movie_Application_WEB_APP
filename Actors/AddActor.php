
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />



<form action="index.php" method = "POST" enctype="multipart/form-data">
    <input hidden name="action" value="add_actor"/>

    <input type="hidden" name="ImageUrl" id="imageUrl"/>
    <div id="dropzone-upload" class="dropzone"></div>

    <label>Full Name</label>
    <input type="input" name="FullName"/>

    <label>Biography</label>
    <input type="input" name="Biography"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate"/>

    <label>Nationality</label>
    <input type="input" name="Nationality"/>

    <button type="submit">Add</button>
</form>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzoneUpload = {
        url: "../upload_photo.php",
        paramName: "photo",
        maxFilesize: 20,
        maxFiles:1,
        acceptedFiles: "image/*",
        init: function(){
            this.on("maxfilesexceeded", function(file){
               this.removeAllFiles();
               this.addFile(file);
            });
            this.on("success", function (file, response){
                const jsonResponse = JSON.parse(response);
                if(jsonResponse.success){
                    document.getElementById("imageUrl").value = jsonResponse.ImageUrl;
                }else{
                    console.error(jsonResponse.error);
                }
            });
        }
    }

</script>