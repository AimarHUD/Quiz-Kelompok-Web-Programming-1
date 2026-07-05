CREATE DATABASE IF NOT EXISTS carwash_company;
USE carwash_company;

CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'User') NOT NULL DEFAULT 'User',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS berita (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    isi TEXT NOT NULL,
    gambar VARCHAR(255) DEFAULT NULL,
    kategori VARCHAR(100) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    status ENUM('draft', 'publish') NOT NULL DEFAULT 'draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS pelanggan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    jenis_kendaraan VARCHAR(50) NOT NULL,
    nomor_polisi VARCHAR(20) NOT NULL,
    jenis_paket VARCHAR(50) NOT NULL,
    tanggal DATE NOT NULL,
    jam TIME NOT NULL,
    catatan TEXT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (nama, username, email, password, role) VALUES
('Administrator', 'admin', 'admin@carwash.com', '$2y$10$/0QcGnu.g2zewk0/ZgW5GO.zgaRNGBMIkUnPt5OBQAH1wJkkrLfD2', 'Admin'),
('John Doe', 'johndoe', 'john@carwash.com', '$2y$10$/0QcGnu.g2zewk0/ZgW5GO.zgaRNGBMIkUnPt5OBQAH1wJkkrLfD2', 'User');

INSERT INTO berita (judul, slug, isi, gambar, kategori, penulis, tanggal, status) VALUES
('Peluncuran Layanan Car Wash Premium', 'peluncuran-layanan-car-wash-premium', 'Kami meluncurkan layanan premium untuk kendaraan pribadi dan komersial dengan hasil maksimal.', 'default.jpg', 'Layanan', 'Administrator', '2026-06-30', 'publish'),
('Tips Merawat Body Mobil Setelah Cuci', 'tips-merawat-body-mobil-setelah-cuci', 'Rutin menjaga body mobil akan membuat hasil cuci lebih tahan lama dan kilap.', 'default.jpg', 'Tips', 'Administrator', '2026-06-29', 'publish');
