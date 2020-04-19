<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\form\JenisLaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jenis Laporan Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-laporan-model-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a(Yii::t('app', 'Create Jenis Laporan Model'), ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'nama_laporan',
                'keterangan',
                'status',
                'kode',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '#',
                    'headerOptions' => ['style' => 'color:#337ab7;text-align:center;'],
                    'template' => '{view} {update}',
                    'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<span class="fa fa-eye"></span> Detail', $url, [
                                            'title' => Yii::t('app', 'view'),
                                            'class'=>'btn btn-success btn-xs modal-form',
                                            'data-size' => 'modal-lg',
                                ]);
                            },

                            'update' => function ($url, $model) {
                                switch (\yii::$app->user->identity->userType) {
                                    case \app\models\User::LEVEL_POSKO:
                                    case \app\models\User::LEVEL_ADMIN:
                                    case \app\models\User::LEVEL_ADMIN_DESA:
                                        return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                    'title' => Yii::t('app', 'update'),
                                                    'class'=>'btn btn-warning btn-xs modal-form',
                                                    'data-size' => 'modal-lg',

                                        ]);
                                        # code...
                                        break;
                                    
                                    default:
                                        if($model->status==\app\models\LaporanModel::STATUS_WAITING)
                                        {
                                            return Html::a('<span class="fa fa-pencil"></span> Ubah', $url, [
                                                        'title' => Yii::t('app', 'update'),
                                                        'class'=>'btn btn-warning btn-xs modal-form',
                                                        'data-size' => 'modal-lg',

                                            ]);                                            
                                        }
                                        # code...
                                        break;
                                }
                            },
                            'delete' => function ($url, $model) {
                                switch (\yii::$app->user->identity->userType) {
                                    case \app\models\User::LEVEL_ADMIN:
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span> Hapus', $url, [
                                                    'title' => Yii::t('app', 'delete'),
                                                    'class'=>'btn btn-danger btn-xs modal-form',
                                                    'data-method'=>'post',
                                                    'data-confirm'=>'Apakah anda yakin akan menghapus data ini ? ',
                                        ]);
                                        # code...
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }
                            }
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
