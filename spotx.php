
<!DOCTYPE html>
<?php

require('head.php');
?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotX - Esplora le ultime novità</title>
   
    <link rel="stylesheet" href="style.css">
</head>
<?php

echo('<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
              
                <a class="navbar-brand" href="spotx.php">SpotX</a>
                <form class="form-inline mr-auto ">
                    <input class="form-control search-bar mr-sm-2" type="search" id="searchInput" placeholder="Cerca" aria-label="Cerca">
                    <button class="btn btn-play search-btn my-2 my-sm-0" type="button" onclick="searchSongs()">Cerca</button>
                </form>
                <!-- <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../register_login/login.html">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register_login/register.html">Registrati</a>
                    </li>
                </ul> -->
            </div>
        </nav>
    </header>
    
    <main>
        <section class="featured" id="songsList">
            <h2>Ultime novità</h2>');

            
    $novita = array(
        array(
            "img"=>"../img/images.jfif",
            "titolo"=>"Cadere",
            "autore"=>"Tony Boy",
            "audio"=>"../songs/tonyboy.mp3"
        ),
        array(
            "img"=>"../img/trevis.jfif",
            "titolo"=>"GooseBumps",
            "autore"=>"Travis Scott",
            "audio"=>"../songs/tonyboy.mp3"
        ),
        array(
            "img"=>"../img/rondo.jfif",
            "titolo"=>"Piccola Star",
            "autore"=>"RondoDaCorsa",
            "audio"=>"../songs/tonyboy.mp3"
        ),
        array(
            "img"=>"../img/star.jfif",
            "titolo"=>"StarBoy",
            "autore"=>"The weekend",
            "audio"=>"../songs/tonyboy.mp3"
        ),
        array(
            "img"=>"../img/maroon.jfif",
            "titolo"=>"Cold",
            "autore"=>"Marrons 5",
            "audio"=>"../songs/tonyboy.mp3"
        ),
        array(
            "img"=>"../img/hip.jfif",
            "titolo"=>"HipHop Chilling",
            "autore"=>"Flinkies",
            "audio"=>"../songs/tonyboy.mp3"
        )
    );

    foreach($novita as $key => $el){
        ?>
        <div class="song">
            <img src="<?php echo($el["img"]) ?>" alt="Song <?php echo $key + 1 ?>">
            <h3><?php echo($el["titolo"]) ?></h3>
            <p><?php echo($el["autore"]) ?></p>
            <audio id="audioPlayer<?php echo $key + 1 ?>" controls style="display: none;">
                <source src="<?php echo $el["audio"] ?>" type="audio/mp3">
            </audio>
            <button onclick="toggleAudioPlayer('audioPlayer<?php echo $key + 1 ?>')" class="btn-play">Play</button>
        </div>
        <?php
    }
?>
            <!--<div class="song">
                <img src="../img/images.jfif" alt="Song 1">
                <h3>Cadere</h3>
                <p>Tony Boy</p>
                <audio id="audioPlayer1" controls style="display: none;">
                    <source src="../songs/tonyboy.mp3" type="audio/mp3">
                </audio>
                <button onclick="toggleAudioPlayer('audioPlayer1')" class="btn-play">Play</button>
            </div>
            <div class="song">
                <img src="../img/trevis.jfif" alt="Song 2">
                <h3>GooseBumps</h3>
                <p>Travis Scott</p>
                <audio id="audioPlayer2" controls style="display: none;">
                    <source src="../songs/tonyboy.mp3" type="audio/mp3">
                </audio>
                <button onclick="toggleAudioPlayer('audioPlayer2')" class="btn-play">Play</button>
            </div>
            
            <div class="song">
                <img src="../img/rondo.jfif" alt="Song 3">
                <h3>Piccola Star</h3>
                <p>RondoDaCorsa</p>
                <audio id="audioPlayer3" controls style="display: none;">
                    <source src="../songs/file_example_MP3_700KB.mp3" type="audio/mp3">
                </audio>
                <button onclick="toggleAudioPlayer('audioPlayer3')" class="btn-play">Play</button>
            </div>
            <div class="song">
                <img src="../img/im.jfif" alt="Song 4">
                <h3>Kuli</h3>
                <p>50 Cent</p>
                <audio id="audioPlayer4" controls style="display: none;">
                    <source src="../songs/tonyboy.mp3" type="audio/mp3">
                </audio>
                <button onclick="toggleAudioPlayer('audioPlayer4')" class="btn-play">Play</button>
            </div>-->
        </section>
    </main>


   
    <script src="scripts.js"></script>
    <footer>
        <p>&copy; 2024 SpotX. Tutti i diritti riservati.</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
</svg>
    <p> <i class="fab fa-github"></i> <a href="https://github.com/fuble1">GitHub</a></p>
     
      </footer>
      <?php

        require('foot.php');
?>
</body>
</html>
