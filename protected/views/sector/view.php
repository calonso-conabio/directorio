<?php
/* @var $this SectorController */
/* @var $model Sector */

$this->breadcrumbs=array(
	'Sectors'=>array('index'),
	$model->idsector,
);

$this->menu=array(
	array('label'=>'List Sector', 'url'=>array('index')),
	array('label'=>'Create Sector', 'url'=>array('create')),
	array('label'=>'Update Sector', 'url'=>array('update', 'id'=>$model->idsector)),
	array('label'=>'Delete Sector', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsector),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sector', 'url'=>array('admin')),
);
?>

<h1>View Sector #<?php echo $model->idsector; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsector',
		'nombre',
		'fec_alta',
		'fec_act',
	),
)); ?>
