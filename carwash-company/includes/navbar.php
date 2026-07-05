<?php require_once __DIR__ . '/../config/auth.php'; $user = currentUser(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="<?php echo BASE_URL; ?>/dashboard/index.php">
            <i class="bi bi-car-front-fill me-2"></i>CarWash Company
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/dashboard/index.php"><i class="bi bi-speedometer2 me-1"></i>Dashboard Utama</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>/company/index.php"><i class="bi bi-building me-1"></i>Company</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['nama'] ?? 'Admin'); ?>&background=ffffff&color=2563eb" alt="profile" class="rounded-circle me-2" width="36" height="36">
                        <span><?php echo e($user['nama'] ?? 'Admin'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/profile/index.php"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/dashboard/company_profile.php"><i class="bi bi-building me-2"></i>Company Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL; ?>/login/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
