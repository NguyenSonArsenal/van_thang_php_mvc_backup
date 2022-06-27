<?php require ROOT_VIEW . 'include/head.php' ?>

<div id="main-wrapper">
    <?php require(ROOT_VIEW . 'include/header.php'); ?>
    <?php require(ROOT_VIEW . 'include/sidebar.php'); ?>

    <div class="page-wrapper">
        <div class="content-page teacher-page">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center justify-content-between">
                        <h4 class="page-title">Người dùng</h4>
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
                                <form method="GET" action="<?= WEB_ROOT ?>" class="mb-5" id="form-search">
                                    <div class="form-row">
                                        <div class="col-md-1">
                                            <input type="text" name="id" class="form-control" placeholder="ID" value="<?= arrayGet($_GET, 'id')?>">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="username" class="form-control" placeholder="Tên" value="<?= arrayGet($_GET, 'username')?>">
                                        </div>
                                    </div>

                                    <div class="card-body__head card-body__filter text-center">
                                        <button type="submit" class="btn btn-cyan btn-sm">Tìm kiếm</button>
                                    </div>
                                </form>

                                <div class="card-body__head d-flex">
                                    <h5 class="card-title">Danh sách người dùng</h5>
                                    <a href="<?= WEB_ROOT . 'user/create' ?>" class="btn btn-cyan btn-sm">Thêm</a>
                                </div>

                                <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <table class="table table-striped table-bordered dataTable" role="grid">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Số điện thoại</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($dataList as $key => $item): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?php echo arrayGet($item, 'id'); ?></td>
                                                <td><?php echo arrayGet($item, 'username'); ?></td>
                                                <td><?php echo arrayGet($item, 'email'); ?></td>
                                                <td><?php echo arrayGet($item, 'phone'); ?></td>
                                                <td><?php echo arrayGet($item, 'address'); ?></td>
                                                <td>
                                                    <a href="<?= WEB_ROOT . 'user/edit?id=' . arrayGet($item, 'id') ?>"
                                                        <button type="button" class="btn btn-cyan btn-xs">Sửa</button>
                                                    </a>
                                                    <a href="<?= WEB_ROOT . 'user/delete?id=' . arrayGet($item, 'id') ?>" style="font-size: 13px"
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
