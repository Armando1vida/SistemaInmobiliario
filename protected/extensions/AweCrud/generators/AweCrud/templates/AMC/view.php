<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
/** @var AweCrudCode $this */
?>
<?php echo "<?php\n" ?>
/** @var <?php echo $this->controllerClass; ?> $this */
/** @var <?php echo $this->modelClass; ?> $model */
<?php
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
?>

$this->menu=array(
array('label' => Yii::t('AweCrud.app', 'Manage'), 'icon' => 'icon-tags', 'url' => array('admin')),
array('label' => Yii::t('AweCrud.app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);
?>


<div class="widget green">
    <div class="widget-title">
        <h4><i class="icon-eye-open"></i><?php echo "<?php echo Yii::t('AweCrud.app', 'View'); ?> " ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div class="widget-body">
        <?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
        'data' => $model,
        'attributes' => array(
        <?php foreach ($this->tableSchema->columns as $column): ?>
            <?php
            if ($column->isPrimaryKey) {
                continue;
            }
            ?>
            <?php echo $this->generateDetailViewAttribute($this->modelClass, $column) . ",\n" ?>
        <?php endforeach; ?>
        ),
        )); ?>
    </div>
</div>