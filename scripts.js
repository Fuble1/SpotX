   function toggleAudioPlayer(playerId) {
            var audioPlayer = document.getElementById(playerId);
            var button = audioPlayer.nextElementSibling;
            
            // Chiudi tutti i lettori audio aperti tranne quello attuale
            var allAudioPlayers = document.querySelectorAll('audio');
            allAudioPlayers.forEach(function(player) {
                if (player.id !== playerId) {
                    player.style.display = 'none';
                    player.pause();
                    // Riporta il testo del pulsante "Play" per gli altri player
                    player.nextElementSibling.textContent = 'Play';
                }
            });

            // Apri/chiudi il lettore audio attuale
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
