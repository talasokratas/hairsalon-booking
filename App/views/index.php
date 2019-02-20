<?php require APPROOT . '/views/partials/header.php' ?>
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kirpyklos rezervacijos sistema</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Užsiregistruokite arba valdykite registracijas </h6>
                    <a href="<?= URLROOT; ?>/reservations" class="card-link">Kirpėjams</a>
                    <a href="<?= URLROOT; ?>/reservations/create" class="card-link">Klientams</a>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/partials/footer.php' ?>