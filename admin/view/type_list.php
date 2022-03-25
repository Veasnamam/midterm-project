<?php include('view/header.php'); ?>
<?php if($types){ ?>
    <section>
        <header>
            <h1> Vehicle Type List</h1>
        </header>
        <table>
            <tr>
                <th>Name</th>
            </tr>
        <?php foreach ($types as $type):?>
            <tr>
                <td><?= $type['typeName']; ?></td>
                <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else{ ?>
        <p>No Vehicle types exist yet.</p>
    <?php } ?>
        </table>
</section>

<section>
    <h2>Add Vehicle Type</h2>
    <form action="." method="POST" id="add_type_form">
        <input type="hidden" name="action" value = "add_type"/>
        <div class="row">
            <div class="col-25">
                <label>Name: </label>
            </div>
            <div class="col-75">
                <input type="text" id="type_name" name="type_name" maxlength="30">
            </div>
        </div>
        
        <div class="row">
            <button type="submit" class="add" value="Add Type">Add Type</button>
        </div>
    </form>
</section>
<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=show_add_form">Click here</a> to add a vehicle</p>
<p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>

<?php include('view/footer.php'); ?>