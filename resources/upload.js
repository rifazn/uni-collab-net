/**
 * Created by remi on 17/01/15.
 */
(function () {

    var uploadfiles = document.querySelector('#uploadfiles');
    //console.log('this function is getting fired.');
    uploadfiles.addEventListener('change', function () {
    	
    	//console.log('Upload event is being listened...');
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i]);
        }

    }, false);


    /**
     * Upload a file
     * @param file
     */
    function uploadFile(file){
    	//console.log('uploadFile() is getting called.');
    	
        var url = "uploadPics.php";
        var xhr = new XMLHttpRequest();
        var fd = new FormData();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Every thing ok, file uploaded
                console.log(xhr.responseText); // handle response.
            }
        };
        fd.append('uploaded_file', file);
        xhr.send(fd);
    }
}());
