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
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <h4>Products</h4>
                </div>
            </div>
        </div>

        <!-- Add Button -->
        <div class="row">
            <div class="col-sm-12">
                <div class="text-right mb-3">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductModal">
                        Add Product
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
                                        <th>Category</th>
                                        <th>Seller</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['category_name'] ?></td>
                                            <td><?= $product['seller_name'] ?></td>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $product['price'] ?></td>
                                            <td><?= $product['stok'] ?></td>
                                            <td>
                                                <?php if (!empty($product['picture']) && file_exists(ROOTPATH . 'public/uploads/products/' . $product['picture'])) : ?>
                                                    <img src="<?= base_url('uploads/products/' . $product['picture']) ?>" alt="Product Picture" width="50">
                                                <?php else : ?>
                                                    <span>No Picture Available</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editProductModal<?= $product['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm delete-product" data-id="<?= $product['id'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit Product -->
                                        <div class="modal fade" id="editProductModal<?= $product['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel<?= $product['id'] ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editProductModalLabel<?= $product['id'] ?>">Edit Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('panel/product/update/' . $product['id']); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="cat_id">Category <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="cat_id" required>
                                                                    <option value="">Select Category</option>
                                                                    <?php foreach ($categoriesAll as $category) : ?>
                                                                        <option value="<?= $category['id'] ?>" <?= ($product['cat_id'] == $category['id']) ? 'selected' : '' ?>><?= $category['name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="seller_id">Seller <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="seller_id" required>
                                                                    <option value="">Select Seller</option>
                                                                    <?php foreach ($sellersAll as $seller) : ?>
                                                                        <option value="<?= $seller['id'] ?>" <?= ($product['seller_id'] == $seller['id']) ? 'selected' : '' ?>><?= $seller['name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Price<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control rupiah-format" name="price" id="price" value="<?= $product['price'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="stok">Stock<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="stok" value="<?= $product['stok'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="picture">Picture<span class="text-danger">*</span></label>
                                                                <?php if (!empty($product['picture']) && file_exists(ROOTPATH . 'public/uploads/products/' . $product['picture'])) : ?>
                                                                    <img src="<?= base_url('uploads/products/' . $product['picture']) ?>" alt="Previous Picture" width="100">
                                                                <?php endif; ?>
                                                                <input type="file" class="form-control" name="picture">
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

<!-- Modal Add Product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('panel/product/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat_id">Category <span class="text-danger">*</span></label>
                        <select class="form-control" name="cat_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categoriesAll as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seller_id">Seller <span class="text-danger">*</span></label>
                        <select class="form-control" name="seller_id" required>
                            <option value="">Select Seller</option>
                            <?php foreach ($sellersAll as $seller) : ?>
                                <option value="<?= $seller['id'] ?>"><?= $seller['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price<span class="text-danger">*</span></label>
                        <input type="text" class="form-control rupiah-format" name="price" id="price" required>
                    </div>



                    <div class="form-group">
                        <label for="stok">Stock<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="picture" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>