<?php

/**
 * This is the model class for table "type_kendaraan".
 *
 * The followings are the available columns in table 'type_kendaraan':
 * @property integer $id
 * @property string $kode1
 * @property string $kode2
 * @property double $panjang_total
 * @property double $lebar_total
 * @property double $tinggi_total
 * @property double $bagian_depan
 * @property double $bagian_belakang
 * @property double $isi_silinder
 * @property double $daya_motor
 * @property double $sumbu_s1
 * @property double $sumbu_s2
 * @property double $sumbu_s3
 * @property double $sumbu_s4
 * @property string $konfigurasi_sumbu
 * @property double $jbb
 * @property double $jbkb
 * @property double $kemampuan_kend_sb1
 * @property double $kemampuan_kend_sb2
 * @property double $kemampuan_kend_sb3
 * @property double $kemampuan_kend_sb4
 * @property integer $keterangan_id
 * @property integer $perakit_id
 * @property integer $pengimport_id
 * @property integer $merk_id
 * @property integer $status_penggunaan_id
 * @property integer $jenis_kendaraan_bawah_id
 * @property integer $bahan_utama_rumah_id
 * @property integer $jenis_rumah_id
 *
 * The followings are the available model relations:
 * @property UjiBerkala[] $ujiBerkalas
 * @property KeteranganAngkutan $keterangan
 * @property PerakitKendaraan $perakit
 * @property PengimportKendaraan $pengimport
 * @property Merk $merk
 * @property StatusPenggunaan $statusPenggunaan
 * @property JenisKendaraanBawah $jenisKendaraanBawah
 * @property BahanUtamaRumah $bahanUtamaRumah
 * @property JenisRumah $jenisRumah
 */
class TypeKendaraan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TypeKendaraan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type_kendaraan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode1, kode2', 'required', 'message'=>'{attribute} harus diisi'),
			array('keterangan_id, perakit_id, pengimport_id, merk_id, status_penggunaan_id, jenis_kendaraan_bawah_id, bahan_utama_rumah_id, jenis_rumah_id', 'numerical', 'integerOnly'=>true, 'message'=>'{attribute} harus angka'),
			array('panjang_total, lebar_total, tinggi_total, bagian_depan, bagian_belakang, isi_silinder, daya_motor, sumbu_s1, sumbu_s2, sumbu_s3, sumbu_s4, jbb, jbkb, kemampuan_kend_sb1, kemampuan_kend_sb2, kemampuan_kend_sb3, kemampuan_kend_sb4', 'numerical'),
			array('kode1, kode2', 'length', 'max'=>64),
			array('konfigurasi_sumbu', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode1, kode2, panjang_total, lebar_total, tinggi_total, bagian_depan, bagian_belakang, isi_silinder, daya_motor, sumbu_s1, sumbu_s2, sumbu_s3, sumbu_s4, konfigurasi_sumbu, jbb, jbkb, kemampuan_kend_sb1, kemampuan_kend_sb2, kemampuan_kend_sb3, kemampuan_kend_sb4, keterangan_id, perakit_id, pengimport_id, merk_id, status_penggunaan_id, jenis_kendaraan_bawah_id, bahan_utama_rumah_id, jenis_rumah_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ujiBerkalas' => array(self::HAS_MANY, 'UjiBerkala', 'type_kendaraan_id'),
			'keterangan' => array(self::BELONGS_TO, 'KeteranganAngkutan', 'keterangan_id'),
			'perakit' => array(self::BELONGS_TO, 'PerakitKendaraan', 'perakit_id'),
			'pengimport' => array(self::BELONGS_TO, 'PengimportKendaraan', 'pengimport_id'),
			'merk' => array(self::BELONGS_TO, 'Merk', 'merk_id'),
			'statusPenggunaan' => array(self::BELONGS_TO, 'StatusPenggunaan', 'status_penggunaan_id'),
			'jenisKendaraanBawah' => array(self::BELONGS_TO, 'JenisKendaraanBawah', 'jenis_kendaraan_bawah_id'),
			'bahanUtamaRumah' => array(self::BELONGS_TO, 'BahanUtamaRumah', 'bahan_utama_rumah_id'),
			'jenisRumah' => array(self::BELONGS_TO, 'JenisRumah', 'jenis_rumah_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode1' => 'Kode 1 Type Kendaraan',
			'kode2' => 'Kode 2 Type Kendaraan',
			'panjang_total' => 'Panjang Total',
			'lebar_total' => 'Lebar Total',
			'tinggi_total' => 'Tinggi Total',
			'bagian_depan' => 'Bagian Menganjur Ke Depan',
			'bagian_belakang' => 'Bagian Menganjur Ke Belakang',
			'isi_silinder' => 'Isi Silinder',
			'daya_motor' => 'Daya Motor',
			'sumbu_s1' => 'Sumbu S1-S2',
			'sumbu_s2' => 'Sumbu S2-S3',
			'sumbu_s3' => 'Sumbu S3-S4',
			'sumbu_s4' => 'Sumbu S4-S5',
			'konfigurasi_sumbu' => 'Konfigurasi Sumbu',
			'jbb' => 'Jbb',
			'jbkb' => 'Jbkb',
			'kemampuan_kend_sb1' => 'Kemampuan Kend Sb1',
			'kemampuan_kend_sb2' => 'Kemampuan Kend Sb2',
			'kemampuan_kend_sb3' => 'Kemampuan Kend Sb3',
			'kemampuan_kend_sb4' => 'Kemampuan Kend Sb4',
			'keterangan_id' => 'Keterangan',
			'perakit_id' => 'Perakit',
			'pengimport_id' => 'Pengimport',
			'merk_id' => 'Merk Kendaraan',
			'status_penggunaan_id' => 'Status Penggunaan',
			'jenis_kendaraan_bawah_id' => 'Jenis Kendaraan Bawah',
			'bahan_utama_rumah_id' => 'Bahan Utama Rumah',
			'jenis_rumah_id' => 'Jenis Rumah',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('kode1',$this->kode1,true);
		$criteria->compare('kode2',$this->kode2,true);
		$criteria->compare('panjang_total',$this->panjang_total);
		$criteria->compare('lebar_total',$this->lebar_total);
		$criteria->compare('tinggi_total',$this->tinggi_total);
		$criteria->compare('bagian_depan',$this->bagian_depan);
		$criteria->compare('bagian_belakang',$this->bagian_belakang);
		$criteria->compare('isi_silinder',$this->isi_silinder);
		$criteria->compare('daya_motor',$this->daya_motor);
		$criteria->compare('sumbu_s1',$this->sumbu_s1);
		$criteria->compare('sumbu_s2',$this->sumbu_s2);
		$criteria->compare('sumbu_s3',$this->sumbu_s3);
		$criteria->compare('sumbu_s4',$this->sumbu_s4);
		$criteria->compare('konfigurasi_sumbu',$this->konfigurasi_sumbu,true);
		$criteria->compare('jbb',$this->jbb);
		$criteria->compare('jbkb',$this->jbkb);
		$criteria->compare('kemampuan_kend_sb1',$this->kemampuan_kend_sb1);
		$criteria->compare('kemampuan_kend_sb2',$this->kemampuan_kend_sb2);
		$criteria->compare('kemampuan_kend_sb3',$this->kemampuan_kend_sb3);
		$criteria->compare('kemampuan_kend_sb4',$this->kemampuan_kend_sb4);
		$criteria->compare('keterangan_id',$this->keterangan_id);
		$criteria->compare('perakit_id',$this->perakit_id);
		$criteria->compare('pengimport_id',$this->pengimport_id);
		$criteria->compare('merk_id',$this->merk_id);
		$criteria->compare('status_penggunaan_id',$this->status_penggunaan_id);
		$criteria->compare('jenis_kendaraan_bawah_id',$this->jenis_kendaraan_bawah_id);
		$criteria->compare('bahan_utama_rumah_id',$this->bahan_utama_rumah_id);
		$criteria->compare('jenis_rumah_id',$this->jenis_rumah_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getMerkOptions()
        {
            return CHtml::listData(Merk::model()->findAll(), 'id', 'nama');
        }
        
        public function getPerakitKendaraanOptions()
        {
            return CHtml::listData(PerakitKendaraan::model()->findAll(), 'id', 'name');
        }
        
        public function getPengimportKendaraanOptions()
        {
            return CHtml::listData(PengimportKendaraan::model()->findAll(), 'id', 'name');
        }
        
        public function getKeteranganKendaraanOptions()
        {
            return CHtml::listData(KeteranganAngkutan::model()->findAll(), 'id', 'content');
        }
        
        public function getJenisKendaraanBawahOptions()
        {
            return CHtml::listData(JenisKendaraanBawah::model()->findAll(), 'id', 'nama');
        }
        
        public function getBahanUtamaRumahOptions()
        {
            return CHtml::listData(BahanUtamaRumah::model()->findAll(), 'id', 'nama');
        }
        
        public function getStatusPenggunaanOptions()
        {
            return CHtml::listData(StatusPenggunaan::model()->findAll(), 'id', 'nama');
        }
        
        public function getJenisRumahOptions()
        {
            return CHtml::listData(JenisRumah::model()->findAll(), 'id', 'nama');
        }
}