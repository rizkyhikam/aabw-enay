<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Blank Page</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Akun 1</h4>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Akun 1</th>
                                <th>Nama Akun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtakun1 as $key => $value): ?>
                            <tr>
                                <td><?=$key +1 ?></td>
                                <td><?=$value->kode_akun1 ?></td>
                                <td><?=$value->nama_akun1 ?></td>
                                <td class="text-center" style="width:20%">
                                    <a href="" class="btn btn-warning"><i class="fas fa-pencil-alt btn-small"></i>Edit</a>
                                    <a href="" class="btn btn-danger"><i class="fas fa-trash-alt btn-small"></i>Del</a>
                                </td>
                            </tr>

                                <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>