<?php
function esc($s){ return htmlspecialchars((string)$s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }

$log_file = 'biodata_log.txt';
$entries = [];
if(file_exists($log_file)){
    $content = file_get_contents($log_file);
    $parts = explode("\n---\n", trim($content));
    foreach($parts as $part){
        $part = trim($part);
        if(!empty($part)){
            $entry = json_decode($part, true);
            if($entry){
                $entries[] = $entry;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="2">
    <title>Log Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">Log Data Biodata</h3>
                        <p class="text-muted">Berikut log data yang dikirim dari form biodata.</p>

                        <?php if(empty($entries)): ?>
                            <p class="text-center">Belum ada data log.</p>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Timestamp</th>
                                            <th>Data</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($entries as $index => $entry): ?>
                                            <tr>
                                                <td><?php echo $index + 1; ?></td>
                                                <td><?php echo esc($entry['timestamp']); ?></td>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        <?php foreach($entry['data'] as $k => $v): ?>
                                                            <?php if($k === 'extra_keys' || $k === 'extra_values') continue; ?>
                                                            <?php if(is_array($v)): ?>
                                                                <li><strong><?php echo esc($k); ?>:</strong> <?php echo esc(implode(', ', $v)); ?></li>
                                                            <?php else: ?>
                                                                <li><strong><?php echo esc($k); ?>:</strong> <?php echo nl2br(esc($v)); ?></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <?php if(!empty($entry['data']['extra_keys']) && is_array($entry['data']['extra_keys'])): ?>
                                                            <?php
                                                            $keys = $entry['data']['extra_keys'];
                                                            $vals = $entry['data']['extra_values'] ?? [];
                                                            for($i=0;$i<count($keys);$i++):
                                                                $kk = trim($keys[$i]);
                                                                $vv = $vals[$i] ?? '';
                                                                if($kk !== ''):
                                                            ?>
                                                                <li><strong><?php echo esc($kk); ?>:</strong> <?php echo nl2br(esc($vv)); ?></li>
                                                            <?php endif; endfor; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <?php if($entry['file']): ?>
                                                        <a href="<?php echo esc($entry['file']); ?>" target="_blank"><?php echo esc(basename($entry['file'])); ?></a>
                                                    <?php else: ?>
                                                        <em>Tidak ada file</em>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>

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
