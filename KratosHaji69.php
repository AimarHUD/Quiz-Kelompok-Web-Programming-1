<?php
$result = null;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nim = trim($_POST['nim'] ?? '');
    $kehadiran = floatval($_POST['kehadiran'] ?? 0);
    $tugas = floatval($_POST['tugas'] ?? 0);
    $project_akhir = floatval($_POST['project_akhir'] ?? 0);

    // Validasi
    if (empty($nama)) $errors[] = "Nama wajib diisi.";
    if (empty($nim)) $errors[] = "NIM wajib diisi.";
    if ($kehadiran < 0 || $kehadiran > 100) $errors[] = "Nilai Kehadiran harus antara 0-100.";
    if ($tugas < 0 || $tugas > 100) $errors[] = "Nilai Tugas harus antara 0-100.";
    if ($project_akhir < 0 || $project_akhir > 100) $errors[] = "Nilai Project Akhir harus antara 0-100.";

    if (empty($errors)) {
        // Bobot Penilaian
        $nilai_akhir = ($kehadiran * 0.20) + ($tugas * 0.25) + ($project_akhir * 0.55);

        // Range Nilai
        if ($nilai_akhir >= 80) $huruf = 'A';
        elseif ($nilai_akhir >= 70) $huruf = 'B';
        elseif ($nilai_akhir >= 60) $huruf = 'C';
        elseif ($nilai_akhir >= 31) $huruf = 'D';
        else $huruf = 'F';

        $result = [
            'nama' => $nama,
            'nim' => $nim,
            'kehadiran' => $kehadiran,
            'tugas' => $tugas,
            'project_akhir' => $project_akhir,
            'nilai_akhir' => round($nilai_akhir, 2),
            'huruf' => $huruf,
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0e0f13;
            --card: #16181f;
            --border: #2a2d38;
            --accent: #c8a96e;
            --accent2: #e8c98e;
            --text: #e8e8e8;
            --muted: #7a7d8a;
            --success: #4caf8a;
            --error: #e05c5c;
            --input-bg: #1e2028;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 16px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header .badge {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent);
            border: 1px solid var(--accent);
            padding: 4px 14px;
            border-radius: 20px;
            margin-bottom: 16px;
        }
        .header h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(28px, 5vw, 42px);
            color: #fff;
            line-height: 1.15;
            margin-bottom: 8px;
        }
        .header p {
            color: var(--muted);
            font-size: 14px;
        }

        /* Main Layout */
        .layout {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 24px;
            width: 100%;
            max-width: 900px;
        }
        @media (max-width: 700px) {
            .layout { grid-template-columns: 1fr; }
        }

        /* Card */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
        }
        .card-title {
            font-family: 'DM Serif Display', serif;
            font-size: 18px;
            color: var(--accent2);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .card-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 18px;
            background: var(--accent);
            border-radius: 2px;
        }

        /* Form Fields */
        .form-group { margin-bottom: 18px; }
        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 7px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            padding: 11px 14px;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(200,169,110,.13);
        }
        .input-hint {
            font-size: 11px;
            color: var(--muted);
            margin-top: 4px;
        }

        /* Bobot badges */
        .bobot-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }
        .bobot-badge {
            font-size: 11px;
            background: rgba(200,169,110,.12);
            color: var(--accent);
            border: 1px solid rgba(200,169,110,.25);
            border-radius: 20px;
            padding: 2px 10px;
            font-weight: 600;
        }

        /* Submit Button */
        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--accent), var(--accent2));
            color: #1a1400;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: opacity .2s, transform .15s;
            margin-top: 8px;
        }
        .btn:hover { opacity: .88; transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }

        /* Errors */
        .errors {
            background: rgba(224,92,92,.1);
            border: 1px solid rgba(224,92,92,.3);
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 18px;
        }
        .errors li {
            color: var(--error);
            font-size: 13px;
            margin-left: 16px;
            margin-bottom: 2px;
        }

        /* Sidebar info */
        .info-block { margin-bottom: 22px; }
        .info-block:last-child { margin-bottom: 0; }
        .info-label {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 10px;
        }
        table.info-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        table.info-table td {
            padding: 7px 10px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }
        table.info-table td:last-child {
            text-align: right;
            color: var(--accent2);
            font-weight: 600;
        }
        table.info-table tr:last-child td { border-bottom: none; }

        /* Jenis Asesmen checkboxes */
        .asesmen-list { list-style: none; }
        .asesmen-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 7px 0;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: var(--text);
        }
        .asesmen-list li:last-child { border-bottom: none; }
        .check { color: var(--success); font-size: 15px; }
        .uncheck { color: var(--border); font-size: 15px; }

        /* Result Card */
        .result-card {
            background: linear-gradient(135deg, #1c1e28, #1a1c24);
            border: 1px solid var(--accent);
            border-radius: 16px;
            padding: 28px;
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 20px;
            align-items: start;
        }
        .result-item {}
        .result-item .rlabel {
            font-size: 11px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 5px;
        }
        .result-item .rval {
            font-family: 'DM Serif Display', serif;
            font-size: 22px;
            color: var(--text);
        }
        .result-item.big .rval {
            font-size: 52px;
            color: var(--accent2);
            line-height: 1;
        }
        .result-badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 4px;
        }
        .grade-A { background: rgba(76,175,138,.18); color: #4caf8a; }
        .grade-B { background: rgba(100,160,220,.18); color: #64a0dc; }
        .grade-C { background: rgba(255,200,80,.18); color: #ffc850; }
        .grade-D { background: rgba(255,140,60,.18); color: #ff8c3c; }
        .grade-F { background: rgba(224,92,92,.18); color: #e05c5c; }

        .result-title {
            grid-column: 1 / -1;
            font-family: 'DM Serif Display', serif;
            font-size: 20px;
            color: var(--accent2);
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .result-title::before {
            content: '✦';
            font-size: 14px;
            color: var(--accent);
        }

        /* divider */
        .divider { border: none; border-top: 1px solid var(--border); margin: 16px 0; }
    </style>
</head>
<body>

<div class="header">
    <div class="badge">Sistem Penilaian</div>
    <h1>Form Penilaian Mahasiswa</h1>
    <p>Masukkan nilai sesuai komponen penilaian yang telah ditentukan</p>
</div>

<div class="layout">

    <!-- Form Utama -->
    <div class="card">
        <div class="card-title">Input Nilai</div>

        <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                    value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" placeholder="Nomor Induk Mahasiswa"
                    value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>">
            </div>

            <hr class="divider">

            <div class="form-group">
                <div class="bobot-row">
                    <label style="margin:0">Kehadiran</label>
                    <span class="bobot-badge">Bobot 20%</span>
                </div>
                <input type="number" name="kehadiran" placeholder="0 - 100" min="0" max="100" step="0.01"
                    value="<?= htmlspecialchars($_POST['kehadiran'] ?? '') ?>">
                <div class="input-hint">Masukkan nilai kehadiran (0–100)</div>
            </div>

            <div class="form-group">
                <div class="bobot-row">
                    <label style="margin:0">Tugas</label>
                    <span class="bobot-badge">Bobot 25%</span>
                </div>
                <input type="number" name="tugas" placeholder="0 - 100" min="0" max="100" step="0.01"
                    value="<?= htmlspecialchars($_POST['tugas'] ?? '') ?>">
                <div class="input-hint">Masukkan nilai tugas (0–100)</div>
            </div>

            <div class="form-group">
                <div class="bobot-row">
                    <label style="margin:0">Project Akhir</label>
                    <span class="bobot-badge">Bobot 55%</span>
                </div>
                <input type="number" name="project_akhir" placeholder="0 - 100" min="0" max="100" step="0.01"
                    value="<?= htmlspecialchars($_POST['project_akhir'] ?? '') ?>">
                <div class="input-hint">Masukkan nilai project akhir (0–100)</div>
            </div>

            <button type="submit" class="btn">Hitung Nilai Akhir →</button>
        </form>
    </div>

    <!-- Sidebar Keterangan -->
    <div style="display:flex; flex-direction:column; gap:20px;">
        <div class="card">
            <div class="card-title" style="font-size:15px;">Jenis Asesmen</div>
            <ul class="asesmen-list">
                <li>Tes Tertulis <span class="check">✓</span></li>
                <li>Tes Lisan <span class="uncheck">—</span></li>
                <li>Tes Kinerja (Praktik) <span class="check">✓</span></li>
                <li>Tugas (Portofolio) <span class="check">✓</span></li>
            </ul>
        </div>

        <div class="card">
            <div class="card-title" style="font-size:15px;">Bobot Penilaian</div>
            <table class="info-table">
                <tr><td>Kehadiran</td><td>20%</td></tr>
                <tr><td>Tugas</td><td>25%</td></tr>
                <tr><td>Project Akhir</td><td>55%</td></tr>
            </table>
        </div>

        <div class="card">
            <div class="card-title" style="font-size:15px;">Range Nilai</div>
            <table class="info-table">
                <tr><td>80 – 100</td><td>A</td></tr>
                <tr><td>70 – 79</td><td>B</td></tr>
                <tr><td>60 – 69</td><td>C</td></tr>
                <tr><td>31 – 50</td><td>D</td></tr>
                <tr><td>0 – 30</td><td>F</td></tr>
            </table>
        </div>
    </div>

    <!-- Hasil -->
    <?php if ($result): ?>
    <div class="result-card">
        <div class="result-title">Hasil Penilaian</div>

        <div class="result-item">
            <div class="rlabel">Nama</div>
            <div class="rval" style="font-size:18px;"><?= htmlspecialchars($result['nama']) ?></div>
        </div>
        <div class="result-item">
            <div class="rlabel">NIM</div>
            <div class="rval" style="font-size:18px;"><?= htmlspecialchars($result['nim']) ?></div>
        </div>
        <div class="result-item">
            <div class="rlabel">Kehadiran (20%)</div>
            <div class="rval"><?= $result['kehadiran'] ?></div>
        </div>
        <div class="result-item">
            <div class="rlabel">Tugas (25%)</div>
            <div class="rval"><?= $result['tugas'] ?></div>
        </div>
        <div class="result-item">
            <div class="rlabel">Project Akhir (55%)</div>
            <div class="rval"><?= $result['project_akhir'] ?></div>
        </div>
        <div class="result-item">
            <div class="rlabel">Nilai Akhir</div>
            <div class="rval"><?= $result['nilai_akhir'] ?></div>
        </div>
        <div class="result-item big">
            <div class="rlabel">Grade</div>
            <div class="rval"><?= $result['huruf'] ?></div>
            <span class="result-badge grade-<?= $result['huruf'] ?>">
                <?php
                $labels = ['A'=>'Sangat Baik','B'=>'Baik','C'=>'Cukup','D'=>'Kurang','F'=>'Tidak Lulus'];
                echo $labels[$result['huruf']];
                ?>
            </span>
        </div>
    </div>
    <?php endif; ?>

</div>
</body>
</html>