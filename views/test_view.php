    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">Test Upload Resize</h4>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!--<h3 align="center"><?php /*echo $title;*/ ?></h3>  
                        <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                            <input type="file" name="image_file" id="image_file" />  
                            <br /><br />  
                            <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />                              
                        </form>                          <br /> <br />  
                        
                        <div id="uploaded_image">  
                            <?php /*echo $image_data;*/ ?>  
                        </div>  -->
                        <h1>Comprimir y Redimensionar una Imagen</h1>
                        <p>Cargue una imagen</p>
                        <input id="upload" type="file" accept="image/*" />
                        <div>
                            <h2>Imagen Original </h2> 
                            <img style="margin-top: 5px;" id="originalImage"  src=""  crossorigin="anonymous" />
                        </div>

                        <div style="margin-top: 5px;">
                            <span>Redimensione: </span>
                            <input type="range" min="1" max="100" value="80" id="resizingRange" />
                        </div>
                        
                        <div style="margin-top: 5px; margin-left: 8px;">
                            <span>Calidad: </span>
                            <input type="range" min="1" max="100" value="80" id="qualityRange" />
                        </div>
                        
                        <h2>Imagen Comprimida </h2>
                        <div><b>Size:</b> <span id="size"></span></div>
                        <img id="compressedImage" />
                        <div>
                            <button id="uploadButton">Enviar Imagen</button>
                        </div>
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
   
 <script>  


var fileInput = document.querySelector("#upload");

/*Imagen Original y la imagen comprimir*/
var originalImage = document.querySelector("#originalImage");
var compressedImage = document.querySelector("#compressedImage");

/* Definiciones de rango y calidad */
var resizingElement = document.querySelector("#resizingRange");
var qualityElement = document.querySelector("#qualityRange");

var uploadButton = document.querySelector("#uploadButton");

let compressedImageBlob;

let resizingFactor = 0.8;
let quality = 0.8;

//Inicializador de la compresacion de la imagen
compressImage(originalImage, resizingFactor, quality);

fileInput.addEventListener("change", async (e) => {
    const [file] = fileInput.files;
    // Variable que almacena la imagen original
    originalImage.src = await fileToDataUri(file);

    // comprimiendo la imagen cargada
    originalImage.addEventListener("load", () => {
        compressImage(originalImage, resizingFactor, quality);
    });

    return false;
});
//Redimensionamiento de la imagen
resizingElement.oninput = (e) => {
    resizingFactor = parseInt(e.target.value) / 100;
    compressImage(originalImage, resizingFactor, quality);
};
//Calidad de la imagen
qualityElement.oninput = (e) => {
    quality = parseInt(e.target.value) / 100;
    compressImage(originalImage, resizingFactor, quality);
};

uploadButton.onclick = () => {
    // Funcion que carga la imagen comprimida
    // Si esta presente la imagen
    if (compressedImageBlob) {
        const formdata = new FormData();
        formdata.append("image", compressedImageBlob);
        //Llamado a la funcion php para cargar la imagen
        fetch("traz-comp-notificaciones/notificacion/ajax_upload", {
            method: "POST",
            headers: {
                Accept: "application/json",
                Authorization: "Client-ID YOUR_CLIENT_ID"
            },
            body: formdata
        }).then((response) => {
            if (response?.status === 403) {
                alert("Unvalid Client-ID!");
            } else if (response?.status === 200) {
                // Aqui una vez guardada se recupera la imagen
                // que se acaba de subir
                response.json().then((jsonResponse) => {
                    alert(`URL: ${jsonResponse.data?.link}`);
                });
                alert("Upload completed succesfully!");
            } else {
                console.error(response);
            }
        });
    } else {
        alert("Rezind and compressed image missing!");
    }
};

function compressImage(imgToCompress, resizingFactor, quality) {
    // Funcion que muestra la imagen comprimida
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");

    const originalWidth = imgToCompress.width;
    const originalHeight = imgToCompress.height;

    const canvasWidth = originalWidth * resizingFactor;
    const canvasHeight = originalHeight * resizingFactor;

    canvas.width = canvasWidth;
    canvas.height = canvasHeight;

    context.drawImage(
        imgToCompress,
        0,
        0,
        originalWidth * resizingFactor,
        originalHeight * resizingFactor
    );

    // aca se reduce la calidad de la imagen
    canvas.toBlob(
        (blob) => {
            if (blob) {
                compressedImageBlob = blob;
                compressedImage.src = URL.createObjectURL(compressedImageBlob);
                document.querySelector("#size").innerHTML = bytesToSize(blob.size);
            }
        },
        "image/jpeg",
        quality
    );
}

function fileToDataUri(field) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            resolve(reader.result);
        });
        reader.readAsDataURL(field);
    });
}

function bytesToSize(bytes) {
    const sizes = ["Bytes", "KB", "MB", "GB", "TB"];

    if (bytes === 0) {
        return "0 Byte";
    }

    const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));

    return Math.round(bytes / Math.pow(1024, i), 2) + " " + sizes[i];
}



/* *************************************************************** */
 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                console.log(new FormData(this));
                $.ajax({  
                     url:"traz-comp-notificaciones/notificacion/ajax_upload",   
                      
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  