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
                            <li class="breadcrumb-item active">Events</li>
                        </ol>
                    </div>
                    <h4>Events</h4>
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
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Link</th>
                                    <th>Thumbnail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($events as $event) : ?>
                                    <tr>
                                        <td><?= $event['id'] ?></td>
                                        <td><?= $event['title'] ?></td>
                                        <td><?= $event['description'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($event['date'])) ?></td>
                                        <td><?= $event['link'] ?></td>
                                        <td>
                                            <?php if (!empty($event['thumbnail']) && file_exists(ROOTPATH . 'public/uploads/events/' . $event['thumbnail'])) : ?>
                                                <img src="<?= base_url('uploads/events/' . $event['thumbnail']) ?>" alt="Event Thumbnail" width="50">
                                            <?php else : ?>
                                                <span>No Thumbnail Available</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $event['id'] ?>"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm delete-event" data-id="<?= $event['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $event['id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?= $event['id'] ?>">Edit Event</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Edit data form -->
                                                    <form action="<?= base_url('panel/event/update/' . $event['id']); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="title">Title <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="title" value="<?= $event['title'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Description<span class="text-danger">*</span></label>
                                                            <textarea class="form-control" name="description" required><?= $event['description'] ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date">Date <span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date" value="<?= $event['title'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="link">Link<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="link" value="<?= $event['link'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="thumbnail">Thumbnail<span class="text-danger">*</span></label>
                                                            <?php if (!empty($event['thumbnail']) && file_exists(ROOTPATH . 'public/uploads/events/' . $event['thumbnail'])) : ?>
                                                                <img src="<?= base_url('uploads/events/' . $event['thumbnail']) ?>" alt="Previous Thumbnail" width="100">
                                                            <?php endif; ?>
                                                            <input type="file" class="form-control" name="thumbnail">
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

<!-- Modal Add -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add data form -->
                <form action="<?= base_url('panel/event/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date<span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="thumbnail" required>
                    </div>
                    <!-- Add inputs for other columns if needed -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>