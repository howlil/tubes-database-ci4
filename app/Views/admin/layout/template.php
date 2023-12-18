<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="5000" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title) ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/scss/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="admin/css/sb-admin-2.css" rel="stylesheet"> -->
    <link href="admin/scss/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">

        <?= $this->renderSection('content') ?>


    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>



    <!-- <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.getElementById('accordionSidebar').classList.toggle('toggled');
    });
    </script> -->
    <script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var sidebar = document.getElementById('accordionSidebar');
        sidebar.classList.toggle('toggled');

        if (sidebar.classList.contains('toggled')) {
            sidebar.style.width = '80px';
            sidebar.querySelectorAll('.nav-link span').forEach(function(span) {
                span.style.display = 'none';
            });
        } else {
            sidebar.style.width = ''; // Kembali ke lebar awal
            sidebar.querySelectorAll('.nav-link span').forEach(function(span) {
                span.style.display = '';
            });
        }
    });
    </script>


    <script>
    document.getElementById('userDropdown').addEventListener('mouseenter', function() {
        this.classList.add('show');
        this.querySelector('.dropdown-menu').classList.add('show');
    });

    document.getElementById('userDropdown').addEventListener('mouseleave', function() {
        this.classList.remove('show');
        this.querySelector('.dropdown-menu').classList.remove('show');
    });
    </script>


</body>

</html>