<?php

/**
 * This is the model class for table "syarat_andalalin".
 *
 * The followings are the available columns in table 'syarat_andalalin':
 * @property integer $id
 * @property string $ktp
 * @property string $akte_pendirian
 * @property string $surat_kuasa
 * @property string $skrk
 * @property string $denah_bangunan
 * @property string $surat_tanam
 * @property string $surat_penugasan_ta
 * @property string $surat_persyaratan_ta
 * @property string $dokumen_kerangka
 * @property string $dokumen_analis
 * @property string $dokumen_managemen
 * @property integer $persil_id
 */
class SyaratAndalalin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SyaratAndalalin the static model class
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
		return 'syarat_andalalin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('persil_id, ktp, akte_pendirian, surat_kuasa, skrk, denah_bangunan, surat_tanam, surat_penugasan_ta, surat_persyaratan_ta', 'required'),
			array('persil_id', 'numerical', 'integerOnly'=>true),
			// Please remove those attributes that should not be searched.
			array('ktp, akte_pendirian, surat_kuasa, skrk, denah_bangunan, surat_tanam, surat_penugasan_ta, surat_persyaratan_ta, dokumen_kerangka, dokumen_analis, dokumen_managemen', 'file','types'=>'pdf','allowEmpty'=>true
                            //    'maxSize'=>1024 * 1024 * 50
                            ),
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
			'ktp' => 'Ktp',
			'akte_pendirian' => 'Akte Pendirian',
			'surat_kuasa' => 'Surat Kuasa',
			'skrk' => 'Skrk',
			'denah_bangunan' => 'Denah Bangunan',
			'surat_tanam' => 'Surat Tanam',
			'surat_penugasan_ta' => 'Surat Penugasan Ta',
			'surat_persyaratan_ta' => 'Surat Persyaratan Ta',
			'dokumen_kerangka' => 'Dokumen Kerangka',
			'dokumen_analis' => 'Dokumen Analis',
			'dokumen_managemen' => 'Dokumen Managemen',
			'persil_id' => 'Persil',
		);
	}

	
}