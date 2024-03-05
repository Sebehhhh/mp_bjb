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

        <!-- Table Data  -->
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
                                        <th>Content</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($news as $item) : ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['title'] ?></td>
                                            <td><?= $item['content'] ?></td>
                                            <td>
                                                <img src="<?= base_url('uploads/news/' . $item['picture']) ?>" alt="News Picture" style="max-width: 100px;">
                                            </td>

                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $item['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm delete-news" data-id="<?= $item['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal<?= $item['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $item['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel<?= $item['id'] ?>">Edit News</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form edit data -->
                                                        <form action="<?= base_url('panel/news/update/' . $item['id']); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="title">Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="title" value="<?= $item['title'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="content">Content <span class="text-danger">*</span></label>
                                                                <textarea class="form-control" name="content" required><?= $item['content'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="picture">Picture</label>
                                                                <!-- Display the previous picture if available -->
                                                                <?php if (!empty($item['picture']) && file_exists(ROOTPATH . 'public/uploads/news/' . $item['picture'])) : ?>
                                                                    <img src="<?= base_url('uploads/news/' . $item['picture']) ?>" alt="Previous Picture" width="100">
                                                                <?php endif; ?>
                                                                <!-- Input for uploading a new picture -->
                                                                <input type="file" class="form-control" name="picture">
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
                <h5 class="modal-title" id="addModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form to add data -->
                <form action="<?= base_url('panel/news/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="picture" required>
                    </div>

                    <!-- Add inputs for other columns if needed -->

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>