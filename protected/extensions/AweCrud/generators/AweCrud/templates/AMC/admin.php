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
$label = $this->pluralize($this->class2name($this->modelClass));
?>
$this->menu = array(
array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
);

?>

<!-- BEGIN RECENT ORDERS PORTLET-->
<div class="widget">
    <div class="widget-title">
        <h4><i class="icon-tags"></i>  <?php echo "<?php echo Yii::t('AweCrud.app', 'Manage') ?>" ?> <?php echo "<?php echo {$this->modelClass}::label(2) ?>" ?></h4>
        <span class="tools">
            <a href="javascript:;" class="icon-chevron-down"></a>
            <a href="javascript:;" class="icon-remove"></a>
        </span>
    </div>
    <div style="display: block;" class="widget-body">
        <?php echo "    <?php"; ?> 
        $this->widget('bootstrap.widgets.TbGridView',array(
        'id' => '<?php echo $this->class2id($this->modelClass); ?>-grid',
        'type' => ' table striped bordered hover advance',
        "template" => "{items}{summary}{pager}",
        'dataProvider' => $model->search(),
       //'filter' => $model,
        'columns' => array(
        <?php
        $count = 0;
        foreach ($this->tableSchema->columns as $column) {
            if ($column->isPrimaryKey || in_array($column->name, $this->descriptionFields)) {
                continue;
            }
            if (++$count == 7):
                ?>
                /*<?php echo "\n" ?>
            <?php endif; ?>
            <?php echo $this->generateGridViewColumn($this->modelClass, $column) . ",\n" ?>
            <?php
        }
        if ($count >= 7):
            ?>
            */<?php echo "\n" ?>
        <?php endif; ?>
        array(
        'class' => 'CButtonColumn',
        'template' => '{delete} {update}',
        'buttons' => array(
        'update' => array(
        'label' => '<button class="btn btn-primary"><i class="icon-pencil"></i></button>',
        'options' => array('title' => 'Actualizar'),
        'imageUrl' => false,
        ),
        'delete' => array(
        'label' => '<button class="btn btn-danger"><i class="icon-trash"></i></button>',
        'options' => array('title' => 'Eliminar'),
        'imageUrl' => false,
        ),
        ),
        'htmlOptions' => array(
        'width' => '80px'
        )



        ),
        ),
        )); ?>
    </div>
</div>
