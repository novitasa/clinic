<?php
//$this->breadcrumbs = array(
//    'Belis' => array('index'),
//    'Manage',
//);

$this->menu = array(
    array('label' => 'List Beli', 'url' => array('index')),
    array('label' => 'Create Beli', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('beli-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Daftar Pembelian Obat</h1>

<!--<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'beli-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'template' => "{items}",
    'columns' => array(
        'id_beli',
        array(
            'header' => 'Nama Obat',
            'value' => 'id_obat',
 //           'value' => '$data->idObat->id_obat->nama',
        ),
        'id_obat',
        'tgltrans',
        'no_faktur',
        'distributor',
        'jlh_beli',
//        array(
//            'class' => 'booster.widgets.TbButtonColumn',
//        ),
    ),
));
?>
