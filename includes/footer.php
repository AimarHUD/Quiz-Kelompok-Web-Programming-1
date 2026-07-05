<!--
  FOOTER SECTION
  Tempelkan blok <footer> ini menggantikan footer lama pada template Anda.
  Pastikan Bootstrap 5 + Bootstrap Icons sudah ter-load di halaman
  (link CDN ada di komentar bawah file ini kalau belum ada).
-->

<footer class="site-footer my-footer-bg">

  <div class="footer-top">
    <div class="container">
      <div class="row gy-4 align-items-start">

        <!-- Logo -->
        <div class="col-lg-3 col-md-4 col-12">
          <div class="footer-logo-wrapper">
            <div class="footer-logo-circle">
              <!-- ganti src di bawah dengan logo perusahaan Anda -->
              <img src="assets/img/logo.png" alt="Nama Perusahaan">
            </div>
          </div>
        </div>

        <!-- Kolom cabang -->
        <div class="col-lg-9 col-md-8 col-12">
          <div class="row gy-4">

            <div class="col-lg-3 col-md-6 col-12">
              <h6 class="footer-branch-title">Cabang Kapuk</h6>
              <ul class="footer-branch-list">
                <li>
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Jalan Kapuk Kayu Besar No.41, Cengkareng Timur, Jakarta Barat</span>
                </li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
              <h6 class="footer-branch-title">Cabang Jelambar</h6>
              <ul class="footer-branch-list">
                <li>
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Jalan Jelambar Barat Raya No.2, Jakarta Barat 13420</span>
                </li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
              <h6 class="footer-branch-title">Sawah Besar</h6>
              <ul class="footer-branch-list">
                <li>
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Jl. Sukarjo Wiryopranoto 2, Sawah Besar, Jakarta Pusat</span>
                </li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
              <h6 class="footer-branch-title">Cabang BSD</h6>
              <ul class="footer-branch-list">
                <li>
                  <i class="bi bi-geo-alt-fill"></i>
                  <span>Jl. BSD Raya Utama, Lengkong Kulon, Kec. Pagedangan, Kab. Tangerang</span>
                </li>
              </ul>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom py-3">
    <div class="container d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div class="footer-copy">
        Copyright &copy; 2026 - Nama Perusahaan All Rights Reserved
      </div>
      <div class="footer-contact d-flex flex-wrap gap-4">
        <div>
          <i class="bi bi-envelope-fill"></i>
          <a href="mailto:info@namaperusahaan.com">info@namaperusahaan.com</a>
        </div>
        <div>
          <i class="bi bi-telephone-fill"></i>
          <a href="tel:+6281234567890">0812-3456-7890</a>
        </div>
      </div>
    </div>
  </div>

</footer>

<!--
  Kalau Bootstrap Icons belum ada, tambahkan di <head>:
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
-->