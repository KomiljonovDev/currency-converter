<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

<div class="container text-center">
    <h1 class="my-4">Weather in <span id="city-name">Tashkent</span></h1>

    <div class="weather-card text-center">
        <div class="mb-3">
            <img id="weather-icon" src="" alt="Weather Icon" class="weather-icon">
        </div>
        <h2 class="mb-3" id="temperature">5°C</h2>
        <p id="description">Clear Sky</p>

        <div class="d-flex justify-content-around">
            <div>
                <h5>Feels Like</h5>
                <p id="feels-like">3°C</p>
            </div>
            <div>
                <h5>Humidity</h5>
                <p id="humidity">61%</p>
            </div>
            <div>
                <h5>Wind</h5>
                <p id="wind-speed">3 m/s</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Sample API data
    const weatherData = {
        "coord": {"lon": 69.2787, "lat": 41.3123},
        "weather": [{"id": 800, "main": "Clear", "description": "clear sky", "icon": "01d"}],
        "main": {
            "temp": 278.95,
            "feels_like": 276.55,
            "humidity": 61,
        },
        "wind": {"speed": 3.09},
        "sys": {"country": "UZ"},
        "name": "Tashkent",
    };

    // Update UI with data
    document.getElementById('city-name').textContent = weatherData.name;
    document.getElementById('temperature').textContent = `${(weatherData.main.temp - 273.15).toFixed(1)}°C`;
    document.getElementById('feels-like').textContent = `${(weatherData.main.feels_like - 273.15).toFixed(1)}°C`;
    document.getElementById('humidity').textContent = `${weatherData.main.humidity}%`;
    document.getElementById('wind-speed').textContent = `${weatherData.wind.speed} m/s`;
    document.getElementById('description').textContent = weatherData.weather[0].description;
    document.getElementById('weather-icon').src = `http://openweathermap.org/img/wn/${weatherData.weather[0].icon}@2x.png`;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
