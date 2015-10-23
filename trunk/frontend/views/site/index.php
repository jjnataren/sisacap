<?php
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">

    <?= \common\components\widgets\DbCarousel::widget([
        'key'=>'index'
    ]) ?>

    <div class="jumbotron">
        <h1>¡Bienvenidos !</h1>

        <p class="lead">Sistemas y Servicios Ambientales S.A. de C.V. (SISA)</p>

        <?php echo common\components\widgets\DbMenu::widget([
            'key'=>'frontend-index',
            'options'=>[
                'tag'=>'p'
            ]
        ]) ?>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>SISA</h2>

                <p>Es una empresa mexicana fundada en 1998, producto de una alianza estratégica entre las empresas Chaz Scoop Corp. de San Diego CA.  USA y Scientific Products & Services SA de CV de México (SPS).
                   El Objetivo de esta alianza estratégica fue aprovechar la experiencia comercial de Chaz Scoop Corp. en los sistemas electrónicos de purificación de aire y la experiencia de SPS sobre el mercado nacional y la normatividad en México.
                  
                </p>

               <p><a class="btn btn-default" href="http://www.gruposisa.com/index.php?option=com_content&task=blogsection&id=1&Itemid=49">Leer mas... &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Nuestros Clientes</h2>

                
             <p>Comité Estatal para el Fomento y Protección Pecuaria de B. C.<br>

Constructora Doble Triple 3 S. A. de C. V.<br>

Constructora Vivienda S. A. de C. V.<br>

Artesanías Gallardo S. A. de C. V.<br>		

Cactus Automotive Service de México S. de R. L. de C.V. (Camex)<br>

Consultoría Delgadillo & López SC<br>

Ensambles de Precisión S. A de C. V.<br>

FX-Mexicana S. A. de C. V.<br>

Grupo Baja Play S. A. de C. V.<br>

Grupo Medico De La Piedad<br>

Impact SportsWear S de R. L. de C. V.<br>

Industria Textil de Baja S. A. de C. V.<br>

Inmobiliaria Plaza Villa del Río S. A. de C. V.<br>

Mabamex S. A.  de C. V.<br>

Mecalux México S. A. de C. V.<br>

Microprecision Calibration de México<br>

Mueblex de Baja California S. A. de C. V.<br>

</p>

                <p><a class="btn btn-default" href="">Ver mas... &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Asesorías</h2>

               <b></b> <p>DIPLOMADOS: <br><b></b>

Diplomado en Seguridad e Higiene Industrial<br>
Diplomado en Metrología<br>
Diplomado en láseres aplicados a la industria<br>
Diplomado en Fibras Ópticas<br>
Diplomado en Residuos Peligrosos<br>
Diplomado en Sistemas de Administración de Seguridad y Salud en el Trabajo(SASST) basado en la  OHSAS 18001:2007<br>

<h3><b>CURSOS: </b><br></h3>

SEGURIDAD Y SALUD LABORAL:<br>

Evaluación de Incidentes y Accidentes de Trabajo<br>
Cargas Estáticas. Normatividad oficial, técnicas de medición y dispositivos de control.<br>
Ergonomía aplicada a las Líneas de Producción<br>
Seguridad en láseres industriales<br>
Seguridad en equipos que utilizan radiaciones ionizantes y no ionizantes.<br>
Conceptos básicos de Radiaciones ionizantes y no ionizantes.<br>
Evaluación de agentes físicos - Ruido, iluminación, radiaciones etc.</p>

                <p><a class="btn btn-default" href="">Ver mas...&raquo;</a></p>
            </div>
        </div>

    </div>
</div>
