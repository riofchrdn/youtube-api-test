<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics,contentDetails,invideoPromotion&id=UCnCnWrrvgh7Is24mMAeZFiQ&key=AIzaSyAJhmsIfYl7lhj5ajP2Wb4PGKS--fAr0FM');

$youtubepic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];

$youtubetitle = $result['items'][0]['snippet']['title'];

$youtubesubs = $result['items'][0]['statistics']['subscriberCount'];

$youtubedes = $result['items'][0]['snippet']['description'];

$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAJhmsIfYl7lhj5ajP2Wb4PGKS--fAr0FM&channelId=UCnCnWrrvgh7Is24mMAeZFiQ&maxResults=1&order=date&part=snippet';

$result = get_CURL($urlLatestVideo);

$LatestVideoID = $result['items'][0]['id']['videoId'];
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>CURL API TESTING</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home"><?= $youtubetitle; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#portfolio">Portfolio</a>
          </li> -->
                </ul>
            </div>
        </div>
    </nav>


    <div class="jumbotron" id="home">
        <div class="container">
            <div class="text-center">
                <img src="<?= $youtubepic; ?>" class="rounded-circle img-thumbnail">
                <h1 class="display-4"><?= $youtubetitle; ?></h1>
                <h3 class="lead">Youtuber</h3>
            </div>
        </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 text-center">
                    <p><?= $youtubedes; ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Youtube & Instagram -->
    <section class="social bg-light" id="social">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Social Media</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row mt-3 pb-3">
                        <div class="col-md-4">
                            <img src="<?= $youtubepic; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5><?= $youtubetitle; ?></h5>
                            <p><?= $youtubesubs; ?> Subscribers</p>
                            <div class="g-ytsubscribe" data-channelid="UCnCnWrrvgh7Is24mMAeZFiQ" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $LatestVideoID; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>Copyright &copy; RioFachrudin.</p>
                </div>
            </div>
        </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>

</body>

</html>