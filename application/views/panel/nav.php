<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><?=$ORG?></a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="/eventos/public/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">Ayuda : +51 939 051 009</li>            
        </ul>
        <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="Search Here">
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count">7</span>
                </a>                
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count bg-success">3</span>
                </a>                
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="/eventos/public/assets/images/faces/face8.jpg" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="/eventos/public/assets/images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold"><?=$USU->nombre?></p>
                        <p class="font-weight-light text-muted mb-0">Correo: <?=$USU->correo?></p>
                    </div>
                    <a class="dropdown-item">Mi Cuenta </a>
                    <a class="dropdown-item">Messages <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                    <a class="dropdown-item">Salir<i class="dropdown-item-icon ti-power-off"></i></a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>