<?php
$this->breadcrumbs=array(
	'Pengaduan'=>array('all'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PostsMain', 'url'=>array('index')),
	array('label'=>'Create PostsMain', 'url'=>array('create')),
);
?>

<h1>Pengaduan yang disetujui</h1>

<?php
	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'striped bordered',
		'dataProvider'=>$gridDataProvider,
		//'template'=>"{items}",
		'columns'=>$gridColumns,
	));
?>