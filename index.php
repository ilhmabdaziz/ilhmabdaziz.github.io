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

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCVf9OgfBorJZPwCrR4Kku8w&key=AIzaSyCyYLVE0J95FZZf8uH915WF5KG8Q34FQhQ');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCyYLVE0J95FZZf8uH915WF5KG8Q34FQhQ&channelId=UCVf9OgfBorJZPwCrR4Kku8w&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$latesVideoId = $result['items'][0]['id']['videoId'];


// Instagram API
$clientID = '800656694195609';
$accessToken = 'IGQVJYM0Y3Vl9ucDd1ZAE9WT0wyNkYzeFhFcUY0akRkdy1lN1dvWk1fWWhRdVVHMUZAQcnh6SzVuUUlFMkNyei1xY3FlcTZAFYXd0ekxhcXQ3bVd2Wm1kaXdETmo5MXYyQkF5eWpJM2pnek0xN1ZAwMm9BRwZDZD';
$id_profile = '222433512';
$id_media = '18034196758235934';
$id_user = '17841401005363475';

//profile
$result = get_CURL('https://graph.instagram.com/17841401005363475?fields=account_type,id,media_count,username&access_token=IGQVJYM0Y3Vl9ucDd1ZAE9WT0wyNkYzeFhFcUY0akRkdy1lN1dvWk1fWWhRdVVHMUZAQcnh6SzVuUUlFMkNyei1xY3FlcTZAFYXd0ekxhcXQ3bVd2Wm1kaXdETmo5MXYyQkF5eWpJM2pnek0xN1ZAwMm9BRwZDZD');
$usernameIG = $result['username'];

//photo&video
$result = get_CURL('https://graph.instagram.com/18034196758235934?fields=id,media_type,media_url,username,timestamp&access_token=IGQVJYM0Y3Vl9ucDd1ZAE9WT0wyNkYzeFhFcUY0akRkdy1lN1dvWk1fWWhRdVVHMUZAQcnh6SzVuUUlFMkNyei1xY3FlcTZAFYXd0ekxhcXQ3bVd2Wm1kaXdETmo5MXYyQkF5eWpJM2pnek0xN1ZAwMm9BRwZDZD');
$videoIG = $result['media_url'];





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

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">My Portfolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile3.jpg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Ilham Abdul Aziz</h1>
          <h3 class="lead">ilhmabdaziz@yahoo.com | 081248073455</h3>
          <h3 class="lead">https://www.linkedin.com/in/ilham-abdul-aziz-a42942208/</h3>

        </div>
      </div>
    </div>


    <!-- About -->
    <div class="about" id="about">
      <div class="container mb-5">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>Born on Serng Banten , June 05th 1995. I like something new and like unique designs . Friendly and communicative, Like to join a community that has apositive impact on me.  </p>
          </div>
          <!-- <div class="col-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus, debitis earum.</p>
          </div> -->
        </div>
      </div>
</div>


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
            <div class="row">
              <div class="col-md-4">
              <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5><?= $channelName; ?></h5>
              <p><?= $subscriber; ?> Subscribers.</p>
              <div class="g-ytsubscribe" data-channelid="UCVf9OgfBorJZPwCrR4Kku8w" data-layout="default" data-count="default"></div>
            </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latesVideoId; ?>?rel=0" allowfullscreen></iframe>

                </div>
              
              </div>
            </div>
          </div>
          <div class="col-md-5">
              <div class="row">
                <div class="col-md-4">
                  <img src="img/profile1.png" width="200" class="rounded-circle img-thumbnail">
                </div>
                <div class="col-md-8">
                  <h5>@<?= $usernameIG; ?></h5>
                  <p>507 Followers.</p>
                </div>
              </div>
              <div class="row mt-3 pd-3">
                <div class="col">
                  <div class="ig-thumbnail">
                    <!-- <img src="<?= $videoIG; ?>" > -->
                    <img src="img/thumbs/1.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/2.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/3.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/4.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/5.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/6.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/7.jpg" >
                  </div>
                  <div class="ig-thumbnail">
                    <img src="img/thumbs/8.jpg" >
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Project experience</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/Rolling.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Pembuatan website company profile sebuah perusahaan Java Constructor pembuatan rolling door dibuat menggunakan bahasa pemograman PHP dengan framework codeigniter 3, bootstrap 4 dan MYSQL serta menggunakan CSS sebagai pendukung interface</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/Batik.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Clustering pola batik Lasem menggunakan Jaringan Syaraf Tiruan Self Organizing Map(SOM), perangkat lunak yang digunakan adalah MATLAB R2019b .</p>
              </div>
            </div>
          </div>

          <!-- <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text"></p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Taman Graha Asri Blok H2 No 2 Serang Banten</li>
              <li class="list-group-item">Banten, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Zizsy Copyright &copy; 2021.</p>
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