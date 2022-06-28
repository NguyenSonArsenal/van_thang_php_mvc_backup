<?php require ROOT_VIEW . 'include/head.php' ?>

<div id="main-wrapper">
    <?php require(ROOT_VIEW . 'include/header.php'); ?>
    <?php require(ROOT_VIEW . 'include/sidebar.php'); ?>

    <div class="page-wrapper">
        <div class="content-page teacher-page">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center justify-content-between">
                        <h4 class="page-title">Sản phẩm</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <?php if (arrayGet($_SESSION, 'message')) { ?>
                                    <div class="alert alert-success alert-dismissible show" role="alert">
                                        <strong> <?php echo arrayGet($_SESSION, 'message'); ?></strong>
                                        <?php unset($_SESSION['message']); ?>
                                    </div>
                                <?php } ?>

                                <div class="card-body__head card-body__filter">
                                    <h5 class="card-title bold">Bộ lọc</h5>
                                </div>

                                <!-- From search -->
                                <form method="GET" action="<?= WEB_ROOT . 'product' ?>" class="mb-5" id="form-search">
                                    <div class="form-row">
                                        <div class="col-md-1">
                                            <input type="text" name="id" class="form-control" placeholder="ID" value="<?= arrayGet($_GET, 'id')?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="username" class="form-control" placeholder="Tên" value="<?= arrayGet($_GET, 'username')?>">
                                        </div>

                                        <div class="col-md-2">
                                            <div class="my-select2">
                                                <select class="my-select2__select2 select2-wrapper" name="category_id">
                                                    <option selected readonly value="">--- Danh mục ---</option>
                                                    <?php foreach ($dataCategory as $item): ?>
                                                    <option value="<?= arrayGet($item, 'id')?>"
                                                        <?= arrayGet($_GET, 'category_id') == arrayGet($item, 'id') ? "selected" : '' ?>><?= arrayGet($item, 'name') ?></option>
                                                    <?php endforeach;; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="my-select2">
                                                <select class="my-select2__select2 select2-wrapper" name="hot">
                                                    <option selected readonly value="">--- SP Nổi bật ---</option>
                                                    <option value="<?= PRODUCT_HOT ?>" <?= !is_null(arrayGet($_GET, 'hot')) && arrayGet($_GET, 'hot') == PRODUCT_HOT ? "selected" : '' ?>>Có</option>
                                                    <option value="<?= PRODUCT_NO_HOT ?>"  <?= !is_null(arrayGet($_GET, 'hot')) && arrayGet($_GET, 'hot') == PRODUCT_NO_HOT ? "selected" : '' ?>>Không</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body__head card-body__filter text-center">
                                        <button type="submit" class="btn btn-cyan btn-sm">Tìm kiếm</button>
                                    </div>
                                </form>

                                <div class="card-body__head d-flex">
                                    <h5 class="card-title">Danh sách sản phẩm</h5>
                                    <a href="<?= WEB_ROOT . 'product/create' ?>" class="btn btn-cyan btn-sm">Thêm</a>
                                </div>

                                <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <table class="table table-striped table-bordered dataTable" role="grid">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="50px">STT</th>
                                                <th scope="col" width="50px">ID</th>
                                                <th scope="col" width="300px">Tên</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Ảnh đại diện</th>
                                                <th scope="col">Giá (VNĐ)</th>
                                                <th scope="col">Nổi bật</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataList as $key => $item): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?php echo arrayGet($item, 'id'); ?></td>
                                                <td><?php echo arrayGet($item, 'name'); ?></td>
                                                <td><?php echo arrayGet($item, 'c_name'); ?></td>
                                                <td>
                                                    <?php if(arrayGet($item, 'avatar')): ?>
                                                        <img src="<?= WEB_ROOT . arrayGet($item, 'avatar') ?>" alt="" width="50" height="50">
                                                    <?php else: ?>
                                                        <img src="<?= WEB_ROOT . 'public/image/no-image.jpg' ?>" alt="" width="50" height="50">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div>Giá gốc: <?= formatPriceCurrency(arrayGet($item, 'price_origin')); ?></div>
                                                    <div>Sale: <?= arrayGet($item, 'sale'); ?>%</div>
                                                    <div>Giá bán: <?= formatPriceCurrency(arrayGet($item, 'price_sell')); ?></div>
                                                </td>
                                                <td><?= arrayGet($item, 'hot') == PRODUCT_HOT ? "Có" : "Không" ?></td>
                                                <td>
                                                    <a href="<?= WEB_ROOT . 'product/edit?id=' . arrayGet($item, 'id') ?>"
                                                        <button type="button" class="btn btn-cyan btn-xs">Sửa</button>
                                                    </a>
                                                    <a href="<?= WEB_ROOT . 'product/delete?id=' . arrayGet($item, 'id') ?>" style="font-size: 13px"
                                                       onclick="return confirm('Xóa, bạn có chắc không?');">
                                                        <button type="button" class="btn btn-danger btn-xs">Xóa</button>
                                                    </a>
                                                </td>
                                            </tr>
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
    </div>
</div>

<?php if (arrayGet($_SESSION, 'message')) { ?>
    <?php unset($_SESSION['message']); ?>
<?php } ?>

<?php require(ROOT_VIEW . 'include/footer.php'); ?>
