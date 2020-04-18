<?php 
    use \app\models\CommonHelper;
    $item = \yii::$app->request->pathInfo;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <?php if(!\yii::$app->user->isGuest):?>

        <div class="user-panel">
            <div class="pull-left image">
              <img src="/desalaporcovid-logo.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>@<?= \yii::$app->user->identity->username;?></p>
              <a href="#"><i class="fa fa-user text-success"></i> <?= \yii::$app->user->identity->levelDetail;?></a>
            </div>
        </div>

        <?php switch (\yii::$app->user->identity->userType) {
            case \app\models\User::LEVEL_ADMIN:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/'],'active'=>CommonHelper::getActiveMenu($item,[''])],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan'],'active'=>CommonHelper::getActiveMenu($item,['laporan','laporan/create','laporan/view','laporan/update'])],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Posko', 'icon' => 'save', 'url' => ['/dataposko'],'active'=>CommonHelper::getActiveMenu($item,['dataposko','dataposko/create','dataposko/view','dataposko/update','dataposko/dataharian'])],
                                ],
                            ],
                            [
                                'label' => 'Master Data',
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Daftar Posko', 'icon' => 'file-code-o', 'url' => ['/posko'],'active'=>CommonHelper::getActiveMenu($item,['posko','posko/create','posko/view','posko/update'])],
                                    ['label' => 'Jenis Laporan', 'icon' => 'dashboard', 'url' => ['/jenislaporan'],'active'=>CommonHelper::getActiveMenu($item,['jenislaporan','jenislaporan/create','jenislaporan/view','jenislaporan/update'])],
                                    ['label' => 'Pengguna', 'icon' => 'users', 'url' => ['/users'],'active'=>CommonHelper::getActiveMenu($item,['users','users/create','users/view','users/update'])],
                                ],
                            ],
                            ['label' => 'Panduan Penggunaan', 'icon' => 'book', 'url' => ['/site/panduan']],
                        ],
                    ]
                );
                # code...
                break;
            case \app\models\User::LEVEL_ADMIN_DESA:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/'],'active'=>CommonHelper::getActiveMenu($item,[''])],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan'],'active'=>CommonHelper::getActiveMenu($item,['laporan','laporan/create','laporan/view','laporan/update'])],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Posko', 'icon' => 'save', 'url' => ['/dataposko'],'active'=>CommonHelper::getActiveMenu($item,['dataposko','dataposko/create','dataposko/view','dataposko/update','dataposko/dataharian'])],
                                ],
                            ],
                            [
                                'label' => 'Master Data',
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Daftar Posko', 'icon' => 'file-code-o', 'url' => ['/posko'],'active'=>CommonHelper::getActiveMenu($item,['posko','posko/create','posko/view','posko/update'])],
                                    ['label' => 'Pengguna', 'icon' => 'users', 'url' => ['/users'],'active'=>CommonHelper::getActiveMenu($item,['users','users/create','users/view','users/update'])],
                                ],
                            ],
                            ['label' => 'Panduan Penggunaan', 'icon' => 'book', 'url' => ['/site/panduan']],
                        ],
                    ]
                );
                # code...
                break;

            case \app\models\User::LEVEL_POSKO:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/'],'active'=>CommonHelper::getActiveMenu($item,[''])],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan'],'active'=>CommonHelper::getActiveMenu($item,['laporan','laporan/create','laporan/view','laporan/update'])],
                            // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                            [
                                'label' => 'Input Data Posko',
                                'icon' => 'save',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Data Pantauan Posko', 'icon' => 'save', 'url' => ['/dataposko'],'active'=>CommonHelper::getActiveMenu($item,['dataposko','dataposko/create','dataposko/view','dataposko/update','dataposko/dataharian'])],
                                ],
                            ],
                            ['label' => 'Panduan Penggunaan', 'icon' => 'book', 'url' => ['/site/panduan']],
                        ],
                    ]
                );
                # code...
                break;            
            case \app\models\User::LEVEL_PENGGUNA:
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/'],'active'=>CommonHelper::getActiveMenu($item,[''])],
                            ['label' => 'Lapor Warga', 'icon' => 'file-o', 'url' => ['/laporan'],'active'=>CommonHelper::getActiveMenu($item,['laporan','laporan/create','laporan/view','laporan/update'])],
                            ['label' => 'Panduan Penggunaan', 'icon' => 'book', 'url' => ['/site/panduan']],
                        ],
                    ]
                );
                # code...
                break;           
            default:
                # code...
                break;
        }

        ;?>

        <?php else:?>

        <?php 
                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                        'items' => [
                            ['label' => 'Menu Dasbor', 'options' => ['class' => 'header']],
                            ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/']],
                            ['label' => 'Panduan Penggunaan', 'icon' => 'book', 'url' => ['/site/panduan']],
                        ],
                    ]
                );
        ?>

        <?php endif;?>

    </section>

</aside>
