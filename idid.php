<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotX - Esplora le ultime novità</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.669 11.538a.5.5 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686m.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858m.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288"/>
                </svg>
                <a class="navbar-brand" href="idid.php">SpotX</a>
                <form class="form-inline mr-auto">
                    <input class="form-control search-bar mr-sm-2" type="search" id="searchInput" placeholder="Cerca" aria-label="Cerca">
                    <button class="btn btn-play search-btn my-2 my-sm-0" type="button" onclick="searchSongs()">Cerca</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../register_login/login.html">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register_login/register.html">Registrati</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="featured" id="songsList">
            <h2>Ultime novità</h2>

            <?php 
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
            "audio"=>"../songs/trevis.mp3"
        ),
        array(
            "img"=>"../img/rondo.jfif",
            "titolo"=>"Piccola Star",
            "autore"=>"RondoDaCorsa",
            "audio"=>"../songs/rondo.mp3"
        )
    );

    foreach($novita as $key => $el){
        ?>
        <div class="song">
            <img src="<?php echo($el["img"]) ?>" alt="Song <?php echo $key + 1 ?>">
            <h3><?php echo($el["titolo"]) ?></h3>
            <p><?php echo($el["autore"]) ?></p>
            <audio id="audioPlayer<?php echo $key + 1 ?>" controls style="display: none;">
                <source src="<?php echo $el["../songs/tonyboy.mp3"] ?>" type="audio/mp3">
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
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Spotix. Tutti i diritti riservati.</p>
    </footer>

    <script>
        function toggleAudioPlayer(playerId) {
            var audioPlayer = document.getElementById(playerId);
            var button = audioPlayer.nextElementSibling;
            
            
            var allAudioPlayers = document.querySelectorAll('audio');
            allAudioPlayers.forEach(function(player) {
                if (player.id !== playerId) {
                    player.style.display = 'none';
                    player.pause();
                    
                    player.nextElementSibling.textContent = 'Play';
                }
            });

            
            if (audioPlayer.style.display === 'none') {
                audioPlayer.style.display = 'block';
                audioPlayer.play();
                button.textContent = 'Pause';
            } else {
                audioPlayer.style.display = 'none';
                audioPlayer.pause();
                button.textContent = 'Play';
            }
        }

        function searchSongs() {
            var input, filter, songs, song, title, i;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            songs = document.getElementById('songsList').getElementsByClassName('song');
            
            for (i = 0; i < songs.length; i++) {
                song = songs[i];
                title = song.getElementsByTagName('h3')[0].textContent.toUpperCase();
                if (title.indexOf(filter) > -1) {
                    song.style.display = "";
                } else {
                    song.style.display = "none";
                }
            }
        }
    </script>
    <script src="scripts.js"></script>
    <footer>
        <p>&copy; 2024 MyMusic. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
