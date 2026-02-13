// Sidebar toggle
const sidebar = document.getElementById('sidebar-wrapper');
const toggleBtn = document.getElementById('sidebarToggle');
if (toggleBtn && sidebar) {
    toggleBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
    });
}
// Scroll behavior for sidebar and content
sidebar && (sidebar.style.overflowY = 'auto');
document.getElementById('page-content-wrapper').style.overflowY = 'auto';
