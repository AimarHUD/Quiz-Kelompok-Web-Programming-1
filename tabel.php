<?php
declare(strict_types=1);

if (!defined('DASHBOARD_ACCESS')) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-4">
    <div>
        <h2 class="h4 mb-1 fw-bold text-dark"><i class="bi bi-table me-2 text-primary"></i>Tabel</h2>
        <p class="text-secondary mb-0">Contoh tabel data operasional.</p>
    </div>
    <span class="badge bg-info text-uppercase py-2 px-3">Data</span>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Layanan</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cuci Reguler</td>
                        <td>Aditya Pratama</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>20 Jun 2026</td>
                        <td class="text-end"><a href="#" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Cuci Premium</td>
                        <td>Sri Wulandari</td>
                        <td><span class="badge bg-warning text-dark">Proses</span></td>
                        <td>21 Jun 2026</td>
                        <td class="text-end"><a href="#" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Detailing</td>
                        <td>Rendi Saputra</td>
                        <td><span class="badge bg-secondary">Antrean</span></td>
                        <td>22 Jun 2026</td>
                        <td class="text-end"><a href="#" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Waxing</td>
                        <td>Dewi Kurnia</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>23 Jun 2026</td>
                        <td class="text-end"><a href="#" class="btn btn-sm btn-outline-primary">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
