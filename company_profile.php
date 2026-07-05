<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h2 class="h4 mb-1 fw-bold text-dark"><i class="bi bi-building me-2 text-primary"></i>CleanWash Car Wash</h2>
        <p class="text-secondary mb-0">Company Profile tema Car Wash untuk CleanWash.</p>
    </div>
    <span class="badge bg-info text-uppercase py-2 px-3">Car Wash</span>
</div>
<div class="row gy-4">
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center">
                <div class="mb-4">
                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                        <i class="bi bi-droplet-half fs-1 text-primary"></i>
                    </div>
                </div>
                <h3 class="h5 fw-bold mb-1">CleanWash</h3>
                <p class="text-secondary mb-0">Car Wash terbaik untuk kendaraan bersih, cepat, dan ramah lingkungan.</p>
            </div>
        </div>
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <h3 class="h6 fw-bold mb-3">Jam Operasional</h3>
                <ul class="list-unstyled mb-0 text-secondary">
                    <li>Senin - Jumat: 08:00 - 18:00</li>
                    <li>Sabtu: 08:00 - 16:00</li>
                    <li>Minggu: 09:00 - 14:00</li>
                </ul>
            </div>
        </div>
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body">
                <h3 class="h6 fw-bold mb-3">Alamat & Kontak</h3>
                <p class="small text-secondary mb-2"><strong>Lokasi:</strong><br>Jl. Cendrawasih No. 45, Bandung</p>
                <p class="small text-secondary mb-2"><strong>Telepon:</strong><br>+62 812-3456-7890</p>
                <p class="small text-secondary mb-0"><strong>Email:</strong><br>info@cleanwash.co.id</p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="h5 fw-bold mb-3">Tentang Kami</h3>
                <p class="text-secondary">CleanWash Car Wash hadir untuk memberikan layanan cuci mobil profesional dengan standar kebersihan tinggi, pengalaman pelanggan yang nyaman, dan teknologi pencucian yang ramah lingkungan.</p>
                <div class="row gy-3 mt-4">
                    <div class="col-md-6">
                        <div class="p-4 bg-primary-subtle rounded-3 h-100">
                            <h4 class="h6 fw-semibold">Visi</h4>
                            <p class="small text-secondary mb-0">Menjadi pilihan utama car wash terdepan yang memberikan kualitas bersih sempurna dan pelayanan cepat di Jawa Barat.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 bg-info-subtle rounded-3 h-100">
                            <h4 class="h6 fw-semibold">Misi</h4>
                            <p class="small text-secondary mb-0">Menyediakan layanan cuci mobil profesional, meningkatkan pengalaman pelanggan, dan menerapkan praktik ramah lingkungan setiap hari.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="h5 fw-bold mb-3">Layanan Kami</h3>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h4 class="h6 fw-semibold">Cuci Reguler</h4>
                                <p class="small text-secondary mb-0">Pencucian cepat dengan sabun premium dan pengeringan manual.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h4 class="h6 fw-semibold">Cuci Premium</h4>
                                <p class="small text-secondary mb-0">Perawatan ekstra dengan polish ringan dan pelindung kilap.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h4 class="h6 fw-semibold">Detailing</h4>
                                <p class="small text-secondary mb-0">Pembersihan mendalam interior dan eksterior untuk hasil maksimal.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h4 class="h6 fw-semibold">Waxing</h4>
                                <p class="small text-secondary mb-0">Perlindungan kilap tahan lama dengan lapisan wax premium.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="h5 fw-bold mb-3">Galeri</h3>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                <span class="text-secondary small">Gambar 1</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                <span class="text-secondary small">Gambar 2</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                <span class="text-secondary small">Gambar 3</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="ratio ratio-4x3 rounded-3 overflow-hidden bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                <span class="text-secondary small">Gambar 4</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
