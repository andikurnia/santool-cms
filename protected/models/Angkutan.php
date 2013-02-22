<?php

/**
 * This is the model class for table "angkutan".
 *
 * The followings are the available columns in table 'angkutan':
 * @property integer $id
 * @property string $no_uji
 * @property string $no_kendaraan
 * @property string $no_sk
 * @property string $no_rangka
 * @property string $no_mesin
 * @property string $tahun
 * @property integer $jenis_kendaraan_id
 * @property integer $bahan_bakar_id
 * @property integer $merk_id
 * @property integer $type_kendaraan_id
 * @property integer $user_id
 * @property integer $angkutan_tipe_transaksi_id
 *
 * The followings are the available model relations:
 * @property JenisKendaraan $jenisKendaraan
 * @property BahanBakar $bahanBakar
 * @property Merk $merk
 * @property TypeKendaraan $typeKendaraan
 * @property User $user
 */
class Angkutan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Angkutan the static model class
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
		return 'angkutan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_uji, no_kendaraan, no_sk, no_rangka, no_mesin, tahun, jenis_kendaraan_id, bahan_bakar_id, merk_id, type_kendaraan_id, angkutan_tipe_transaksi_id', 'required'),
			array('jenis_kendaraan_id, bahan_bakar_id, merk_id, type_kendaraan_id, user_id, angkutan_tipe_transaksi_id', 'numerical', 'integerOnly'=>true),
			array('no_uji, no_kendaraan, no_sk, no_rangka, no_mesin', 'length', 'max'=>64),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no_uji, no_kendaraan, no_sk, no_rangka, no_mesin, tahun, jenis_kendaraan_id, bahan_bakar_id, merk_id, type_kendaraan_id, user_id, angkutan_tipe_transaksi_id, kuasa_id', 'safe', 'on'=>'search'),
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
			'jenisKendaraan' => array(self::BELONGS_TO, 'JenisKendaraan', 'jenis_kendaraan_id'),
			'bahanBakar' => array(self::BELONGS_TO, 'BahanBakar', 'bahan_bakar_id'),
			'merk' => array(self::BELONGS_TO, 'Merk', 'merk_id'),
			'typeKendaraan' => array(self::BELONGS_TO, 'TypeKendaraan', 'type_kendaraan_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                        'transaksi' => array(self::BELONGS_TO, 'AngkutanTipeTransaksi', 'angkutan_tipe_transaksi_id'),
                        'user' => array(self::BELONGS_TO, 'Kuasa', 'kuasa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'no_uji' => 'No Uji',
			'no_kendaraan' => 'No Kendaraan',
			'no_sk' => 'No Sk',
			'no_rangka' => 'No Rangka',
			'no_mesin' => 'No Mesin',
			'tahun' => 'Tahun',
			'jenis_kendaraan_id' => 'Jenis Kendaraan',
			'bahan_bakar_id' => 'Bahan Bakar',
			'merk_id' => 'Merk',
			'type_kendaraan_id' => 'Type Kendaraan',
			'user_id' => 'User',
                        'kuasa_id' => 'Kuasa',
			'angkutan_tipe_transaksi_id' => 'Jenis Form Uji Berkala',
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
		$criteria->compare('no_uji',$this->no_uji,true);
		$criteria->compare('no_kendaraan',$this->no_kendaraan,true);
		$criteria->compare('no_sk',$this->no_sk,true);
		$criteria->compare('no_rangka',$this->no_rangka,true);
		$criteria->compare('no_mesin',$this->no_mesin,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('jenis_kendaraan_id',$this->jenis_kendaraan_id);
		$criteria->compare('bahan_bakar_id',$this->bahan_bakar_id);
		$criteria->compare('merk_id',$this->merk_id);
		$criteria->compare('type_kendaraan_id',$this->type_kendaraan_id);
		$criteria->compare('user_id',$this->user_id);
                $criteria->compare('kuasa_id',$this->kuasa_id);
		$criteria->compare('angkutan_tipe_transaksi_id',$this->angkutan_tipe_transaksi_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}