<?php

/**
 * This is the model class for table "pemohon_kuasa".
 *
 * The followings are the available columns in table 'pemohon_kuasa':
 * @property integer $id
 * @property string $name
 * @property string $no_ktp
 * @property string $alamat
 * @property string $email
 * @property string $telp
 * @property string $tenaga_ahli
 * @property integer $kota_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Kota $kota
 * @property User $user
 */
class PemohonKuasa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PemohonKuasa the static model class
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
		return 'pemohon_kuasa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, no_ktp, alamat, email, telp, tenaga_ahli, kota_id', 'required', 'message' => '{attribute} harus diisi'),
			array('kota_id, user_id', 'numerical', 'integerOnly'=>true),
			            array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, name, no_ktp, alamat, email, telp, tenaga_ahli, kota_id, user_id', 'safe', 'on'=>'search'),
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
			'kota' => array(self::BELONGS_TO, 'Kota', 'kota_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Nama',
			'no_ktp' => 'No. KTP',
			'alamat' => 'Alamat',
			'email' => 'Email',
			'telp' => 'Telp',
			'tenaga_ahli' => 'Tenaga Ahli',
			'kota_id' => 'Kota',
			'user_id' => 'User',
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
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telp',$this->telp,true);
		$criteria->compare('tenaga_ahli',$this->tenaga_ahli,true);
		$criteria->compare('kota_id',$this->kota_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function pemohonQuery()
	{
            $q = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('user')
                    ->join('persil', 'persil.user_id=user.id')
                    ->where('id=:id', array(':id'=>$id))
                    //->queryRow();
                    ->queryAll();
            return $q;
        }
}