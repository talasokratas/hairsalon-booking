<?php require APPROOT . '/views/partials/header.php' ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Patvirtinkite registraciją</h2>
                <ul>
                    <li><a href="<?= URLROOT; ?>/reservations">Kirpėjams</a></li>
                    <li><a href="<?= URLROOT; ?>/reservations/create">Registracija</a></li>
                    <li><a href="<?= URLROOT; ?>/">Pradžia</a></li>
                </ul>
                <div class="card">
                    <header class="card-header">
                        <p class="card-title mt-2">Jūsų pasirinktas laikas: <?= $data['date'] ?> </p>
                        <p class="card-title mt-2">Jūsų pasirinktas kirpėjas: <?= $data['barber'] ?></p>
                    </header>
                </div>
                <form action="<?= URLROOT; ?>/reservations/register" method="post">
                    <div class="form-group">
                        <label for="name">Vardas: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg
                    <?= (!empty($data['name_err']))  ? 'is-invalid' : ''; ?>" value="<?= $data['name']?>">
                        <span class="invalid-feedback"><?= $data['name_err'] ?></span>

                    </div>
                    <div class="form-group">
                        <input type="hidden" name="date" value="<?= $data['date'] ?>">
                        <input type="hidden" name="barber_id" value="<?= $data['barber_id']?>">
                        <input type="hidden" name="barber" value="<?= $data['barber']?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Patvirtinti registraciją</button>
                    </div>
                    <small class="text-muted">Paspaudamas registracijos patvirtinimo mygtuką sutinkate su mūsų taisyklėmis.</small>
                </form>

            </div>
        </div>
    </div>


<?php require APPROOT . '/views/partials/footer.php' ?>