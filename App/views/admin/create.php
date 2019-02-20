<?php require APPROOT . '/views/partials/header.php' ?>
    <div class="row">
        <div class="col-md-4">
            <h2>Klientų Registracija</h2>
            <a href="<?= URLROOT; ?>/reservations">Kirpėjams</a>
        </div>
        <div class="col-md-4">
            <h3>Diena: <?= $data['day'] ?> </h3>
        </div>
        <div class="col-md-4">
            <form action="<?= URLROOT; ?>/reservations/create" method="post">
                <h3>Pasirinkite datą</h3>
                <input type="date" name="date" value="<?= $data['day']?>">
                <input type="submit" value="Žiūrėti" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <table class="table table-dark">
               <tbody>
                   <th>Time</th>
                    <?php foreach($data['barbers'] as $barber) : ?>
                        <th><?=$barber->name ?></th>
                    <?php endforeach; ?>
                    <?php foreach($data['schedule'] as $time => $busyBarbers) : ?>
                        <tr>
                            <td><?=$time ?></td>
                            <?php if(!empty($busyBarbers)) : ?>
                                 <?php if(sizeof($data['barbers']) == sizeof($busyBarbers)) : ?>
                                    <?php foreach($data['barbers'] as $barber) : ?>
                                        <td><span class="btn btn-block btn-danger">Laikas užimtas</span> </td>
                                    <?php endforeach; ?>
                                 <?php else : ?>
                                    <?php foreach($data['barbers'] as $barber) : ?>
                                        <?php if(in_array($barber->id, $busyBarbers)) : ?>
                                            <td><span class="btn btn-block btn-danger">Laikas užimtas</span> </td>
                                        <?php else : ?>
                                            <td>
                                                <form action="<?= URLROOT; ?>/reservations/confirmation/" method="post">
                                                    <input type="hidden" name="date" value="<?= $data['day'] . ' ' . $time ?>">
                                                    <input type="hidden" name="barber" value="<?= $barber->name ?>">
                                                    <input type="hidden" name="barber_id" value="<?= $barber->id ?>">
                                                    <input type="submit" value="Registruoti klientą" class="btn btn-success btn-block">
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <?php foreach($data['barbers'] as $barber) : ?>
                                    <td>
                                        <form action="<?= URLROOT; ?>/reservations/confirmation/" method="post">
                                            <input type="hidden" name="date" value="<?= $data['day'] . ' ' . $time ?>">
                                            <input type="hidden" name="barber" value="<?= $barber->name ?>">
                                            <input type="hidden" name="barber_id" value="<?= $barber->id ?>">
                                            <input type="submit" value="Registruoti klientą" class="btn btn-success btn-block">
                                        </form>
                                    </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                   </tr>
               </tbody>
           </table>
        </div>
    </div>

<?php require APPROOT . '/views/partials/footer.php' ?>