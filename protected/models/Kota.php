<?php

/**
 * This is the model class for table "kota".
 *
 * The followings are the available columns in table 'kota':
 * @property integer $id
 * @property string $name
 * @property integer $provinsi_id
 * @property string $latitude
 * @property string $longitude
 *
 * The followings are the available model relations:
 * @property PemohonKuasa[] $pemohonKuasas
 * @property Provinsi $provinsi
 */
class Kota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kota the static model class
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
		return 'kota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, provinsi_id', 'required'),
			array('provinsi_id', 'numerical', 'integerOnly'=>true),
			array('latitude, longitude', 'length', 'max'=>24),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, provinsi_id, latitude, longitude', 'safe', 'on'=>'search'),
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
			'pemohonKuasas' => array(self::HAS_MANY, 'PemohonKuasa', 'kota_id'),
			'provinsi' => array(self::BELONGS_TO, 'Provinsi', 'provinsi_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'provinsi_id' => 'Provinsi',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('provinsi_id',$this->provinsi_id);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}