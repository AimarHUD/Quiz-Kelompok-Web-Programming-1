<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../includes/functions.php';
requireLogin();
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container-fluid py-4 px-4">
    <div class="row g-4">
        <div class="col-lg-3">
            <?php include __DIR__ . '/../includes/sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <section class="company-hero rounded-4 overflow-hidden position-relative mb-5">
                <div class="company-hero-overlay"></div>
                <div class="company-hero-content text-white p-5">
                    <span class="badge bg-info bg-opacity-25 text-white mb-3">CarWash Company</span>
                    <h1 class="display-6 fw-bold mb-3">Bersihkan Mobil Anda dengan Cepat, Aman, dan Profesional</h1>
                    <p class="lead mb-4">Kami menghadirkan layanan cuci mobil modern dengan standar kualitas tinggi, layanan ramah, dan hasil kilap maksimal untuk setiap pelanggan.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="#layanan" class="btn btn-light btn-lg">Lihat Layanan</a>
                        <a href="#kontak" class="btn btn-outline-light btn-lg">Hubungi Kami</a>
                    </div>
                </div>
            </section>

            <div class="row gy-5">
                <div class="col-12">
                    <div class="card p-4 shadow-sm">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <a class="btn btn-outline-secondary btn-sm" href="#tentang">Tentang Kami</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#sejarah">Sejarah</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#visi-misi">Visi & Misi</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#layanan">Layanan</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#galeri">Galeri</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#testimoni">Testimoni</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#faq">FAQ</a>
                            <a class="btn btn-outline-secondary btn-sm" href="#kontak">Kontak</a>
                        </div>
                        <p class="mb-0 text-muted">Selamat datang di halaman Company Profile kami. Temukan siapa kami, apa yang kami lakukan, dan bagaimana kami dapat membantu membuat tampilan mobil Anda kembali sempurna.</p>
                    </div>
                </div>

                <div class="col-12" id="tentang">
                    <div class="card p-4 shadow-sm">
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-6">
                                <span class="section-label">Tentang Kami</span>
                                <h2 class="fw-bold">Solusi Cuci Mobil Terpercaya untuk Komunitas Anda</h2>
                                <p class="text-muted">CarWash Company hadir sebagai layanan pencucian mobil yang menggabungkan teknologi modern, proses ramah lingkungan, dan pengalaman pelanggan unggul untuk setiap kendaraan.</p>
                                <ul class="company-info-list text-secondary">
                                    <li>Teknisi berpengalaman dan terpercaya.</li>
                                    <li>Paket layanan lengkap untuk mobil pribadi dan komersial.</li>
                                    <li>Proses cepat dengan hasil kilap tahan lama.</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                                    <img src="https://images.unsplash.com/photo-1511914265870-3d4b6b5b6360?auto=format&fit=crop&w=1200&q=80" alt="Tentang Kami" class="w-100 h-100 object-fit-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="sejarah">
                    <div class="card p-4 shadow-sm">
                        <span class="section-label">Sejarah</span>
                        <h2 class="fw-bold mb-3">Perjalanan Kami Menjadi Jasa Cuci Mobil Modern</h2>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-step bg-primary text-white">2018</div>
                                <div>
                                    <h5 class="mb-1">Awal Berdiri</h5>
                                    <p class="text-secondary mb-0">Dimulai dengan visi sederhana: memberikan layanan cuci mobil yang cepat dan terpercaya bagi lingkungan sekitar.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-step bg-primary text-white">2020</div>
                                <div>
                                    <h5 class="mb-1">Ekspansi Layanan</h5>
                                    <p class="text-secondary mb-0">Menambah paket detailing, poles, dan layanan antar jemput untuk memenuhi kebutuhan pelanggan yang berkembang.</p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-step bg-primary text-white">2023</div>
                                <div>
                                    <h5 class="mb-1">Teknologi Baru</h5>
                                    <p class="text-secondary mb-0">Mengadopsi sistem booking online dan penggunaan bahan ramah lingkungan untuk kenyamanan dan kualitas layanan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="visi-misi">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card p-4 shadow-sm h-100">
                                <span class="section-label">Visi</span>
                                <h3 class="fw-bold">Menjadi rujukan utama layanan cuci dan detailing mobil terbaik di kawasan kami.</h3>
                                <p class="text-secondary">Kami ingin setiap pelanggan merasa percaya diri meninggalkan kendaraan mereka kepada tim yang profesional, transparan, dan peduli pada setiap detail.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-4 shadow-sm h-100">
                                <span class="section-label">Misi</span>
                                <ul class="company-info-list text-secondary mb-0">
                                    <li>Memberikan layanan cepat tanpa mengorbankan kualitas.</li>
                                    <li>Menjaga kebersihan dengan produk aman dan ramah lingkungan.</li>
                                    <li>Membangun hubungan jangka panjang dengan setiap pelanggan.</li>
                                    <li>Terus meningkatkan pengalaman layanan melalui inovasi.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="layanan">
                    <div class="card p-4 shadow-sm">
                        <span class="section-label">Layanan</span>
                        <h2 class="fw-bold mb-4">Layanan Profesional Kami</h2>
                        <div class="row g-3">
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-droplet-fill"></i></div>
                                    <h5 class="fw-bold">Cuci Eksterior</h5>
                                    <p class="text-secondary mb-0">Perawatan eksterior mendalam untuk membersihkan dan menjaga kilap bodi mobil.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-brush-fill"></i></div>
                                    <h5 class="fw-bold">Cuci Interior</h5>
                                    <p class="text-secondary mb-0">Pembersihan interior, vacuum, dan desinfeksi untuk kenyamanan kabin yang maksimal.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-sparkles"></i></div>
                                    <h5 class="fw-bold">Detailing & Poles</h5>
                                    <p class="text-secondary mb-0">Pemulihan efek kilap dan penyempurnaan finishing untuk tampilan seperti baru.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-clock-fill"></i></div>
                                    <h5 class="fw-bold">Layanan Cepat</h5>
                                    <p class="text-secondary mb-0">Paket cuci kilat untuk pelanggan yang membutuhkan hasil cepat tanpa kompromi kualitas.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-truck-flatbed"></i></div>
                                    <h5 class="fw-bold">Antar Jemput</h5>
                                    <p class="text-secondary mb-0">Ambil dan antar kembali mobil Anda agar proses menjadi lebih mudah dan nyaman.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="service-card p-4 h-100 rounded-4 shadow-sm">
                                    <div class="service-icon bg-primary text-white mb-3"><i class="bi bi-shield-lock-fill"></i></div>
                                    <h5 class="fw-bold">Perawatan Khusus</h5>
                                    <p class="text-secondary mb-0">Paket perawatan khusus untuk cat, velg, dan perlindungan interior premium.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="galeri">
                    <div class="card p-4 shadow-sm">
                        <span class="section-label">Galeri</span>
                        <h2 class="fw-bold mb-4">Hasil Kerja Kami</h2>
                        <div class="row g-3">
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=900&q=80" alt="Galeri 1" class="gallery-img shadow-sm">
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=900&q=80" alt="Galeri 2" class="gallery-img shadow-sm">
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1511914265870-3d4b6b5b6360?auto=format&fit=crop&w=900&q=80" alt="Galeri 3" class="gallery-img shadow-sm">
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1525609004556-c46c7d6cf023?auto=format&fit=crop&w=900&q=80" alt="Galeri 4" class="gallery-img shadow-sm">
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1494976388531-d1058494cdd8?auto=format&fit=crop&w=900&q=80" alt="Galeri 5" class="gallery-img shadow-sm">
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <img src="https://images.unsplash.com/photo-1511914265870-3d4b6b5b6360?auto=format&fit=crop&w=900&q=80" alt="Galeri 6" class="gallery-img shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="testimoni">
                    <div class="card p-4 shadow-sm">
                        <span class="section-label">Testimoni</span>
                        <h2 class="fw-bold mb-4">Apa Kata Pelanggan Kami</h2>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="testimonial-card p-4 rounded-4 shadow-sm h-100">
                                    <p class="mb-4 text-secondary">"Pelayanan cepat dan hasilnya sangat memuaskan. Mobil jadi seperti baru lagi, dan stafnya sangat ramah."</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">AR</div>
                                        <div>
                                            <h6 class="mb-0">Ari Rahmat</h6>
                                            <small class="text-muted">Pelanggan Setia</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="testimonial-card p-4 rounded-4 shadow-sm h-100">
                                    <p class="mb-4 text-secondary">"Saya suka detailnya. Interior mobil terasa bersih dan harum. Sangat direkomendasikan untuk siapa pun yang ingin perawatan lengkap."</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">DS</div>
                                        <div>
                                            <h6 class="mb-0">Dina Sari</h6>
                                            <small class="text-muted">Pemilik Mobil Pribadi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="testimonial-card p-4 rounded-4 shadow-sm h-100">
                                    <p class="mb-4 text-secondary">"Antar jemputnya membuat segalanya mudah. Saya tidak perlu menunggu lama dan mobil saya dikembalikan dalam kondisi prima."</p>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center">MN</div>
                                        <div>
                                            <h6 class="mb-0">M. Nugroho</h6>
                                            <small class="text-muted">Karyawan Kantor</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="faq">
                    <div class="card p-4 shadow-sm">
                        <span class="section-label">FAQ</span>
                        <h2 class="fw-bold mb-4">Pertanyaan yang Sering Diajukan</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Berapa lama waktu rata-rata cuci mobil?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary">Waktu rata-rata untuk paket cuci standar adalah 30–45 menit. Paket detailing biasanya membutuhkan 1–2 jam berdasarkan kondisi mobil.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Apakah Anda menyediakan layanan antar jemput?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary">Ya, kami menyediakan layanan antar jemput untuk area tertentu. Hubungi tim kami untuk informasi ketersediaan dan jadwal.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Apakah bahan yang digunakan aman untuk cat mobil?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary">Kami menggunakan produk berkualitas tinggi yang lembut namun efektif, dirancang khusus untuk menjaga warna dan permukaan cat agar tidak rusak.</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faqFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Bagaimana cara memesan layanan?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body text-secondary">Silakan hubungi kami melalui telepon, email, atau kunjungi langsung lokasi kami. Tim akan membantu memilih paket dan waktu yang paling sesuai.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12" id="kontak">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="card p-4 shadow-sm h-100">
                                <span class="section-label">Kontak</span>
                                <h2 class="fw-bold mb-3">Hubungi Tim CarWash Company</h2>
                                <p class="text-secondary">Kami siap membantu Anda memesan layanan, menjawab pertanyaan, dan mengatur jadwal cuci mobil terbaik.</p>
                                <ul class="list-unstyled text-secondary mb-4">
                                    <li class="mb-3"><i class="bi bi-geo-alt-fill text-primary me-2"></i>Jl. Contoh No. 23, Jakarta Selatan</li>
                                    <li class="mb-3"><i class="bi bi-telephone-fill text-primary me-2"></i><a href="tel:+628123456789" class="text-secondary text-decoration-none">+62 812 3456 789</a></li>
                                    <li class="mb-3"><i class="bi bi-envelope-fill text-primary me-2"></i><a href="mailto:info@carwashcompany.com" class="text-secondary text-decoration-none">info@carwashcompany.com</a></li>
                                </ul>
                                <a href="mailto:info@carwashcompany.com" class="btn btn-primary">Kirim Email</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card p-4 shadow-sm h-100">
                                <span class="section-label">Lokasi</span>
                                <h3 class="fw-bold mb-3">Kunjungi Kami</h3>
                                <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                                    <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.438906129042!2d106.82249591425946!3d-6.225408962397314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3ec0c9d0bd9%3A0x4d88a98bb90b1c86!2sMonas%2C%20Gambir%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="company-footer rounded-4 p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h5 class="text-white fw-bold">CarWash Company</h5>
                                <p class="text-white-50 mb-0">Memberikan layanan cuci mobil terbaik dengan hasil rapi dan proses profesional.</p>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <a href="#tentang" class="text-white-75 text-decoration-none me-3">Tentang</a>
                                <a href="#layanan" class="text-white-75 text-decoration-none me-3">Layanan</a>
                                <a href="#kontak" class="text-white-75 text-decoration-none">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
