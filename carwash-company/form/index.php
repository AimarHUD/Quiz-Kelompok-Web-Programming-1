<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();

$flash = getFlash();
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container-fluid py-4 px-4">
    <div class="row g-4">
        <div class="col-lg-3">
            <?php include __DIR__ . '/../includes/sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card p-4 border-0">
                <?php echo renderBreadcrumb(); ?>
                <h3 class="fw-bold mb-3">Form Booking Car Wash</h3>
                <p class="text-muted">Isi data pelanggan dan jadwalkan layanan car wash melalui formulir berikut.</p>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <form id="formPelanggan" action="proses.php" method="post" class="row g-3" novalidate>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                        <div class="invalid-feedback">Nama Pelanggan wajib diisi.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" required>
                        <div class="invalid-feedback">Nomor HP wajib diisi.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">Email wajib diisi dengan format benar.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-select" required>
                            <option value="">Pilih jenis kendaraan</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                            <option value="Truk">Truk</option>
                        </select>
                        <div class="invalid-feedback">Pilih jenis kendaraan.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="merk_kendaraan" class="form-label">Merk Kendaraan</label>
                        <input type="text" name="merk_kendaraan" id="merk_kendaraan" class="form-control" required>
                        <div class="invalid-feedback">Merk kendaraan wajib diisi.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                        <input type="text" name="nomor_polisi" id="nomor_polisi" class="form-control" required>
                        <div class="invalid-feedback">Nomor Polisi wajib diisi.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_paket" class="form-label">Paket Cuci</label>
                        <select name="jenis_paket" id="jenis_paket" class="form-select" required>
                            <option value="">Pilih paket cuci</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Premium">Premium</option>
                            <option value="Express">Express</option>
                        </select>
                        <div class="invalid-feedback">Pilih paket cuci.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label">Tanggal Booking</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        <div class="invalid-feedback">Tanggal booking wajib dipilih.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="jam" class="form-label">Jam Booking</label>
                        <input type="time" name="jam" id="jam" class="form-control" required>
                        <div class="invalid-feedback">Jam booking wajib dipilih.</div>
                    </div>
                    <div class="col-12">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="4" class="form-control" placeholder="Masukkan kebutuhan khusus atau catatan tambahan"></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send me-2"></i>Submit Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formPelanggan').addEventListener('submit', function (e) {
        let valid = true;
        const fields = ['nama', 'email', 'no_hp', 'jenis_kendaraan', 'merk_kendaraan', 'nomor_polisi', 'jenis_paket', 'tanggal', 'jam'];

        fields.forEach(function (field) {
            const input = document.getElementById(field);
            if (!input || !input.value.trim()) {
                valid = false;
                input.classList.add('is-invalid');
            } else {
                input.classList.remove('is-invalid');
            }
        });

        const email = document.getElementById('email');
        if (email && email.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
            valid = false;
            email.classList.add('is-invalid');
        }

        if (!valid) {
            e.preventDefault();
        }
    });
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
