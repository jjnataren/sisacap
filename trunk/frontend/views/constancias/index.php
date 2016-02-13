<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Obtener mi constancia';
$this->params ['breadcrumbs'] [] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>

<p class="text text-info">Si ya  recibiste  un correo con la
	notificación de  una constancia por favor ingresa tu RFC y
	el código de la constancia que se encuentra en el correo.</p>
	

		



<div class="row">
	<div class="col-md-6 col-xs-12 col-sm-12">
        
        	<?php $form = ActiveForm::begin(['id' => 'constancia-form']); ?>
                <?= $form->field($model, 'rfc_trabajador')?>
                <?= $form->field($model, 'code')?>
                <?= $form->field($model, 'comment')->textArea(['rows' => 6])?>
                <?=$form->field ( $model, 'verifyCode' )->widget ( Captcha::className (), [ 'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>' ] )?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-success', 'name' => 'contact-button'])?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>



	<div class="col-md-6 col-xs-12 col-sm-12">
	
		<?php if($model->constancia_document !== null) :?>
		<div class="panel panel-success">

			<div class="panel-heading">
			<h4>
				<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span>&nbsp;
				Constancia emitida
			</h4>	
			</div>
			<div class="panel-body" align="center" >

					<a href="<?= $model->constancia_document?>" target="_blank">
						 <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="/img/filetype_pdf.png" data-holder-rendered="true">
						<strong> Su constancia </strong>
					</a>

			</div>
		</div>

			<?php endif;?>
		<div class="panel panel-info">

			<div class="panel-heading">
			<h4>
				<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;
				Ayuda
			</h4>	
			</div>
			<div class="panel-body">


				 <div class="media">
      <div class="media-left">
        <a href="#">
          <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="/img/list_accept.png" data-holder-rendered="true">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">1. Completa el formulario</h4>
        Ingresa tu <abbr title="HyperText Markup Language" class="initialism">RFC</abbr> y el  <abbr title="HyperText Markup Language" class="initialism">Identificador</abbr> de la constancia que recibiste  por correo.
        <small>Opcionalmente también puedes dejar un comentario</small>
      </div>
    </div>
    <div class="media">
      <div class="media-left">
        <a href="#">
          <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="/img/user.png" data-holder-rendered="true">
        </a>
      </div>
      <div class="media-body">
        <h4 class="media-heading">2. Ingresa el código de verificación</h4>
       		Este código permite identificar que es un usuario quien está realizando esta actividad
        <div class="media">
          <div class="media-left">
            <a href="#">
              <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="/img/sent.png" data-holder-rendered="true">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">3. Enviar la información</h4>
            	Presiona el botón enviar para solicitar tu constancia.
          </div>
        </div>
      </div>
    </div>
    <div class="media">
      <div class="media-body">
        <h4 class="media-heading">4. Descarga tu constancia</h4>
       	Si tu constancia ya está lista podrás descargarla en el link que te devolverá la página.
      </div>
      <div class="media-right">
        <a href="#">
          <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="/img/download.png" data-holder-rendered="true">
        </a>
      </div>
    </div>


			</div>
		</div>


	</div>

</div>


