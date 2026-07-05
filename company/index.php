<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/navbar.php'; ?>

<?php include __DIR__ . '/Home.php'; ?>

<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>
<?php include __DIR__ . '/../includes/footer.php'; ?>
