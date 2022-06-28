<?php require ROOT_VIEW . 'include/head.php' ?>

<div id="main-wrapper">
    <?php require(ROOT_VIEW . 'include/header.php'); ?>
    <?php require(ROOT_VIEW . 'include/sidebar.php'); ?>

    <div class="page-wrapper">
        <div class="content-page teacher-page">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Thêm mới</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body__head d-flex">
                                    <h5 class="card-title">Thêm mới sản phẩm</h5>
                                    <a href="<?= WEB_ROOT . 'product' ?>">
                                        <button type="button" class="btn btn-cyan btn-sm">Quay lại</button>
                                    </a>
                                </div>

                                <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="card">
                                        <form class="form-horizontal store-update-entity" action="<?= WEB_ROOT . 'product/store' ?>" method="post"
                                              enctype="multipart/form-data" autocomplete="off">

                                            <?php if (arrayGet($_SESSION, 'message')) { ?>
                                                <div class="alert alert-success alert-dismissible show" role="alert">
                                                    <strong> <?php echo arrayGet($_SESSION, 'message'); ?></strong>
                                                    <?php unset($_SESSION['message']); ?>
                                                </div>
                                            <?php } ?>

                                            <?php if (arrayGet($_SESSION, 'errorValidate')) { ?>
                                                <div class="alert alert-danger alert-dismissible show" role="alert">
                                                    <ul class="mb-0">
                                                        <?php foreach ($_SESSION['errorValidate'] as $error) { ?>
                                                            <li> <?php echo $error ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <?php unset($_SESSION['errorValidate']); ?>
                                            <?php } ?>

                                            <b>Thông tin cơ bản</b>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên *</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="name" required
                                                                       value="<?= arrayGet(arrayGet($_SESSION, 'data', []), 'name') ?>" placeholder="Nhập tên">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ảnh đại diện</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" class="form-control" name="avatar" value="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mô tả ngắn</label>
                                                            <div class="col-sm-8">
                                                        <textarea  type="text" class="form-control" maxlength="255" rows="5"
                                                                   name="sort_describe" placeholder="Nhập mô tả ngắn"><?= arrayGet(arrayGet($_SESSION, 'data', []), 'sort_describe') ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-right control-label col-form-label">Danh mục *</label>
                                                            <div class="col-md-8">
                                                                <div class="my-select2">
                                                                    <select class="my-select2__select2 select2-wrapper" name="category_id" required>
                                                                        <option selected readonly value="">--- Vui lòng chọn ---</option>
                                                                        <?php foreach($dataCategory as $item): ?>
                                                                        <option value="<?= arrayGet($item, 'id') ?>"
                                                                            <?= arrayGet(arrayGet($_SESSION, 'data', []), 'category_id') == arrayGet($item, 'id') ? "selected" : '' ?>>
                                                                            <?= arrayGet($item, 'name') ?>
                                                                        </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giá gốc (VNĐ) *</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="price_origin" required
                                                                       value="<?= arrayGet(arrayGet($_SESSION, 'data', []), 'price_origin') ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Khuyến mại (%)</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" class="form-control" name="sale" max="99" value="<?= arrayGet(arrayGet($_SESSION, 'data', []), 'sale') ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="border-top">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-success">Gửi đi</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if (arrayGet($_SESSION, 'data')) { ?>
    <?php unset($_SESSION['data']); ?>
<?php } ?>

<?php require(ROOT_VIEW . 'include/footer.php'); ?>
