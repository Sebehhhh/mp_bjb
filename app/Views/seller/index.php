<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="wrapper dashborad-h">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group m-0 pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Marketplace</a></li>
                            <li class="breadcrumb-item active">Sellers</li>
                        </ol>
                    </div>
                    <h4>Sellers</h4>
                </div>
            </div>
        </div>

        <!-- Add Button -->
        <div class="row">
            <div class="col-sm-12">
                <div class="text-right mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                        Add
                    </button>
                    <a href="<?= base_url('serial/update') ?>" class="btn btn-success">
                        Random Serial
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Table Data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach (session('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Serial</th>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sellers as $seller) : ?>
                                    <tr>
                                        <td><?= $seller['id'] ?></td>
                                        <td><?= $seller['name'] ?></td>
                                        <td><?= $seller['kode'] ?></td>
                                        <td><?= $seller['serial'] ?></td>
                                        <td>
                                            <?php if (!empty($seller['picture']) && file_exists(ROOTPATH . 'public/uploads/sellers/' . $seller['picture'])) : ?>
                                                <img src="<?= base_url('uploads/sellers/' . $seller['picture']) ?>" alt="Seller Picture" width="50">
                                            <?php else : ?>
                                                <!-- Jika tidak ada foto tersedia, Anda dapat menampilkan placeholder atau pesan alternatif -->
                                                <span>No Picture Available</span>
                                            <?php endif; ?>
                                        </td>

                                        <td><?= $seller['description'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $seller['id'] ?>"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm delete-seller" data-id="<?= $seller['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $seller['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $seller['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $seller['id'] ?>">Edit Seller</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Edit data form -->
                                                    <form action="<?= base_url('panel/seller/update/' . $seller['id']); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name" value="<?= $seller['name'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="code">Code <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="code" value="<?= $seller['kode'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="serial">Serial <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="serial" value="<?= $seller['serial'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="picture">Picture<span class="text-danger">*</span></label>
                                                            <!-- Tampilkan gambar sebelumnya jika ada -->
                                                            <?php if (!empty($seller['picture']) && file_exists(ROOTPATH . 'public/uploads/sellers/' . $seller['picture'])) : ?>
                                                                <img src="<?= base_url('uploads/sellers/' . $seller['picture']) ?>" alt="Previous Picture" width="100">
                                                            <?php endif; ?>
                                                            <!-- Input untuk mengunggah gambar baru -->
                                                            <input type="file" class="form-control" name="picture">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description<span class="text-danger">*</span></label>
                                                            <textarea class="form-control" name="description" required><?= $seller['description'] ?></textarea>
                                                        </div>
                                                        <!-- Add inputs for other columns if needed -->
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Seller</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add data form -->
                <form action="<?= base_url('panel/seller/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="serial">Serial <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="serial" required>
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="picture" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <!-- Add inputs for other columns if needed -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>