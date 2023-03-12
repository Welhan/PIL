<?= $this->extend("Layout/Template"); ?>

<?= $this->section("content"); ?>
<div class="card mb-4">
    <div class="card-header">
        <div class="text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i> Add New
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Division</th>
                    <th>HP</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Division</th>
                    <th>HP</th>
                    <th>Active</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= ucwords($user->Nama); ?></td>
                        <td><?= $user->Email; ?></td>
                        <td><?= $user->divisiName; ?></td>
                        <td><?= $user->NoHP; ?></td>
                        <td><?= ($user->Active) ? 'Active' : 'Not Active'; ?></td>
                        <td>
                            <form action="/access" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="user_id" value="<?= $user->ID; ?>">
                                <button type="s" class="btn btn-info btn-sm"><i class="fas fa-tools"></i></button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addDocuments" method="POST">
                    <div class="mb-3">
                        <label for="User" class="col-form-label">User</label>
                        <input type="text" class="form-control" value="<?= session('Nama'); ?>" name="User" id="User" readonly>
                    </div>
                    <div class="mb-5">
                        <label for="Email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" value="<?= session('Email'); ?>" name="Email" id="Email" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Driver" class="col-form-label">Driver</label>
                        <select name="Driver" class="form-select">
                            <option value="">-- Select Driver -- </option>
                            <option value="Santoso">Santoso</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Destination" class="col-form-label">Destination</label>
                        <input type="text" class="form-control" name="Destination" id="Destination">
                    </div>
                    <div class="mb-3">
                        <label for="Departure" class="col-form-label">Departure Date</label>
                        <input type="datetime-local" class="form-control" name="Departure" id="Departure">
                    </div>
                    <div class="mb-3">
                        <label for="Return" class="col-form-label">Return Date</label>
                        <input type="datetime-local" class="form-control" name="Return" id="Return">
                    </div>
                    <div class="mb-3">
                        <label for="PoliceNo" class="col-form-label">Police No</label>
                        <select name="PoliceNo" class="form-select">
                            <option value="">-- Select Police No -- </option>
                            <option value="B 1245 CCC">B 1245 CCC</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Vehicle" class="col-form-label">Vehicle Type</label>
                        <select name="Vehicle" class="form-select">
                            <option value="">-- Select Vehicle -- </option>
                            <option value="Kijang Innova Zenix">Kijang Innova Zenix</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="col-form-label">Description</label>
                        <input type="text" class="form-control" name="Description" id="Description">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>