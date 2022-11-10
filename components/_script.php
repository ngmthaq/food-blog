<?php if (uri() === ROUTE_HOMEPAGE) : ?>

<?php elseif (uri() === ROUTE_DETAILS) : ?>

<?php elseif (uri() === ROUTE_CREATE_POST) : ?>
    <script src="<?php publicPath("js/ckeditor.js") ?>"></script>
<?php elseif (uri() === ROUTE_UPDATE_POST) : ?>
    <script src="<?php publicPath("js/ckeditor.js") ?>"></script>
<?php endif  ?>
