<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h2 class="h4 mb-1 fw-bold text-dark"><i class="bi bi-ui-checks-grid me-2 text-primary"></i>Form</h2>
        <p class="text-secondary mb-0">Formulir contoh untuk input data internal.</p>
    </div>
    <span class="badge bg-primary text-uppercase py-2 px-3">Template</span>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form>
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="customerName" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="customerName" placeholder="Masukkan nama lengkap">
                </div>
                <div class="col-md-6">
                    <label for="emailAddress" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailAddress" placeholder="nama@domain.com">
                </div>
                <div class="col-md-6">
                    <label for="serviceType" class="form-label">Jenis Layanan</label>
                    <select id="serviceType" class="form-select">
                        <option selected>Pilih layanan</option>
                        <option value="1">Cuci Reguler</option>
                        <option value="2">Cuci Premium</option>
                        <option value="3">Detailing</option>
                        <option value="4">Waxing</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="appointmentDate" class="form-label">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="appointmentDate">
                </div>
                <div class="col-12">
                    <label for="notes" class="form-label">Catatan Tambahan</label>
                    <textarea id="notes" class="form-control" rows="4" placeholder="Tulis instruksi khusus atau permintaan tambahan..."></textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
