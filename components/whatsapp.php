<div id="whatsapp-popup">
    <a href="https://bit.ly/3K05V4Y" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
</div>

<script>
    // Munculkan popup setelah 3 detik
    setTimeout(function() {
        document.getElementById('whatsapp-popup').style.display = 'block';
    }, 3000);

    // Tutup popup saat tombol close di klik
    document.getElementById('close-popup').addEventListener('click', function() {
        document.getElementById('whatsapp-popup').style.display = 'none';
    });
</script>