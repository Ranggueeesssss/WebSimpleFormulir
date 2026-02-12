<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Perkenalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, 100%);
            font-family:  Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            transition: all 0.3s ease;
            padding: 10px 15px;
        }
        .navbar-nav .nav-link:hover {
            transform: scale(1.05);
            color: #007bff !important;
        }
        .content {
            margin-top: 80px;
        }

        .intro-title {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .intro-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 80px;
        }
        .btn-next {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 8px;
            background-color: #707a85;
        }
        .btn-next:hover {
            background-color: #0056b3;
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blogger</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="tabel.php">table</a>
                    <a class="nav-link" href="biodata.php">from</a>
                    <a class="nav-link" href="log.php">log</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="d-flex flex-column align-items-start col-8 mx-auto">
            <h1 class="intro-title">Hello World</h1>
            <p class="intro-description">
                Saya adalah seorang web developer yang antusias dalam menciptakan aplikasi web yang menarik dan fungsional.
            </p>
            <a href="tabel.php" class="btn btn-secondary btn-next btn-next:hover mt-2" type="button">Next</a>
 
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>