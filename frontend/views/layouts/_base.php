<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
                ['label' => Yii::t('frontend', 'Acerca de'), 'url' => ['/page/view', 'slug'=>'about']],
            	['label' => Yii::t('frontend', 'Constancias'), 'url' => ['/constancias/index']],
                ['label' => Yii::t('frontend', 'Articulos'), 'url' => ['/article/index']],
                ['label' => Yii::t('frontend', 'Contactos'), 'url' => ['/site/contact']],
            	['label' => Yii::t('frontend', 'Acceso'), 'url' => ['/backend']],
              //  ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
             //   ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
            /*    [
                    'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    'visible'=>!Yii::$app->user->isGuest,
                    'items'=>[
                        [
                            'label' => Yii::t('frontend', 'Account'),
                            'url' => ['/user/default/index']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Profile'),
                            'url' => ['/user/default/profile']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Backend'),
                            'url' => Yii::getAlias('@backendUrl'),
                            'visible'=>Yii::$app->user->can('manager')
                        ],
                        [
                            'label' => Yii::t('frontend', 'Logout'),
                            'url' => ['/user/sign-in/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ]
                    ]
                ],*/
             /* [
                    'label'=>Yii::t('frontend', 'Language'),
                    'items'=>array_map(function($code){
                        return [
                            'label'=>Yii::$app->params['availableLocales'][$code],
                            'url'=>['/site/set-locale', 'locale'=>$code],
                            'active'=>Yii::$app->language == $code
                        ];
                    }, array_keys(Yii::$app->params['availableLocales']))
                ] */
            ], 
        ]);
        NavBar::end();
        ?>

        <?= $content ?>

    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Sistemas y Servicios Ambientales S.A. de C.V. (SISA) <?= date('Y') ?></p>
            <p class="pull-right">Powered by PINFO Soft</p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
