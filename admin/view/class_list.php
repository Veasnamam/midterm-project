<?php include('view/header.php'); ?>
<?php if($classes){ ?>
    <section>
        <header class="list_row list_header">
            <h1> Vehicle Class List</h1>
        </header>
        <table>
            <tr>
                <th>Name</th>
            </tr>
        <?php foreach ($classes as $class):?>
            <tr>
                <td><?= $class['className']; ?></td>
                <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_class">
                    <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else{ ?>
        <p>No Vehicle classes exist yet.</p>
    <?php } ?>
        </table>
</section>

<section>
    <h2>Add Vehicle Class</h2>
    <form action="." method="POST" id="add_class_form">
        <input type="hidden" name="action" value = "add_class"/>
        <div class="row">
            <div class="col-25">
                <label>Name: </label>
            </div>
            <div class="col-75">
                <input type="text" id="class_name" name="class_name" maxlength="30">
            </div>
        </div>
        
        <div class="row">
            <button type="submit" class="add" value="Add Class">Add class</button>
        </div>
    </form>
</section>
<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=show_add_form">Click here</a> to add a vehicle</p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>

<?php include('view/footer.php'); ?>