<?php require APPROOT . '/views/partials/header.php' ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">Diena</th>
                    <th scope="col">Laikas</th>
                    <th scope="col">Kirpėjas</th>
                    <th scope="col">Klientas</th>
                    <th scope="col">Apsilankymas</th>
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
                   <?= ($reservation->visit % 5 == 0) ? '<td>10%</td>' : '<td>Nėra</td>' ?>
                   <td>
                       <form action="<?= URLROOT; ?>/reservations/delete/<?= $reservation->id ?>" method="post">
                           <input type="submit" value="Atšaukti" class="btn btn-danger btn-block">
                       </form>
                       <form action="<?= URLROOT; ?>/reservations/confirm/<?= $reservation->id ?>" method="post">
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