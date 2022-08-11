<?php
require_once 'includes/config.php';
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
<a class="navbar-brand" href="index.php"><?php echo $site_name ?></a>
</div>
<ul class="nav navbar-nav">
<li class="active"><a href="index.php">Home</a></li>
<li><a href="forecast.php">Forecast</a></li>
<li><a href="about.php">About</a></li>
</ul>
</div>
</nav>
</div>


<div class="container">

<?php
$news_url = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=" .urlencode($news_api_key);
$news_json = file_get_contents($news_url);
$news_array = json_decode($news_json, true);
    ?>
    

    <div class="page-header">
    <h1>Business News</h1>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
<div class="carousel-inner">
<div class="item active">
<a href="<?php echo $news_array['articles'][0]['url']; ?>"><img src="<?php echo $news_array['articles'][0]['urlToImage']; ?>" alt="Los Angeles" style="width:100%;"></a>
<div class="carousel-caption">
<h3><?php echo $news_array['articles'][0]['title']; ?></h3>
<p><?php echo $news_array['articles'][0]['description']; ?></p>
</div>
</div>
<div class="item">
<a href="<?php echo $news_array['articles'][1]['url']; ?>"><img src="<?php echo $news_array['articles'][1]['urlToImage']; ?>" alt="Chicago" style="width:100%;"></a>
<div class="carousel-caption">
<h3><?php echo $news_array['articles'][1]['title']; ?></h3>
<p><?php echo $news_array['articles'][1]['description']; ?></p>
</div>
</div>
<div class="item">
<a href="<?php echo $news_array['articles'][2]['url']; ?>"><img src="<?php echo $news_array['articles'][2]['urlToImage']; ?>" alt="New York" style="width:100%;"></a>
<div class="carousel-caption">
<h3><?php echo $news_array['articles'][2]['title']; ?></h3>
<p><?php echo $news_array['articles'][2]['description']; ?></p>
</div>
</div>
</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
</body>
</html>


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





