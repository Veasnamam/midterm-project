<?php include('view/header.php'); ?>
<?php if($makes){ ?>
    <section>
        <header>
            <h1> Vehicle Make List</h1>
        </header>
        <table>
            <tr>
                <th>Name</th>
            </tr>
        <?php foreach ($makes as $make):?>
            <tr>
                <td><?= $make['makeName']; ?></td>
                <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_make">
                    <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                    <input type="submit" value="Delete">
                </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php } else{ ?>
        <p>No Vehicle makes exist yet.</p>
    <?php } ?>
        </table>
    </section>
    
    <section>
    <h2>Add Vehicle Make</h2>
    <form action="." method="POST" id="add_make_form">
        <input type="hidden" name="action" value = "add_make"/>
        <div class="row">
            <div class="col-25">
                <label>Name: </label>
            </div>
            <div class="col-75">
                <input type="text" id="make_name" name="make_name" maxlength="30">
            </div>
        </div>
        
        <div class="row">
            <button type="submit" class="add" value="Add Make">Add make</button>
        </div>
    </form>
<p><a href=".?action=list_vehicles">View Full Vehicle List</a></p>
<p><a href=".?action=show_add_form">Click here</a> to add a vehicle</p>
<p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
<p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
</section>

<?php include('view/footer.php'); ?>