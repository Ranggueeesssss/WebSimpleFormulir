<?php
// Sample data for two tables
$dataUtama = [
    ['nama' => 'Ahmad Hidayat', 'pendidikan' => 'Sarjana', 'kota' => 'Jakarta'],
    ['nama' => 'Siti Nurhaliza', 'pendidikan' => 'Diploma', 'kota' => 'Bandung'],
    ['nama' => 'Budi Santoso', 'pendidikan' => 'SMA', 'kota' => 'Surabaya'],
    ['nama' => 'Rina Wijaya', 'pendidikan' => 'SMP', 'kota' => 'Semarang'],
    ['nama' => 'Joko Widodo', 'pendidikan' => 'Sarjana', 'kota' => 'Yogyakarta'],
    ['nama' => 'Ani Yudhoyono', 'pendidikan' => 'Diploma', 'kota' => 'Medan'],
    ['nama' => 'Susilo Bambang Yudhoyono', 'pendidikan' => 'Sarjana', 'kota' => 'Palembang'],
    ['nama' => 'Megawati Soekarnoputri', 'pendidikan' => 'SMA', 'kota' => 'Jakarta'],
    ['nama' => 'Prabowo Subianto', 'pendidikan' => 'Sarjana', 'kota' => 'Jakarta'],
    ['nama' => 'Jokowi', 'pendidikan' => 'SMA', 'kota' => 'Solo'],
];

$dataTambahan = [
    ['nama' => 'Andi', 'pendidikan' => 'SD', 'kota' => 'Bali'],
    ['nama' => 'Budi', 'pendidikan' => 'SMP', 'kota' => 'Makassar'],
    ['nama' => 'Cici', 'pendidikan' => 'SMA', 'kota' => 'Padang'],
    ['nama' => 'Dedi', 'pendidikan' => 'Diploma', 'kota' => 'Pontianak'],
    ['nama' => 'Eka', 'pendidikan' => 'Sarjana', 'kota' => 'Manado'],
    ['nama' => 'Fani', 'pendidikan' => 'Sarjana', 'kota' => 'Ambon'],
    ['nama' => 'Gina', 'pendidikan' => 'SMA', 'kota' => 'Jayapura'],
    ['nama' => 'Hadi', 'pendidikan' => 'Diploma', 'kota' => 'Palu'],
];

// Get current tab and page
$tab = isset($_GET['tab']) ? $_GET['tab'] : 'utama';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$itemsPerPage = 5;

// Select data based on tab
if ($tab === 'utama') {
    $data = $dataUtama;
} else {
    $data = $dataTambahan;
}

// Pagination logic
$totalItems = count($data);
$totalPages = ceil($totalItems / $itemsPerPage);
$page = max(1, min($page, $totalPages));
$offset = ($page - 1) * $itemsPerPage;
$currentData = array_slice($data, $offset, $itemsPerPage);

// Function to generate pagination links
function generatePaginationLinks($totalPages, $currentPage, $tab) {
    $links = '<nav aria-label="Page navigation"><ul class="pagination">';

    // Previous
    if ($currentPage > 1) {
        $links .= '<li class="page-item"><a class="page-link" href="tabel.php?tab=' . $tab . '&page=' . ($currentPage - 1) . '">Previous</a></li>';
    } else {
        $links .= '<li class="page-item disabled"><a class="page-link">Previous</a></li>';
    }

    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $links .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $links .= '<li class="page-item"><a class="page-link" href="tabel.php?tab=' . $tab . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }

    // Next
    if ($currentPage < $totalPages) {
        $links .= '<li class="page-item"><a class="page-link" href="tabel.php?tab=' . $tab . '&page=' . ($currentPage + 1) . '">Next</a></li>';
    } else {
        $links .= '<li class="page-item disabled"><a class="page-link">Next</a></li>';
    }

    $links .= '</ul></nav>';
    return $links;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tabel Bootstrap</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<style>
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
            color: #5e91c7 !important;
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
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="tabel.php">table</a>
                    <a class="nav-link" href="biodata.php">from</a>
                    <a class="nav-link" href="log.php">log</a>
                </div>
            </div>
        </div>
    </nav>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb container mt-5 pt-5">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

<div class="container mt-5 pt-5 mb-4">
     <h1 class="mb-4">Data Tabel</h1>

          <table class="table table-striped table-hover table-bordered">
          <thead class="table-dark">
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status Pendidikan</th>
                    <th>Kota</th>
                </tr>
                </thead>
               <tbody>
               <?php
               $no = $offset + 1;
               foreach ($currentData as $row) {
                   echo "<tr>";
                   echo "<td>" . $no++ . "</td>";
                   echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                   echo "<td>" . htmlspecialchars($row['pendidikan']) . "</td>";
                   echo "<td>" . htmlspecialchars($row['kota']) . "</td>";
                   echo "</tr>";
               }
               ?>
           </tbody>
     </table>

     <?php echo generatePaginationLinks($totalPages, $page, $tab); ?>

            <a href="home.php" class="btn btn-primary mt-3 btn-next btn-next:hover">Home</a>
            <a href="biodata.php" class="btn btn-primary mt-3 btn-next btn-next:hover">from</a>
     </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>