<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Detection Web Application</title>
    <script src="https://cdn.jsdelivr.net/npm/inferencejs"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css"/>
    <script>
        const CONFIDENCE_THRESHOLD = 0.1; 
        var publishable_key = "rf_AGcg1lYYjyLdL1BmOGQXNiLfUFa2";  
        const MODEL_NAME = "cloud-qthye";
        const MODEL_VERSION = 1;
    </script>
</head>
<body style="background-color: aliceblue;" onload="disableInference()">
    <!-- Hero Section -->
    <header class="hero text-center">
        <div>
            <h1>Explore the World of Clouds</h1>
            <p>Discover cloud types, patterns, and their secrets in weather forecasting.</p>
            <a href="Views/ObjectDetection.html" class="btn btn-light btn-lg mt-3">Get Started</a>
        </div>
    </header>

    <!-- About Cloud Detection Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4">What is Cloud Detection?</h2>
        <p class="lead text-center">Cloud detection involves identifying and analyzing cloud types and their characteristics to predict weather, understand climate patterns, and assist in various environmental studies.</p>
    </section>

    <!-- Feature Highlights Section -->
    <section class="container my-5">
        <h3 class="text-center mb-4">Features</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                <a href="Views/WeatherForecast.html">
                    <img src="images/Weather_Forecast.png" alt="Weather Forecast" class="img-fluid mb-3" style="height: 100px;"> 
                </a>
                <h4>Weather Forecast</h4>
                <p>Select your current location and see the upcoming weather that is ahead of you!</p>
            </div>
            <div class="col-md-4 text-center">
                <a href="Views/CloudLearning.html">
                    <img src="images/Cloud_Learning.png" alt="Learning Center" class="img-fluid mb-3" style="height: 100px;">
                </a>
                <h4>Learning Center</h4>
                <p>Learn about cloud types, patterns, and their role in atmospheric conditions.</p>
            </div>
            <div class="col-md-4 text-center">
                <a href="Views/ObjectDetection.html">
                    <img src="images/Live_Detection.png" alt="Live Detection" class="img-fluid mb-3" style="height: 100px;">
                </a>
                <h4>Live Detection</h4>
                <p>Use live video to detect cloud patterns.</p>
            </div>
        </div>
    </section>
    <section class="container my-5">
        <h3 class="text-center mb-4">Explore Cloud Types</h3>
        <div class="row">
            <div class="col-6 col-md-3 text-center mb-4">
                <img src="images/cumulus.jpg" alt="Cumulus Cloud" class="img-fluid rounded" style="height: 150px;">
                <p>Cumulus</p>
            </div>
            <div class="col-6 col-md-3 text-center mb-4">
                <img src="images/cirrus.jpg" alt="Cirrus Cloud" class="img-fluid rounded" style="height: 150px;">
                <p>Cirrus</p>
            </div>
            <div class="col-6 col-md-3 text-center mb-4">
                <img src="images/Stratus.jpeg" alt="Stratus Cloud" class="img-fluid rounded" style="height: 150px;">
                <p>Stratus</p>
            </div>
            <div class="col-6 col-md-3 text-center mb-4">
                <img src="images/nimbostratus.jpg" alt="Nimbostratus Cloud" class="img-fluid rounded" style="height: 150px;">
                <p>Nimbostratus</p>
            </div>
        </div>
    </section>
    <section class="container my-5">  
        <h3 class="text-center mb-4">Cloud Classification</h3>
        <p class="lead text-center">Upload a cloud image and see the magic of object detection</p>
        <div class="row">
            <div class="col-sm-7">
                <input type="file" class="form-control mt-2" id="imageUpload" accept="image/*" name="image" id="file" />
            </div>
            <div class="col-sm-5">
                <button type="button" class="btn btn-primary mt-2" id="runInferenceButton">Run prediction</button>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-7 mt-3">
                <canvas id="output_canvas" class="img-fluid rounded rounded mx-auto d-block" style="max-height: 500px ;max-width: 400px;"></canvas>
            </div>
            <div class="col-sm-5 mt-3">
                <pre id="regexString" class="bg-dark text-white p-2" >Inference Results:</pre>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2024 Cloud Detection Web Application</p>
        </div>
    </footer>
    <script src="Script/index.js"></script>
</body>
</html>
