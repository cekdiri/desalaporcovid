<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "data_posko".
 *
 * @property int $id
 * @property string|null $nik
 * @property string|null $nama_warga
 * @property string|null $kelurahan
 * @property string|null $alamat
 * @property string|null $no_telepon
 * @property int|null $jenis_laporan
 * @property string|null $kota_asal
 * @property string|null $kelurahan_datang
 * @property int|null $status
 * @property string|null $keterangan
 * @property int|null $id_posko
 * @property int|null $luar_negeri
 * @property string|null $id_negara
 * @property string|null $waktu_datang
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $updated_at
 * @property int|null $updated_by
 * @property string|null $gender
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 */
class DataPoskoTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_posko';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_laporan', 'status', 'id_posko', 'luar_negeri', 'created_by', 'updated_by'], 'integer'],
            [['keterangan'], 'string'],
            [['waktu_datang', 'created_at', 'updated_at', 'tanggal_lahir'], 'safe'],
            [['nik', 'nama_warga', 'no_telepon', 'tempat_lahir'], 'string', 'max' => 255],
            [['kelurahan', 'kota_asal', 'kelurahan_datang', 'id_negara'], 'string', 'max' => 11],
            [['alamat'], 'string', 'max' => 500],
            [['gender'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nik' => Yii::t('app', 'Nik'),
            'nama_warga' => Yii::t('app', 'Nama Warga'),
            'kelurahan' => Yii::t('app', 'Kelurahan'),
            'alamat' => Yii::t('app', 'Alamat'),
            'no_telepon' => Yii::t('app', 'No Telepon'),
            'jenis_laporan' => Yii::t('app', 'Jenis Laporan'),
            'kota_asal' => Yii::t('app', 'Kota Asal'),
            'kelurahan_datang' => Yii::t('app', 'Kelurahan Datang'),
            'status' => Yii::t('app', 'Status'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'id_posko' => Yii::t('app', 'Id Posko'),
            'luar_negeri' => Yii::t('app', 'Luar Negeri'),
            'id_negara' => Yii::t('app', 'Id Negara'),
            'waktu_datang' => Yii::t('app', 'Waktu Datang'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'gender' => Yii::t('app', 'Gender'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
        ];
    }
}
