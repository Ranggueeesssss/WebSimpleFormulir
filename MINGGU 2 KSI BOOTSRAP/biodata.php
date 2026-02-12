<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Biodata — Isi Bebas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
  <ol class="breadcrumb container mt-5 pt-5 justify-content-center">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="tabel.php">Tabel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Form Biodata — Isi Bebas</h3>
                        <p class="text-muted">Isilah form berikut. Anda juga dapat menambahkan field kustom dengan tombol "Tambah Field".</p>

                        <form action="submit.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="email@contoh.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">No. Telepon</label>
                                    <input type="tel" name="telepon" class="form-control" placeholder="0812xxxx">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kota</label>
                                <input type="text" name="kota" class="form-control" placeholder="Kota tinggal">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pesan / Catatan (isi bebas)</label>
                                <textarea name="pesan" class="form-control" rows="4" placeholder="Tulis sesuatu..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload File (opsional)</label>
                                <input type="file" name="file_upload" class="form-control">
                            </div>

                            <hr>
                            <h6>Field Kustom</h6>
                            <div id="extraFields" class="mb-3"></div>
                            <div class="d-flex gap-2 mb-4">
                                <button type="button" id="addField" class="btn btn-outline-secondary btn-sm">Tambah Field</button>
                                <button type="button" id="clearFields" class="btn btn-outline-danger btn-sm">Bersihkan Field</button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                                <a href="home.php" class="btn btn-link">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const addBtn = document.getElementById('addField');
        const clearBtn = document.getElementById('clearFields');
        const extra = document.getElementById('extraFields');
        let idx = 0;

        addBtn.addEventListener('click', () => {
            idx++;
            const wrapper = document.createElement('div');
            wrapper.className = 'row g-2 mb-2';
            wrapper.innerHTML = `
                <div class="col-md-5">
                    <input type="text" name="extra_keys[]" class="form-control" placeholder="Nama field (mis: Instagram)">
                </div>
                <div class="col-md-6">
                    <input type="text" name="extra_values[]" class="form-control" placeholder="Nilai field">
                </div>
                <div class="col-md-1 d-grid">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-field">×</button>
                </div>
            `;
            extra.appendChild(wrapper);
            wrapper.querySelector('.remove-field').addEventListener('click', () => wrapper.remove());
        });

        clearBtn.addEventListener('click', () => { extra.innerHTML = ''; });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    
</body>
</html>
