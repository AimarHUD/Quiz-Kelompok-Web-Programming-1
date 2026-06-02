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