<!-- https://codeshack.io/how-to-create-pagination-php-mysql/ -->

<style>
    ul.pagination table {
        border-collapse: collapse;
        width: 500px;
    }

    ul.pagination td, th {
        padding: 10px;
    }

    ul.pagination th {
        background-color: #54585d;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #54585d;
    }

    ul.pagination td {
        color: #636363;
        border: 1px solid #dddfe1;
    }

    ul.pagination tr {
        background-color: #f9fafb;
    }

    ul.pagination tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .pagination {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
    }

    .pagination li {
        box-sizing: border-box;
        padding-right: 10px;
    }

    .pagination li a {
        box-sizing: border-box;
        background-color: #e2e6e6;
        padding: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        color: #616872;
        border-radius: 4px;
    }

    .pagination .next a, .pagination .prev a {
        text-transform: uppercase;
        font-size: 12px;
    }

    ul.pagination li > a {
        padding: .25rem .5rem;
        font-size: 12px;
        color: #fff;
        background-color: #27a9e3;
        border-color: #27a9e3;
    }

    ul.pagination li > a:hover {
        opacity: 0.6;
    }

    .pagination .currentpage a {
        background-color: #b54120;
        color: #fff;
    }
</style>

<?php if (isset($totalPages) && $totalPages > 1): ?>
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="prev"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page - 1 ?>"><<</a></li>
        <?php endif; ?>

        <?php if ($page > 3): ?>
            <li class="start"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=1">1</a></li>
            <li class="dots">...</li>
        <?php endif; ?>

        <?php if ($page - 2 > 0): ?>
            <li class="page"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a>
            </li><?php endif; ?>
        <?php if ($page - 1 > 0): ?>
            <li class="page"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a>
            </li><?php endif; ?>

        <li class="currentpage"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>

        <?php if ($page + 1 < $totalPages + 1): ?>
            <li class="page"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a>
            </li><?php endif; ?>
        <?php if ($page + 2 < $totalPages + 1): ?>
            <li class="page"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a>
            </li><?php endif; ?>

        <?php if ($page < $totalPages - 2): ?>
            <li class="dots">...</li>
            <li class="end"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $totalPages ?>"><?php echo $totalPages ?></a>
            </li>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <li class="next"><a href="<?= basename($_SERVER["SCRIPT_FILENAME"]) ?>?page=<?php echo $page + 1 ?>">>></a></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>