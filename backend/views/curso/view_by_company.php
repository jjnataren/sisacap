
<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Curso */

$this->title = $model->ID_CURSO;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

  

    <p>
        <?= Html::a('Update', ['Actualizar', 'id' => $model->ID_CURSO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['Borrar', 'id' => $model->ID_CURSO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_CURSO',
            'ID_EMPRESA',
            'ID_INSTRUCTOR',
            'NOMBRE',
            'DURACION_HORAS',
            'FECHA_INICIO',
            'FECHA_TERMINO',
            'AREA_TEMATICA',
            'MODALIDAD_CAPACITACION',
         
        ],
    ]) ?>

</div>
