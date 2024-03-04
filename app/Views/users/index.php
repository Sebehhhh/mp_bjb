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
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                    <h4>User</h4>
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Talp</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['alamat'] ?></td>
                                            <td><?= $user['telp'] ?></td>
                                            <td><?= $user['role_name'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $user['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm delete-user" data-id="<?= $user['id'] ?>"><i class="fas fa-trash-alt"></i></button>

                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $user['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $user['id'] ?>">Edit user</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('panel/users/update/' . $user['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Password</label>
                                                                <input type="password" class="form-control" name="password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="alamat" value="<?= $user['alamat'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telp">Telp <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="telp" value="<?= $user['telp'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role_id">Role <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="role_id" required>
                                                                    <?php foreach ($roles as $role) : ?>
                                                                        <option value="<?= $role['id'] ?>" <?php if ($role['id'] == $user['role_id']) echo 'selected'; ?>>
                                                                            <?= $role['name'] ?>
                                                                        </option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
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
                <h5 class="modal-title" id="addModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data -->
                <form action="<?= base_url('panel/users/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="telp">
                    </div>
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select class="form-control" name="role_id">
                            <option value="">~ Select Role ~</option>
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Tambahkan input untuk kolom-kolom lainnya jika diperlukan -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>