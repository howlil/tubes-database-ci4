document.addEventListener('DOMContentLoaded', function() {
    var hoverElements = document.querySelectorAll('.hover-category'); // Kelas untuk elemen yang di-hover
    var sidebar = document.querySelector('.category-sidebar'); // Kelas untuk sidebar

    // Fungsi untuk menampilkan sidebar
    function showSidebar() {
        if (sidebar) {
            sidebar.style.visibility = 'visible';
        }
    }

    // Fungsi untuk menyembunyikan sidebar
    function hideSidebar() {
        if (sidebar) {
            sidebar.style.visibility = 'hidden';
        }
    }

    // Event listener untuk elemen hover
    hoverElements.forEach(function(hoverElement) {
        hoverElement.addEventListener('mouseover', showSidebar);
    });

    // Event listener untuk sidebar itu sendiri
    if (sidebar) {
        sidebar.addEventListener('mouseleave', hideSidebar);
    }
});

