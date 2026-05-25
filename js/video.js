// Muat YouTube API
let tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
let firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let players = [];
let xpSudahDitambah = false;

// Fungsi ini akan dipanggil otomatis oleh YouTube setelah API berhasil dimuat
function onYouTubeIframeAPIReady() {
    let iframes = document.querySelectorAll('.yt-player');
    
    iframes.forEach((iframe, index) => {
        // Beri ID unik ke masing-masing iframe
        iframe.id = 'yt-player-' + index;
        
        // Daftarkan ke YouTube API
        let player = new YT.Player(iframe.id, {
            events: {
                'onStateChange': onPlayerStateChange
            }
        });
        players.push(player);
    });
}

// Fungsi untuk mendeteksi status video
function onPlayerStateChange(event) {
    // YT.PlayerState.ENDED artinya video selesai ditonton (kode status = 0)
    if (event.data === YT.PlayerState.ENDED) {
        
        // Jika belum pernah diklaim XP-nya di halaman ini
        if(!xpSudahDitambah) {
            xpSudahDitambah = true;
            
            // Kirim laporan ke PHP
            let formData = new FormData();
            formData.append("video_selesai", "true");

            fetch("video.php", {
                method: "POST",
                body: formData
            }).then(response => response.text())
              .then(data => {
                  if(data.trim() === "sukses") {
                      alert("Hebat! Anda mendapatkan +50 XP karena telah menyelesaikan video pembelajaran.");
                      // Reload halaman agar XP di header update
                      location.reload(); 
                  }
              });
        }
    }
}