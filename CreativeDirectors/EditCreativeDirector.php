
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<style>
.dz-image img{
   width: 100%;
   height: 100%;
}
</style>


<form method = "POST" enctype="multipart/form-data" id="editForm">
    <input hidden name="action" value="edit_director"/>
    <input hidden name="directorID" value="<?php echo $director["CreativeDirectorID"] ?>"/>
    <input hidden name="oldImageUrl" value="<?php echo $director["DirectorImageUrl"] ?>" />

    <input type="hidden" name="ImageUrl" id="imageUrl" value="<?php echo $director["DirectorImageUrl"] ?>" />
    <div id="dropzone-upload" class="dropzone"></div>

    <label>Full Name</label>
    <input type="input" name="FullName" value = "<?php echo $director["FullName"] ?>"/>

    <label>Biography</label>
    <input type="input" name="Biography" value = "<?php echo $director["Biography"] ?>"/>

    <label>BirthDate</label>
    <input type="date" name="BirthDate" value = "<?php echo $director["BirthDate"] ?>"/>

    <label>Nationality</label>
    <input type="input" name="Nationality" value = "<?php echo $director["Nationality"] ?>"/>

    <button type="submit">Edit</button>
</form>

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

            var existingImageUrl = "<?php echo $director["DirectorImageUrl"] ?>";
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