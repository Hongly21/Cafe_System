<!DOCTYPE html>
<html>

<head>
    <?php
    include("Header.php");
    ?>
    <!-- Google Fonts - Professional font combination -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=Noto+Sans+Khmer:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Style/sidemenu.css">
</head>
<style>
    body {
        font-family: 'Libertinus Sans', sans-serif;
    }

    span {
        font-family: 'Libertinus Sans', sans-serif;
        font-size: 19px;
    }

    #homeSubmenu li a {
        font-size: 18px;
    }

    #Order li a {
        font-size: 18px;
    }

    #Leave li a {
        font-size: 18px;
    }

    #User li a {
        font-size: 18px;
    }

    #Report li a {
        font-size: 18px;
    }

    #Orderw li a {
        font-size: 18px;
    }
</style>

<body>
    <div class="menu">
        <!-- <div class="brand-logo">
            <img src="../assets/images/yrm-logo.png" alt="YRM">
        </div> -->
        <div class="menu-search">
            <input type="text" placeholder="Search menu..." class="form-control">
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="../view/Dashboard/index.php" target="content">
                    <i class="fa fa-home"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Master Set up -->
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa-solid fa-list"></i><span>Menu</span>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="../view/Sales/index.php" target="content">Sales</a>
                    </li>
                    <li>
                        <a href="../view/Product/index.php" target="content">Product</a>
                    </li>
                    <li>
                        <a href="../view/Category/index.php" target="content">Category</a>
                    </li>
                    <li>
                        <a href="../view/Inventory/index.php" target="content">Inventory</a>
                    </li>
                </ul>
            </li>

            <!-- Employee -->
            <li>
                <a href="#Order" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-users"></i><span>Employee</span>
                </a>
                <ul class="collapse list-unstyled" id="Order">
                    <li>
                        <a href="../view/Staff/index.php" target="content">Staff Profile</a>
                    </li>
                    <li>
                        <a href="../view/User/index.php" target="content">User</a>
                    </li>
                </ul>
            </li>
            <!-- Supplies -->
            <li>
                <a href="#Orderw" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-users"></i><span>Supplies Setting</span>
                </a>
                <ul class="collapse list-unstyled" id="Orderw">
                    <li>
                        <a href="../view/Supplies/index.php" target="content">Stock</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#Report" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-book"></i><span>Report</span>
                </a>
                <ul class="collapse list-unstyled" id="Report">
                    <li>
                        <a href="../view/Report/index.php" target="content">Report</a>
                    </li>
                    <li>
                </ul>
            </li>

        </ul>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>

</html>