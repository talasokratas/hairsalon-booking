<?php require APPROOT . '/views/partials/header.php' ?>
    <div class="row">
        <div class="col-md-6">
            <h2>Klientų Sarašas</h2>
            <a href="<?= URLROOT; ?>/reservations/Create">Registracija</a>
        </div>
        <div class="col-md-6">
            <form action="<?= URLROOT; ?>/reservations/showbyday<?= $reservation->id ?>" method="post">
                <h3>Pasirinkite datą</h3>
                <input type="date" name="date" value="<?= $data['day']?>">
                <input type="submit" value="Žiūrėti" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Diena</th>
                    <th scope="col">Laikas</th>
                    <th scope="col">Kirpėjas</th>
                    <th scope="col">Klientas</th>
                    <th scope="col">Lankėsi</th>
                    <th scope="col">Nuolaida</th>
                    <th scope="col">Veiksmas</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['reservations'] as $reservation) : ?>
                   <tr>
                        <td><?= $reservation->day ?></td>
                        <td><?= $reservation->time ?></td>
                        <td><?= $reservation->barber ?></td>
                        <td><?= $reservation->client ?></td>
                        <td><?= $reservation->visit ?></td>
                   <?= ($reservation->visit % 5 == 4) ? '<td>10%</td>' : '<td>Nėra</td>' ?>
                   <td>
                       <form action="<?= URLROOT; ?>/reservations/delete/<?= $reservation->id ?>" method="post">
                           <input type="submit" value="Atšaukti" class="btn btn-danger btn-block">
                       </form>
                       <form action="<?= URLROOT; ?>/reservations/confirm/<?= $reservation->id ?>" method="post">
                           <input name="client_id" type="hidden" value="<?= $reservation->client_id ?>">
                           <input type="submit" value="Atlikta" class="btn btn-success btn-block">
                       </form>
                   </td>
                <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php require APPROOT . '/views/partials/footer.php' ?>