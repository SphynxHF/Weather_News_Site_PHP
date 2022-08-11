<?php
require_once 'includes/config.php';

//get users current city and country from ip address and set it variables

$data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='));

$country = $data['geoplugin_countryName'];
$state = $data['geoplugin_regionName'];
$city = $data['geoplugin_city'];
$ip = $data['geoplugin_request'];

// get the Current weather and forecast from OpenWeatherMap.org
$weather_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . ','. $state .'&APPID=' . $weather_api_key . '&units=imperial';
$weather_json = file_get_contents($weather_url);
$weather_array = json_decode($weather_json, true);

$weather_current = $weather_array['weather'][0]['description'];

$weather_temp = $weather_array['main']['temp'];

$weather_temp_min = $weather_array['main']['temp_min'];

$weather_temp_max = $weather_array['main']['temp_max'];

$weather_humidity = $weather_array['main']['humidity'];

$weather_wind = $weather_array['wind']['speed'];

$weather_icon = $weather_array['weather'][0]['icon'];

$weather_icon_url = 'https://openweathermap.org/img/w/' . $weather_icon . '.png';


// get the forecast from OpenWeatherMap.org
$weather_forecast_url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . ','. $state .'&APPID=' . $weather_api_key . '&units=imperial';

$weather_forecast_json = file_get_contents($weather_forecast_url);

$weather_forecast_array = json_decode($weather_forecast_json, true);


//display the weather forecast for the next 5 days in a bootstrap table

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php $page_title ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<style>
    body {
        background-color: #f2f2f2;
    }
</style>

<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Weather Forecast</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="forecast.php">Forecast</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Weather Forecast</h1>
        <p><?php echo 'Current weather in: '. $city . ','. $state ?></p>
        <p>Temperature: <?php echo $weather_temp; ?>&deg;F</p>
        <p>Temperature min: <?php echo $weather_temp_min; ?>&deg;F</p>
        <p>Temperature max: <?php echo $weather_temp_max; ?>&deg;F</p>
        <p>Humidity: <?php echo $weather_humidity; ?>%</p>
        <p>Wind: <?php echo $weather_wind; ?>MPH</p>
        <p><img src="<?php echo $weather_icon_url; ?>" alt="Weather Icon"></p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Date</th>
                <th>Weather</th>
                <th>Temperature</th>
                <th>Humidity</th>
                <th>Wind</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($weather_forecast_array['list'] as $item) {
                $weather_date = $item['dt_txt'];
                $weather_date = date('d-M-Y', strtotime($weather_date));
                $weather_weather = $item['weather'][0]['description'];
                $weather_temp = $item['main']['temp'];
                $weather_humidity = $item['main']['humidity'];
                $weather_wind = $item['wind']['speed'];
                ?>
                <tr>
                    <td><?php echo $weather_date; ?></td>
                    <td><?php echo $weather_weather; ?></td>
                    <td><?php echo $weather_temp; ?>&deg;F</td>
                    <td><?php echo $weather_humidity; ?>%</td>
                    <td><?php echo $weather_wind; ?>MPH</td>
                </tr>
                <?php
            }   // end of foreach
            ?>
            </tbody>
        </table>
    </div>
</body>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Copyright &copy; <?php echo $site_name ?> <?php echo date("Y"); ?></p>
        <p class="text-muted">
            <?php echo date('d-M-Y H:i:s'); ?>
            <br>
        </p>
    </div>
</footer>
</html>
