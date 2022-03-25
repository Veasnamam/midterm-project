<?php include('view/header.php'); ?>
<section>
    <h2>Add Vehicle</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_vehicle">
    <div class="row">
        <div class="col-25">
            <label>Vehicle Make:</label>
        </div>

        <div class="col-75">
            <select name="make_id" required>
                <option value="0">Select Vehicle Make </option>
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
        <div class="col-25">
            <label>Vehicle Type:</label>
        </div>
        <div class="col-75">
            <select name="type_id">
                <option value="0">Select Vehicle Type</option>
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
        <div class="col-25">
            <label>Vehicle Class:</label>
        </div>
        <div class="col-75">
            <select name="class_id">
            <option value="0">Select Vehicle Class</option>
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
        <div class="col-25">
            <label>Year: </label>
        </div>
        <div class="col-75">
            <input type="number" id="year" min="2000" max="2021"  name="year"><br>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Model: </label>
        </div>
        <div class="col-75">
            <input type="text" id="model" name="model"><br>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Price:</label>
        </div>
        <div class="col-75">
            <input type="number" id="price" name="price"><br>
        </div>
    </div>

    <div class="row">
        <div class="col-75">
        <button type="submit" class="add" value="Add Vehicle">Add Vehicle</button>
    </div>
    </div>
    </form>
</section>
<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>

<?php include('view/footer.php'); ?>