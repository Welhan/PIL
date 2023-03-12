<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (!empty(session()->getFlashData('message'))) { ?>
    <div class="col-md-5">
        <div class="alert error-message <?= session()->getFlashData('alert') ?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= session()->getFlashData('message') ?>
        </div>
    </div>
<?php } ?>
<div class="card">
    <div class="card-header">
        User <b><?= ucwords($user->Nama); ?></b>
    </div>

    <div class="card-body">
        <table class="table">
            <thead class="text-center">
                <th>Menu</th>
                <th>View</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <?php foreach ($menus as $menu) : ?>
                <tr class="bg-primary">
                    <td><?= $menu->Menu; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php $subs = generateSubmenu($menu->ID); ?>
                <?php foreach ($subs as $sub) : ?>
                    <tr class="text-center">
                        <td><?= $sub->Submenu; ?></td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="viewToggle<?= $sub->ID; ?>" <?= checkAccess($user->ID, $sub->ID, 'view') ? 'checked' : ''; ?> onchange="updateAccess(<?= $user->ID; ?>, <?= $sub->ID; ?>, 'view')">
                                <label class="form-check-label" for="viewToggle<?= $sub->ID; ?>"></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="addToggle<?= $sub->ID; ?>" <?= checkAccess($user->ID, $sub->ID, 'add') ? 'checked' : ''; ?> onchange="updateAccess(<?= $user->ID; ?>, <?= $sub->ID; ?>, 'add')">
                                <label class="form-check-label" for="addToggle<?= $sub->ID; ?>"></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="editToggle<?= $sub->ID; ?>" <?= checkAccess($user->ID, $sub->ID, 'edit') ? 'checked' : ''; ?> onchange="updateAccess(<?= $user->ID; ?>, <?= $sub->ID; ?>, 'edit')">
                                <label class="form-check-label" for="editToggle<?= $sub->ID; ?>"></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" role="switch" id="deleteToggle<?= $sub->ID; ?>" <?= checkAccess($user->ID, $sub->ID, 'delete') ? 'checked' : ''; ?> onchange="updateAccess(<?= $user->ID; ?>, <?= $sub->ID; ?>, 'delete')">
                                <label class="form-check-label" for="deleteToggle<?= $sub->ID; ?>"></label>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    function updateAccess(id, subID, flag) {
        $.ajax({
            method: 'post',
            url: '<?= base_url('/accessMenu'); ?>',
            data: {
                id,
                subID,
                flag
            },
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(response) {
                if (response.error) {
                    if (response.error.logout) {
                        window.location.href = response.error.logout
                    }
                } else {
                    window.location.reload()
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
    }
</script>
<?= $this->endSection(); ?>