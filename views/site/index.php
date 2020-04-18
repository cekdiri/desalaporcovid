<?php 
    $this->title = Yii::t('app', 'Selamat Datang di Aplikasi Desa Lapor Covid-19');
    $this->params['breadcrumbs'][] = $this->title;
    use scotthuangzl\googlechart\GoogleChart;
?>


    <?php if(\yii::$app->user->isGuest):?>
        <?= $this->render('_dashboard_non_login');?>
    <?php else:?>

        <?php 
            switch (\yii::$app->user->identity->userType) {
                case \app\models\User::LEVEL_ADMIN:
                    echo $this->render('_dashboard_admin');
                    # code...
                    break;
                case \app\models\User::LEVEL_POSKO:
                case \app\models\User::LEVEL_PENGGUNA:
                case \app\models\User::LEVEL_ADMIN_DESA:
                    echo $this->render('_dashboard_login');
                    # code...
                    break;
                case \app\models\User::LEVEL_PENGGUNA:
                    echo $this->render('_dashboard_login_pengguna');
                    # code...
                    break;                
                default:

                    # code...
                    break;
            }

        ?>

    <?php endif;?>    

    <div class="row">

        <div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-info-circle"></i> Sekilas Tentang Desa Lapor Covid-19</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-default">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#apa" aria-expanded="false" class="collapsed">
                        Apa Itu Desa Lapor Covid-19 ?
                      </a>
                    </h4>
                  </div>
                  <div id="apa" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      <p><b>Aplikasi Desa Lapor Covid-19</b> merupakan sebuah sistem berbasis web yang berfungsi untuk melakukan pencatatan dan pemantauan data warga yang memiliki gejala covid19 ataupun warga yang datang atau pergi dari wilayah terjangkit covid19.</p>
                      <p><b>Aplikasi Desa Lapor Covid-19</b> dirancang untuk dapat digunakan dari level Desa dan nantinya datanya dapat diakses dan dipantau di level kecamatan, kabupaten / kota, dan bahkan bisa sampai level Provinsi.                        
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-default">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#carakerja" class="collapsed" aria-expanded="false">
                        Cara Kerja Desa Lapor Covid-19
                      </a>
                    </h4>
                  </div>
                  <div id="carakerja" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      <p><b>Penjelasan singkat aplikasi ini sebagai berikut : </b></p>
                      <ul>
                        <li>Warga dapat melaporkan diri sendiri atau warga lain (tetangga) yang mengalami gejala covid19 atau melapor jika anda atau warga lain baru saja datang / akan pergi dari daerah terdampak covid19 (pemudik / perantau).</li>
                        <li>Data laporan warga kemudian akan di verifikasi dan divalidasi oleh posko yang didirikan di setiap wilayah (misal: RT / RW / Puskesmas).</li>
                        <li>Admin di level Desa, Kecamatan, Kab / Kota, dan Provinsi dapat memantau data laporan warga dan memantau kondisi warga terlapor secara cepat.</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="panel box box-default">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#harapan" class="collapsed" aria-expanded="false">
                        Harapan Desa Lapor Covid-19
                      </a>
                    </h4>
                  </div>
                  <div id="harapan" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                        <b>Aplikasi ini bersifat sumber terbuka (Open Source).</b>
                        <p>Besar harapan kami semoga Aplikasi Desa Lapor Covid19 dapat bermanfaat bagi Desa-desa yang ada di Indonesia dalam menanggulangi penyebaran Covid19.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 

        <div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-warning"></i> PERBEDAAN ODP, PDP, DAN SUSPECT VIRUS CORONA</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#odp" aria-expanded="false" class="collapsed">
                        Orang Dalam Pemantauan (ODP)
                      </a>
                    </h4>
                  </div>
                  <div id="odp" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                      <b>Orang dengan status ODP belum menunjukan gejala sakit.</b>
                      <p>
                      Orang dikategori ini sempat berpergian ke negara atau sempat melakukan kontak dengan orang diduga positif corona sehingga harus dilakukan pemantauan.</p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#pdp" class="collapsed" aria-expanded="false">
                        Pasien Dalam Pengawasan (PDP)
                      </a>
                    </h4>
                  </div>
                  <div id="pdp" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                      <b>Orang yang sudah menunjukan gejala terjangkit Covid-19, seperti demam, batuk, pilek, dan sesak napas.</b>
                      <p>PDP harus betul-betul diperlakukan dengan baik karena sudah menjadi pasien.</p>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#otg" class="collapsed" aria-expanded="false">
                        Orang Tanpa Gejala (OTG)
                      </a>
                    </h4>
                  </div>
                  <div id="otg" class="panel-collapse collapse" aria-expanded="false">
                    <div class="box-body">
                        <b>Orang Tanpa Gejala merupakan seseorang yang tidak memiliki gejala dan memiliki risiko tertular dari orang terkonfirmasi COVID-19.</b>
                        <p>Orang yang memiliki riwayat kontak dekat dengan kasus konfirmasi COVID-19 dapat masuk dalam kriteria ini. Seseorang dapat dikatakan telah melakukan kontak erat apabila ia melakukan kontak fisik. berada dalam ruangan, atau berkunjung, dalam 2 hari sebelum kasus timbul gejala hingga 14 hari setelah kasus timbul gejala.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>        
    </div>

    <div class="row">
      <div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-info"></i> Statistik Pemantauan Semua Desa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <?=
                  \dosamigos\highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                                'type' => 'bar'
                        ],
                        'title' => [
                            'text' => 'Statistik Pemantauan desalaporcovid'
                            ],
                        'xAxis' => [
                              'categories' => [
                                  'Pemudik',
                              ]
                          ],
                        'yAxis' => [
                            'title' => [
                                'text' => 'Total Pemudik'
                            ]
                        ],
                        'series' => [
                            ['name' => 'Dalam Pemantauan', 'data' => [\app\models\DataPoskoModel::getStatsDalamPantauan()]],
                            ['name' => 'Selesai Pemantauan', 'data' => [\app\models\DataPoskoModel::getStatsPemantauanSelesai()]]
                        ]
                    ]
                  ]);

                ?>

            </div>
          </div>
        </div>


    </div>

