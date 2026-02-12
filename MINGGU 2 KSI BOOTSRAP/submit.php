<?php
function esc($s){ return htmlspecialchars((string)$s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }
$uploaded_path = null;
if(!empty($_FILES['file_upload']) && $_FILES['file_upload']['error'] === UPLOAD_ERR_OK){
    $tmp = $_FILES['file_upload']['tmp_name'];
    $name = basename($_FILES['file_upload']['name']);
    $safe = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $name);
    $destDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    if(!is_dir($destDir)) mkdir($destDir, 0755, true);
    if(move_uploaded_file($tmp, $destDir . $safe)){
        $uploaded_path = 'uploads/' . $safe;
    }
}

// Simpan data ke log file
$log_entry = [
    'timestamp' => date('Y-m-d H:i:s'),
    'data' => $_POST,
    'file' => $uploaded_path
];
$log_data = json_encode($log_entry, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n---\n";
file_put_contents('biodata_log.txt', $log_data, FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Terkirim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">Data yang diterima</h3>
                        <p class="text-muted">Berikut data yang berhasil dikirim melalui form.</p>
                        <table class="table table-bordered table-striped">
                            <tbody>
<?php
foreach($_POST as $k => $v){
    if($k === 'extra_keys' || $k === 'extra_values') continue;
    if(is_array($v)){
        echo '<tr><th>'.esc($k).'</th><td>'.esc(implode(', ', $v)).'</td></tr>';
    } else {
        echo '<tr><th>'.esc($k).'</th><td>'.nl2br(esc($v)).'</td></tr>';
    }
}
if(!empty($_POST['extra_keys']) && is_array($_POST['extra_keys'])){
    $keys = $_POST['extra_keys'];
    $vals = $_POST['extra_values'] ?? [];
    for($i=0;$i<count($keys);$i++){
        $kk = trim($keys[$i]);
        $vv = $vals[$i] ?? '';
        if($kk !== ''){
            echo '<tr><th>'.esc($kk).'</th><td>'.nl2br(esc($vv)).'</td></tr>';
        }
    }
}
if($uploaded_path){
    echo '<tr><th>File</th><td><a href="'.esc($uploaded_path).'" target="_blank">'.esc(basename($uploaded_path)).'</a></td></tr>';
} else {
    echo '<tr><th>File</th><td><em>Tidak ada file diupload</em></td></tr>';
}
?>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <a href="biodata.php" class="btn btn-primary">Kembali ke Form</a>
                            <a href="home.php" class="btn btn-link">Halaman Utama</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>