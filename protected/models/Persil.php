<?php

/**
 * This is the model class for table "persil".
 *
 * The followings are the available columns in table 'persil':
 * @property integer $id
 * @property string $alamat
 * @property integer $luas_tanah
 * @property integer $luas_bangunan
 * @property integer $luas_bangunan_terpotong
 * @property integer $batasan_wajib_luas
 * @property integer $batasan_wajib_unit
 * @property integer $syarat_parkir
 * @property integer $parkir_tersedia
 * @property integer $peruntukan_lahan_id
 * @property integer $penggunaan_lahan_id
 * @property integer $kota_id
 *
 * The followings are the available model relations:
 * @property SyaratAndalalin[] $syaratAndalalins
 * @property PenggunaanLahan $penggunaanLahan
 * @property PeruntukanLahan $peruntukanLahan
 * @property Kota $kota
 */
class Persil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Persil the static model class
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
		return 'persil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.                
                
		return 
            array(                          
			array('alamat, luas_tanah, luas_bangunan, luas_bangunan_terpotong, batasan_wajib_luas, batasan_wajib_unit, syarat_parkir, parkir_tersedia, peruntukan_lahan_id, penggunaan_lahan_id, kota_id', 'required', 'message' => '{attribute} harus diisi'),
			array('luas_tanah, luas_bangunan, luas_bangunan_terpotong, batasan_wajib_luas, batasan_wajib_unit, syarat_parkir, parkir_tersedia, peruntukan_lahan_id, penggunaan_lahan_id, kota_id', 'numerical', 'integerOnly'=>true),
			array('alamat', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.

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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'statusPermohonan' => array(self::BELONGS_TO, 'StatusPermohonan', 'status_permohonan_id'),
			'jenisDokumen' => array(self::BELONGS_TO, 'JenisDokumen', 'jenis_dokumen_id'),
			'statusVerifikasi' => array(self::BELONGS_TO, 'StatusVerifikasi', 'status_verifikasi_id'),
			'statusRapat' => array(self::BELONGS_TO, 'StatusRapat', 'status_rapat_id'),
			'statusHasil' => array(self::BELONGS_TO, 'StatusHasil', 'status_hasil_id'),
			'pemohonKuasa' => array(self::HAS_MANY, 'PemohonKuasa', 'persil_id'),
			'syaratAndalalin' => array(self::HAS_MANY, 'SyaratAndalalin', 'persil_id'),
		);
	}
        

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alamat' => 'Alamat',
			'luas_tanah' => 'Luas Tanah',
			'luas_bangunan' => 'Luas Bangunan',
			'luas_bangunan_terpotong' => 'Luas Bangunan Setelah Terpotong GS, GSB',
			'batasan_wajib_luas' => 'Batasan Wajib Menyusun Andalalin',
			'batasan_wajib_unit' => 'Batasan Wajib Menyusun Andalalin Unit',
			'syarat_parkir' => 'Jumlah/Syarat Parkir Sesuai SKRK',
			'parkir_tersedia' => 'Data Parkir Yang Tersedia',
			'peruntukan_lahan_id' => 'Peruntukan Lahan',
			'penggunaan_lahan_id' => 'Penggunaan Lahan',
			'kota_id' => 'Kota',
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
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('luas_tanah',$this->luas_tanah);
		$criteria->compare('luas_bangunan',$this->luas_bangunan);
		$criteria->compare('luas_bangunan_terpotong',$this->luas_bangunan_terpotong);
		$criteria->compare('batasan_wajib_luas',$this->batasan_wajib_luas);
		$criteria->compare('batasan_wajib_unit',$this->batasan_wajib_unit);
		$criteria->compare('syarat_parkir',$this->syarat_parkir);
		$criteria->compare('parkir_tersedia',$this->parkir_tersedia);
		$criteria->compare('peruntukan_lahan_id',$this->peruntukan_lahan_id);
		$criteria->compare('penggunaan_lahan_id',$this->penggunaan_lahan_id);
		$criteria->compare('kota_id',$this->kota_id);
                $criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getPeruntukanLahanOptions()
        {
            return CHtml::listData(PeruntukanLahan::model()->findAll(), 'id', 'name');
        }
        
        public function getPenggunaanLahanOptions()
        {
            return CHtml::listData(PenggunaanLahan::model()->findAll(), 'id', 'name');                  
        }
        
        public function getKotaOptions()
        {
            return CHtml::listData(Kota::model()->findAll(), 'id', 'name');        
        }
        
        
}