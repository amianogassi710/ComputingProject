<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CodeIgniter Pagination with Bootstrap Styles | Example</title>
    <!--link the bootstrap css file-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department Name</th>
                        <th>Head of Department</th>
                        <th>Head of Department</th>
                        <th>Head of Department</th>
                        <th>Head of Department</th>
                    </tr>
                </thead>
                <tbody>
				<a href="<?php echo site_url('Pagination_Controller/index') ?>"> category </a>
				<a href="<?php echo site_url('Pagination_Controller/sort') ?>"> price </a>
                    <?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
                    <tr>
                        <td><?php echo ($page+$i+1); ?></td>
                        <td><?php echo $deptlist[$i]->itemName; ?></td>
                        <td><?php echo $deptlist[$i]->itemPrice; ?></td>
                        <td><?php echo $deptlist[$i]->categoryName; ?></td>
                        <td><a href=""> Description <?php echo $deptlist[$i]->itemID;?> </a></td>
                        <td><a href=""> Add To Cart <?php echo $deptlist[$i]->itemID;?> </a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
</body>
</html>