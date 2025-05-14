<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Enables mobile responsiveness -->
    <title>پیدا</title>

    <!-- ✅ Bootstrap and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ✅ Fonts -->
    <style>
        @font-face {
            font-family: 'Anjoman';
            src: url('/fonts/anjoman-light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Anjoman';
            src: url('/fonts/anjoman-thin.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }
        html, body {
            height: 100%;
            margin: 0;
            overflow: hidden; /* ❗️Prevents scrolling */
            font-family: 'Anjoman', sans-serif;
            background: url('/images/peydaVertical.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            height: 100vh; /* Make sure it fills the screen */
            background-color: rgba(0, 0, 0, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px; /* Add a bit of side padding on small screens */
        }

        .search-box {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .input-group-text i {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <!-- Page Loading div -->
    <div id="page-loader" style="
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;">

        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
            <span class="visually-hidden">در حال بارگذاری...</span>
        </div>
    </div>

    <!-- ✅ Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid d-flex flex-row-reverse justify-content-between">
            <a class="navbar-brand order-2" href="/">پیدا</a>
            <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="نمایش منو">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/results">لیست تمامی اسامی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/associationResults">لیست مراکز درمانی</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            گالری
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                            <li><a class="dropdown-item" href="/mdeia/gallery/images">تصاویر</a></li>
                            <li><a class="dropdown-item" href="/media/gallery/videosPage">ویدیوها</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">ارتباط با ما</a> 
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ✅ Centered Search Box -->
    <div class="overlay">
        <div class="search-box">
            <form method="GET" action="/results">
                <div class="row g-2">
                    <div class="col-12 col-md-9">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text rounded-start"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="دنبال چه کسی میگردی؟">
                        </div>
                    </div>
                    <div class="col-12 col-md-3 d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">جست و جو</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- Script for page loading -->
    <script>
        window.addEventListener('load', function () {
            const loader = document.getElementById('page-loader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease-out';
                setTimeout(() => loader.style.display = 'none', 500);
            }
        });
    </script>
</body>
</html>
