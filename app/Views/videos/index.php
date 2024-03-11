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
                            <li class="breadcrumb-item active">Videos</li>
                        </ol>
                    </div>
                    <h4>Videos</h4>
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
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Status Show</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($videos as $video) : ?>
                                        <tr>
                                            <td><?= $video['id'] ?></td>
                                            <td><?= $video['title'] ?></td>
                                            <td><?= $video['link'] ?></td>
                                            <td>
                                                <div class="status-badge <?= $video['showed'] === 'on' ? 'green' : 'red' ?>">
                                                    <?= $video['showed'] ?>
                                                </div>
                                            </td>


                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $video['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm delete-video" data-id="<?= $video['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $video['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $video['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $video['id'] ?>">Edit Video</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Edit data form -->
                                                        <form action="<?= base_url('panel/video/update/' . $video['id']); ?>" method="post">
                                                            <div class="form-group">
                                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="title" value="<?= $video['title'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="link">Link <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="link" value="<?= $video['link'] ?>" required>
                                                            </div>
                                                            <!-- Checkbox untuk showed -->
                                                            <div class="form-group">
                                                                <label>Showed <span class="text-danger">*</span></label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="showed" value="on" <?= $video['showed'] === 'on' ? 'checked' : '' ?>>
                                                                    <label class="form-check-label">On</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="showed" value="off" <?= $video['showed'] === 'off' ? 'checked' : '' ?>>
                                                                    <label class="form-check-label">Off</label>
                                                                </div>
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
                <h5 class="modal-title" id="addModalLabel">Add Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add data form -->
                <form action="<?= base_url('panel/video/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link" required>
                    </div>
                    <!-- Checkbox untuk showed -->
                    <div class="form-group">
                        <label>Showed <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="showed" value="on">
                            <label class="form-check-label">On</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="showed" value="off">
                            <label class="form-check-label">Off</label>
                        </div>
                    </div>
                    <!-- Add inputs for other columns if needed -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>