<?php require_once 'config.php'; ?>
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
                <li><a href="forecast.php">Forecast</a></li>
                <li class="active"><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>About</h1>
            <p>This is a weather forecast website. It uses an API from OpenWeatherMap.org to get the weather forecast for a city.</p>
        </div>
    </div>
