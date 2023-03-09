<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Order Lists</h1>
        <ol class="breadcrumb mb-4">
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Driver Name</th>
                            <th>Destination</th>
                            <th>Departure Date</th>
                            <th>Return Date</th>
                            <th>Police No</th>
                            <th>Vehicle Type</th>
                            <th>User</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Driver Name</th>
                            <th>Destination</th>
                            <th>Departure Date</th>
                            <th>Return Date</th>
                            <th>Police No</th>
                            <th>Vehicle Type</th>
                            <th>User</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<?= $this->endSection(); ?>