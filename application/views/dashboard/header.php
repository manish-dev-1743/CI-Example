<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modern, flexible and responsive Bootstrap 5 admin &amp; dashboard template">
    <meta name="author" content="Bootlab">

    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <style>
        nav.col-md-2.d-none.d-md-block.sidebar {
            background: linear-gradient(to right, rgb(101, 78, 163), rgb(234, 175, 200));

        }

        a.nav-link {
            color: whitesmoke;
        }

        ul.nav li.dropdown:hover ul.dropdown-menu {
            display: block;
        }
    </style>

</head>


<body>
    <div class="d-flex flex-md-nowrap  p-2 text-bg-dark">

        <div class="navbar-brand col-sm-3 col-md-2 mr-0">
            <a href="<?= site_url('dashboard/index'); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img class="bi pe-none me-2 rounded-circle" width="40" height="32" src="https://picsum.photos/200/300">
                <!-- <span class="fs-4">Hello World</span> -->
            </a>
        </div>

        <div class="navbar-brand col-sm-7 col-md-9 mr-0">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        </div>

        <div class="navbar-brand col-sm-2 col-md-1 mr-0 d-flex justify-content-center">
            <ul class="navbar-nav ">
                <li class="nav-item text-nowrap">
                    <a href="#myDrop" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                        <img class="bi pe-none me-2 rounded-circle" width="40" height="32" src="https://picsum.photos/200/300">
                    </a>
                    <div class="dropdown" id="myDrop">
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Name</a></li>
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                            <li><a class="dropdown-item" href="<?= site_url('logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </div>



    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar sidebar-sticky fs-4 ">
                <div class="sidebar-sticky">
                    <ul class="nav nav-pills flex-column ">
                        <li class="nav-item">
                            <a class="nav-link ml-5" href="<?= site_url('dashboard/index'); ?>">
                                <i class="fa fa-tachometer"></i>
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item">

                            <a class="nav-link ml-5" id="catbut" href="#">
                                Categories
                            </a>
                            <div class="collapse" id="account-collapse">
                                <ul class="nav nav-pills flex-column">
                                    <li><a href="<?= site_url('addcat'); ?>" class="nav-link ml-5"><i class="fa fa-plus-circle" aria-hidden="false"></i> Add Category</a></li>
                                    <li><a href="<?= site_url('categories'); ?>" class="nav-link ml-5"><i class="fa fa-list-alt" aria-hidden="false"></i> All Categories</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">

                            <a class="nav-link ml-5" id="postbut" href="#">
                                Posts
                            </a>
                            <div class="collapse" id="post-collapse">
                                <ul class="nav nav-pills flex-column">
                                    <li><a href="<?= site_url('addpost'); ?>" class="nav-link ml-5"><i class="fa fa-sticky-note" aria-hidden="false"></i> Add Post</a></li>
                                    <li><a href="<?= site_url('posts'); ?>" class="nav-link ml-5"><i class="fa fa-list-alt" aria-hidden="false"></i> All Posts</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link ml-5" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted border-top border-bottom">
                        <span class="text-white fw-bolder pt-2 pb-3 ">Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link ml-5" href="#">
                                <span data-feather="file-text"></span>
                                Current month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-5" href="#">
                                <span data-feather="file-text"></span>
                                Last quarter
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-5" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-5" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>