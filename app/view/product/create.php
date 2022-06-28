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
                                    <h5 class="card-title">Thêm mới danh mục</h5>
                                    <a href="<?= WEB_ROOT . 'category' ?>">
                                        <button type="button" class="btn btn-cyan btn-sm">Quay lại</button>
                                    </a>
                                </div>

                                <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="card">
                                        <form class="form-horizontal store-update-entity" action="<?= WEB_ROOT . 'category/store' ?>" method="post"
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
                                                    <div class="col-md-4">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 text-right control-label col-form-label">Tên
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="name"
                                                                       required
                                                                       value="<?= arrayGet(arrayGet($_SESSION, 'data', []), 'name') ?>"
                                                                       placeholder="Nhập tên danh mục"
                                                                       autocomplete="off">
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
