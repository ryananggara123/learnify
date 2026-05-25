document.addEventListener("DOMContentLoaded", function() {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const closeSidebarBtn = document.getElementById("closeSidebar");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");
    
    const dailyTipEl = document.getElementById("dailyTip");

    // 1. Logika Buka Tutup Sidebar
    hamburgerBtn.addEventListener("click", function() {
        sidebar.classList.add("active");
        overlay.classList.add("active");
    });

    closeSidebarBtn.addEventListener("click", function() {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });

    overlay.addEventListener("click", function() {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });

    // 2. Daily Tips Rotation
    const tips = [
        "Tip: Belajar secara konsisten 15 menit sehari lebih baik dari 2 jam sekali seminggu!",
        "Tip: Jangan takut membuat kesalahan - itu adalah bagian dari proses pembelajaran!",
        "Tip: Catat poin-poin penting saat belajar untuk memudahkan review nanti.",
        "Tip: Ambil istirahat singkat setiap 25 menit untuk hasil belajar yang optimal.",
        "Tip: Ajarkan kembali materi yang sudah kamu pelajari untuk memperdalam pemahaman!",
        "Tip: Gunakan video pembelajaran untuk pendekatan visual yang lebih menarik.",
        "Tip: Tautkan konsep baru dengan pengetahuan yang sudah kamu miliki sebelumnya."
    ];
    
    function rotateTip() {
        const randomTip = tips[Math.floor(Math.random() * tips.length)];
        dailyTipEl.textContent = randomTip;
    }
    
    rotateTip();
    setInterval(rotateTip, 15000); // Ganti setiap 15 detik
});