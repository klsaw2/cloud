function disableInference(){
    document.getElementById("runInferenceButton").disabled = true;
}

document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        document.getElementById("runInferenceButton").disabled = false;

        const reader = new FileReader();
        reader.onload = function(e) {
            selectedImage = file;  // Save the file for later use

            // Display the image on canvas
            const imageElement = new Image();
            imageElement.src = e.target.result;
            imageElement.onload = function() {
                const canvas = document.getElementById("output_canvas");
                canvas.width = imageElement.width;
                canvas.height = imageElement.height;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(imageElement, 0, 0);
            };
        };
        reader.readAsDataURL(file);
    }else{
        document.getElementById("runInferenceButton").disabled = true;
    }
});

// Run inference and send the image to index.php via AJAX POST request
document.getElementById('runInferenceButton').addEventListener('click', function() {
    if (!selectedImage) {
        console.error("No image selected.");
        return;
    }
    document.querySelector("#regexString").innerHTML = "";

    // Send image to index.php via AJAX POST request
    const formData = new FormData();
    formData.append("image", selectedImage);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "getImageInference.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Inference result received:", xhr.responseText);
            myJSON = xhr.responseText
            const myJSONString = JSON.stringify(myJSON);
            let regexString = "";
            // for tracking matches, in particular the curly braces
            const brace = {
            brace: 0
            };

            regexString = myJSONString.replace(
            /({|}[,]*|[^{}:]+:[^{}:,]*[,{]*)/g,
            (m, p1) => {
                const returnFunction = () =>
                `<div style="text-indent: ${brace["brace"] * 20}px;">${p1}</div>`;
                let returnString = 0;
                if (p1.lastIndexOf("{") === p1.length - 1) {
                returnString = returnFunction();
                brace["brace"] += 1;
                } else if (p1.indexOf("}") === 0) {
                brace["brace"] -= 1;
                returnString = returnFunction();
                } else {
                returnString = returnFunction();
                }
                return returnString;
            }
            );

        document.querySelector("#regexString").innerHTML += regexString;
        } else {
            console.error("Error during inference:", xhr.statusText);
        }
    };
    xhr.send(formData);
});