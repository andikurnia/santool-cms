<?php

/**
 * This is the model class for table "uji_berkala".
 *
 * The followings are the available columns in table 'uji_berkala':
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
 *
 * The followings are the available model relations:
 * @property JenisKendaraan $jenisKendaraan
 * @property BahanBakar $bahanBakar
 * @property Merk $merk
 * @property TypeKendaraan $typeKendaraan
 * @property User $user
 */
class UjiBerkala extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UjiBerkala the static model class
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
			array('jenis_kendaraan_id, bahan_bakar_id, merk_id, type_kendaraan_id, user_id', 'numerical', 'integerOnly'=>true),
			array('no_uji, no_kendaraan, no_sk, no_rangka, no_mesin', 'length', 'max'=>64),
			array('tahun', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, no_uji, no_kendaraan, no_sk, no_rangka, no_mesin, tahun, jenis_kendaraan_id, bahan_bakar_id, merk_id, type_kendaraan_id, user_id', 'safe', 'on'=>'search'),
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
                        'kuasa' => array(self::BELONGS_TO, 'Kuasa', 'kuasa_id'),
                        'status' => array(self::BELONGS_TO, 'Status', 'approved'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getDataByUserId(){
            $user_id = Yii::app()->user->id;
            $controller = Yii::app()->controller->id;
            
            if($controller=='ujiberkala'){
                $controller = 1;
            }else{
                $controller = 2;
            }
            
            $model = Yii::app()->db->createCommand()
                    ->select('a.id, a.no_uji, a.no_kendaraan, a.tahun, d.nama as merk, a.approved, e.label as status')
                    ->from('angkutan a')
                    ->leftJoin('user b', 'a.user_id=b.id')
                    ->leftJoin('user c', 'a.kuasa_id=c.id')
                    ->leftJoin('merk d', 'a.merk_id=d.id')
                    ->leftJoin('status e', 'a.approved=e.id')
                    ->leftJoin('angkutan_tipe_transaksi f', 'a.angkutan_tipe_transaksi_id=f.id')
                    ->leftJoin('angkutan_transaksi g', 'f.angkutan_transaksi_id=g.id')
                    ->where("a.user_id=$user_id AND g.id=$controller")
                    ->order('a.id desc')
                    ->queryAll();
            return $model;
        }
        
        public function getDataByPk($id){

            $model = Yii::app()->db->createCommand()
                    ->select('a.id, a.no_uji, a.no_kendaraan, a.tahun, a.masa_berlaku_mulai, a.masa_berlaku_selesai,  d.nama as merk, a.approved, e.label as status')
                    ->from('angkutan a')
                    ->leftJoin('user b', 'a.user_id=b.id')
                    ->leftJoin('user c', 'a.kuasa_id=c.id')
                    ->leftJoin('merk d', 'a.merk_id=d.id')
                    ->leftJoin('status e', 'a.approved=e.id')
                    ->where("a.id=$id")
                    ->queryRow();
            return $model;
        }
}