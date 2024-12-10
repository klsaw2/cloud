<?php

// Check if an image file was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the uploaded file content and encode it in Base64
    $image_path = $_FILES['image']['tmp_name'];
    $data = base64_encode(file_get_contents($image_path));

    $api_key = "cTSbJNCYJDdRgyjLXcAJ"; // Set API Key
    $model_endpoint = "cloud-qthye/1"; // Set model endpoint

    // URL for HTTP Request
    $url = "https://detect.roboflow.com/" . $model_endpoint
    . "?api_key=" . $api_key
    . "&name=" . $_FILES['image']['name']; // Use uploaded image's name

    // Setup and Send HTTP request
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => $data
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Error occurred during the API request.";
    } else {
        echo $result; // Output the API response
    }
} else {
    echo "No image uploaded or an error occurred during upload.";
}

?>
