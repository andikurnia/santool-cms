<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 */
class PemohonSendiri extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(			
                        array('no_paket, no_ktp, name, email, pekerjaan, telp, kota_id, alamat', 'required', 'message' => '{attribute} harus diisi'),                        
			//array('username', 'length', 'max'=>32),
            array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, username, role_id, name, email, password, last_name, no_paket, no_ktp, pekerjaan, telp, kota_id, alamat', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
                        'role_id' => 'role_id',
                        'password' => 'password',
                        'last_name' => 'last_name',
                        'name' => 'Nama',
                        'email' => 'Email',                                                
                        'no_paket' => 'No. Paket',
                        'no_ktp' => 'No. KTP',
                        'pekerjaan' => 'Pekerjaan',
                        'telp' => 'Telp',
                        'kota_id' => 'Kota',
                        'alamat' => 'Alamat',                         
		);
	}	
}