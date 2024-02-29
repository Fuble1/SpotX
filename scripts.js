// Funzione per cercare le canzoni in base al titolo
function searchSongs() {
    var input, filter, songs, song, title, i;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    songs = document.getElementsByClassName('song');
    
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
function toggleAudioPlayer(playerId, button) {
    var audioPlayer = document.getElementById(playerId);

    // Chiudi tutti i lettori audio aperti tranne quello attuale
    var allAudioPlayers = document.querySelectorAll('audio');
    allAudioPlayers.forEach(function(player) {
        if (player.id !== playerId) {
            player.pause();
        }
    });

    // Apri/chiudi il lettore audio attuale
    if (audioPlayer.paused) {
        audioPlayer.play();
        button.textContent = 'Pause';
    } else {
        audioPlayer.pause();
        button.textContent = 'Play';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const themeToggle = document.getElementById("theme-toggle");
    themeToggle.addEventListener("click", function() {
        const body = document.body;
        // Verifica se il tema corrente è chiaro o scuro e cambialo
        if (body.classList.contains("light-mode")) {
            body.classList.remove("light-mode");
            body.classList.add("dark-mode");
            themeToggle.innerHTML = '<i class="fas fa-moon"></i> Tema scuro';
        } else {
            body.classList.remove("dark-mode");
            body.classList.add("light-mode");
            themeToggle.innerHTML = '<i class="fas fa-sun"></i> Tema chiaro';
        }
    });
});
function closeDropdown() {
    var dropdownToggle = document.getElementById('themeDropdown');
    dropdownToggle.setAttribute('aria-expanded', true);
    dropdownToggle.classList.remove('show');
    var dropdownMenu = dropdownToggle.nextElementSibling;
    dropdownMenu.classList.remove('show');
}
// Aggiorna la funzione setTheme per applicare correttamente il tema scelto
function setTheme(theme) {
    const body = document.body;
    if (theme === 'light') {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
    } else if (theme === 'dark') {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
    }
}
// Funzione per caricare la pagina successiva di canzoni
function loadNextPage() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'spotx.php?page=' + pageNumber, true); // Sostituisci 'get_songs.php' con il tuo endpoint API
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            const data = JSON.parse(xhr.responseText);
            if (data.length > 0) {
                renderSongs(data);
                pageNumber++; // Incrementa il numero di pagina per la prossima richiesta
            }
        }
    };
    xhr.send();
}

// Funzione per controllare quando l'utente ha raggiunto il fondo della pagina
function checkScroll() {
    if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
        loadNextPage(); // Carica la pagina successiva quando l'utente raggiunge il fondo della pagina
    }
}

// Aggiungi l'evento di scroll per controllare quando l'utente raggiunge il fondo della pagina
window.addEventListener('scroll', checkScroll);
