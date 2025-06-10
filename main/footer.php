</main>
</div>
<script src="../asset/js/bootstrap.js"></script>
<script>    
    // Sidebar collapse (desktop)
    document.getElementById('sidebarCollapse').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.querySelector('.main-content').classList.toggle('collapsed');
    });
    // Sidebar mobile
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    document.getElementById('sidebarMobileBtn').addEventListener('click', function () {
        sidebar.classList.add('show');
        overlay.classList.add('show');
    });
    overlay.addEventListener('click', function () {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    });
</script>
</body>

</html>