<?php

/**
 * This is the model class for table "kelurahan".
 *
 * The followings are the available columns in table 'kelurahan':
 * @property integer $id
 * @property integer $kecamatan_id
 * @property string $name
 * @property string $longitude
 * @property string $latitude
 *
 * The followings are the available model relations:
 * @property Kecamatan $kecamatan
 * @property Parkir[] $parkirs
 */
class Kelurahan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kelurahan the static model class
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
		return 'kelurahan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kecamatan_id', 'required'),
			array('kecamatan_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>512),
			array('longitude, latitude', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kecamatan_id, name, longitude, latitude', 'safe', 'on'=>'search'),
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
			'kecamatan' => array(self::BELONGS_TO, 'Kecamatan', 'kecamatan_id'),
			'parkirs' => array(self::HAS_MANY, 'Parkir', 'kelurahan_parkir'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kecamatan_id' => 'Kecamatan',
			'name' => 'Name',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
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
		$criteria->compare('kecamatan_id',$this->kecamatan_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('latitude',$this->latitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}