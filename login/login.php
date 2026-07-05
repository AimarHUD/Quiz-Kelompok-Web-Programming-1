<?php
require_once __DIR__ . '/../config/session.php';
require_once __DIR__ . '/../includes/functions.php';

if (isLoggedIn()) {
    redirect('/dashboard/index.php');
}

$flash = getFlash();
?>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width: 70px; height: 70px;">
                        <i class="bi bi-car-front-fill fs-2 text-primary"></i>
                    </div>
                    <h2 class="mt-3 fw-bold">CarWash Company</h2>
                    <p class="text-muted">Admin Login Panel</p>
                </div>

                <?php if ($flash): ?>
                    <div class="alert alert-<?php echo e($flash['type']); ?> rounded-3" data-flash-message="<?php echo e($flash['message']); ?>">
                        <?php echo e($flash['message']); ?>
                    </div>
                <?php endif; ?>

                <form action="login_process.php" method="post" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
