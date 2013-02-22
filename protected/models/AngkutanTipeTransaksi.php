<?php

/**
 * This is the model class for table "angkutan_tipe_transaksi".
 *
 * The followings are the available columns in table 'angkutan_tipe_transaksi':
 * @property integer $id
 * @property integer $angkutan_transaksi_id
 * @property string $name
 * @property string $status
 */
class AngkutanTipeTransaksi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AngkutanTipeTransaksi the static model class
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
		return 'angkutan_tipe_transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('angkutan_transaksi_id', 'required'),
			array('angkutan_transaksi_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('status', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, angkutan_transaksi_id, name, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'angkutan_transaksi_id' => 'Angkutan Transaksi',
			'name' => 'Name',
			'status' => 'Status',
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
		$criteria->compare('angkutan_transaksi_id',$this->angkutan_transaksi_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}