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
                            <li class="breadcrumb-item active">News Category</li>
                        </ol>
                    </div>
                    <h4>News Category</h4>
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
                </div>
            </div>
        </div>

        <!-- Tabel Data  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category) : ?>
                                        <tr>
                                            <td><?= $category['id'] ?></td>
                                            <td><?= $category['name'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $category['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm delete-category" data-id="<?= $category['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $category['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $category['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $category['id'] ?>">Edit Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form edit data -->
                                                        <form action="<?= base_url('panel/cat_news/update/' . $category['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" class="form-control" name="name" value="<?= $category['name'] ?>">
                                                            </div>
                                                            <!-- Tambahkan input untuk kolom-kolom lainnya jika diperlukan -->
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
                <h5 class="modal-title" id="addModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data -->
                <form action="<?= base_url('panel/cat_news/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <!-- Tambahkan input untuk kolom-kolom lainnya jika diperlukan -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>