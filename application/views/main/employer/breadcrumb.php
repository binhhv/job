
<ul class="breadcrumb bg-white margin-10">
<?php foreach ($breadcrumbs as $key => $value) {

	?>
    <li>
     <?php if ($value['isLink']) {?>
            <a href="<?php echo $value['link']?>"><?php echo $value['title']?></a>
        <?php } else {
		echo $value['title'];
	}
	?>
    </li>
<?php }
?>

</ul>
