<?php include ('view/header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <form action="." method="get">
            <input type="hidden" name="action" value="list_vehicles">
        <div class="row">
            <div class="col-75">
            <select name="type_id" required>
                <option value="0">View All Types </option>
                <?php foreach($types as $type): ?>
                    <?php if($type_id == $type['type_id']) { ?>
                        <option value="<?= $type['type_id'] ?>" selected>
                        <?php } else{ ?>
                            <option value="<?= $type['type_id'] ?>">
                            <?php } ?>
                            <?= $type['typeName']?>
                            </option>
                        </option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-75">
            <select name="class_id" required>
                <option value="0">View All Classes</option>
                <?php foreach($classes as $class): ?>
                    <?php if($class_id == $class['class_id']) { ?>
                        <option value="<?= $class['class_id'] ?>" selected>
                        <?php } else{ ?>
                            <option value="<?= $class['class_id'] ?>">
                            <?php } ?>
                            <?= $class['className']?>
                            </option>
                        </option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-75">
            <select name="make_id" required>
                <option value="0">View All Makes</option>
                <?php foreach($makes as $make): ?>
                    <?php if($make_id == $make['make_id']) { ?>
                        <option value="<?= $make['make_id'] ?>" selected>
                        <?php } else{ ?>
                            <option value="<?= $make['make_id'] ?>">
                            <?php } ?>
                            <?= $make['makeName']?>
                            </option>
                        </option>
                <?php endforeach; ?>    
            </select>
            </div>
        </div>

        <div class="row">
            <div class="col-75">
                <p>Sort By: 

                    <form action="." method="get">
                    <input type="radio" name="action" value="sort_price">
                    <label for="price">
                        Price
                    </label>

                    <form action="." method="get">
                    <input type="radio" name="action" value="sort_year">
                    <label for="year">
                        Year
                    </label>
                </p>
            </div>
        </div>

        <div class="row">
            <button class= "add-button bold">GO</button>
        </div>
            </form>
            </form>
    </form> <br>
    </header>
    <table>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
        </tr>
        <?php if($vehicles){ ?>
            <?php foreach($vehicles as $vehicle): ?>
        <tr>
            <td><?= $vehicle['year']?></td>
            <td><?= $vehicle['makeName']?></td>
            <td><?= $vehicle['model']?></td>
            <td><?= $vehicle['typeName'] ?></td>
            <td><?= $vehicle['className']?></td>
            <td>$<?= $vehicle['price']?></td>
        </tr>
        <?php endforeach; ?>
        <?php ?>
    </table>
        <?php }else { ?>
            <br>
            <?php if($type_id || $class_id || $make_id) { ?>
                <p>No Vehicles exist for this type/make/class yet.</p>
                <?php } else { ?>
                    <p>No Vehicles exist yet. </p>
                <?php } ?>
                <br>
                <?php } ?>
</section>

<?php include ('view/footer.php'); ?>