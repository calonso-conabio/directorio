<?php
/* @var $this SectorController */
/* @var $model Sector */

$this->breadcrumbs=array(
	'Sectors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sector', 'url'=>array('index')),
	array('label'=>'Create Sector', 'url'=>array('create')),
	array('label'=>'View Sector', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sector', 'url'=>array('admin')),
);
?>

<h1>Update Sector <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>