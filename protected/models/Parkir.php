<?php

/**
 * This is the model class for table "parkir".
 *
 * The followings are the available columns in table 'parkir':
 * @property integer $id
 * @property string $nama_perusahaan
 * @property string $alamat_perusahaan
 * @property string $telp_perusahaan
 * @property string $badan_hukum_perusahaan
 * @property integer $jenis_usaha_id
 * @property string $lokasi_parkir
 * @property string $jalan_parkir
 * @property integer $kelurahan_parkir
 * @property integer $kecamatan_parkir
 * @property string $luas_parkir
 * @property string $luas_gedung
 * @property string $daya_tampung_halaman_r2
 * @property string $daya_tampung_halaman_r4
 * @property string $daya_tampung_gedung_r2
 * @property string $daya_tampung_gedung_r4
 * @property string $jam_parkir_1_mulai
 * @property string $jam_parkir_1_selesai
 * @property string $jam_parkir_2_mulai
 * @property string $jam_parkir_2_selesai
 * @property string $jml_petugas_parkir
 * @property integer $status_sewa
 * @property string $foto_pemohon_upl
 * @property string $ktp_pemohon_upl
 * @property string $surat_izin_upl
 * @property string $npwd_upl
 * @property string $surat_izin_tempat_upl
 * @property string $imb_upl
 * @property string $denah_parkir_upl
 * @property string $daftar_petugas_upl
 * @property string $surat_kuasa_upl
 * @property string $akte_pendirian_perusahaan_upl
 * @property string $jaminan_asuransi_upl
 * @property integer $user_id
 * @property integer $kuasa_id
 * @property integer $status
 * @property integer $provinsi_parkir
 * @property integer $kota_parkir
 *
 * The followings are the available model relations:
 * @property JenisUsaha $jenisUsaha
 * @property User $user
 * @property User $kuasa
 * @property Kelurahan $kelurahanParkir
 * @property Kecamatan $kecamatanParkir
 * @property Provinsi $provinsiParkir
 * @property Kota $kotaParkir
 */
class Parkir extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Parkir the static model class
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
		return 'parkir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('telp_perusahaan, jml_petugas_parkir, nama_perusahaan, alamat_perusahaan, badan_hukum_perusahaan, lokasi_parkir, jalan_parkir, jenis_usaha_id, kelurahan_parkir, kecamatan_parkir, status_sewa, user_id, kuasa_id, luas_parkir, luas_gedung, daya_tampung_halaman_r2, daya_tampung_halaman_r4, daya_tampung_gedung_r2, daya_tampung_gedung_r4, jam_parkir_1_mulai, jam_parkir_1_selesai, jam_parkir_2_mulai, jam_parkir_2_selesai, foto_pemohon_upl, ktp_pemohon_upl, surat_izin_upl, npwd_upl, surat_izin_tempat_upl, imb_upl, denah_parkir_upl, daftar_petugas_upl, surat_kuasa_upl, akte_pendirian_perusahaan_upl, jaminan_asuransi_upl', 'required'),
			array('jenis_usaha_id, kelurahan_parkir, kecamatan_parkir, status_sewa, user_id, kuasa_id, status, provinsi_parkir, kota_parkir', 'numerical', 'integerOnly'=>true),
			array('nama_perusahaan, alamat_perusahaan, badan_hukum_perusahaan, lokasi_parkir, jalan_parkir', 'length', 'max'=>256),
			array('telp_perusahaan', 'length', 'max'=>64),
			array('luas_parkir, luas_gedung, daya_tampung_halaman_r2, daya_tampung_halaman_r4, daya_tampung_gedung_r2, daya_tampung_gedung_r4, jam_parkir_1_mulai, jam_parkir_1_selesai, jam_parkir_2_mulai, jam_parkir_2_selesai', 'length', 'max'=>8),
			array('jml_petugas_parkir', 'length', 'max'=>4),
			array('foto_pemohon_upl, ktp_pemohon_upl, surat_izin_upl, npwd_upl, surat_izin_tempat_upl, imb_upl, denah_parkir_upl, daftar_petugas_upl, surat_kuasa_upl, akte_pendirian_perusahaan_upl, jaminan_asuransi_upl', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_perusahaan, alamat_perusahaan, telp_perusahaan, badan_hukum_perusahaan, jenis_usaha_id, lokasi_parkir, jalan_parkir, kelurahan_parkir, kecamatan_parkir, luas_parkir, luas_gedung, daya_tampung_halaman_r2, daya_tampung_halaman_r4, daya_tampung_gedung_r2, daya_tampung_gedung_r4, jam_parkir_1_mulai, jam_parkir_1_selesai, jam_parkir_2_mulai, jam_parkir_2_selesai, jml_petugas_parkir, status_sewa, foto_pemohon_upl, ktp_pemohon_upl, surat_izin_upl, npwd_upl, surat_izin_tempat_upl, imb_upl, denah_parkir_upl, daftar_petugas_upl, surat_kuasa_upl, akte_pendirian_perusahaan_upl, jaminan_asuransi_upl, user_id, kuasa_id, status, provinsi_parkir, kota_parkir', 'safe', 'on'=>'search'),
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
			'jenisUsaha' => array(self::BELONGS_TO, 'JenisUsaha', 'jenis_usaha_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'kuasa' => array(self::BELONGS_TO, 'User', 'kuasa_id'),
			'kelurahanParkir' => array(self::BELONGS_TO, 'Kelurahan', 'kelurahan_parkir'),
			'kecamatanParkir' => array(self::BELONGS_TO, 'Kecamatan', 'kecamatan_parkir'),
			'provinsiParkir' => array(self::BELONGS_TO, 'Provinsi', 'provinsi_parkir'),
			'kotaParkir' => array(self::BELONGS_TO, 'Kota', 'kota_parkir'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_perusahaan' => 'Nama Perusahaan',
			'alamat_perusahaan' => 'Alamat Perusahaan',
			'telp_perusahaan' => 'Telp Perusahaan',
			'badan_hukum_perusahaan' => 'Badan Hukum Perusahaan',
			'jenis_usaha_id' => 'Jenis Usaha',
			'lokasi_parkir' => 'Lokasi Parkir',
			'jalan_parkir' => 'Jalan Parkir',
			'kelurahan_parkir' => 'Kelurahan Parkir',
			'kecamatan_parkir' => 'Kecamatan Parkir',
			'luas_parkir' => 'Luas Parkir',
			'luas_gedung' => 'Luas Gedung',
			'daya_tampung_halaman_r2' => 'Daya Tampung Halaman R2',
			'daya_tampung_halaman_r4' => 'Daya Tampung Halaman R4',
			'daya_tampung_gedung_r2' => 'Daya Tampung Gedung R2',
			'daya_tampung_gedung_r4' => 'Daya Tampung Gedung R4',
			'jam_parkir_1_mulai' => 'Jam Parkir 1 Mulai',
			'jam_parkir_1_selesai' => 'Jam Parkir 1 Selesai',
			'jam_parkir_2_mulai' => 'Jam Parkir 2 Mulai',
			'jam_parkir_2_selesai' => 'Jam Parkir 2 Selesai',
			'jml_petugas_parkir' => 'Jml Petugas Parkir',
			'status_sewa' => 'Status Sewa',
			'foto_pemohon_upl' => 'Upload Foto Pemohon',
			'ktp_pemohon_upl' => 'Upload Ktp Pemohon',
			'surat_izin_upl' => 'Upload Surat Izin',
			'npwd_upl' => 'Uplaod NPWD',
			'surat_izin_tempat_upl' => 'Upload Surat Izin Tempat',
			'imb_upl' => 'Upload IMB',
			'denah_parkir_upl' => 'Upload Denah Parkir',
			'daftar_petugas_upl' => 'Upload Daftar Petugas',
			'surat_kuasa_upl' => 'Uplaod Surat Kuasa',
			'akte_pendirian_perusahaan_upl' => 'Upload Akte Pendirian Perusahaan',
			'jaminan_asuransi_upl' => 'Upload Jaminan Asuransi',
			'user_id' => 'User',
			'kuasa_id' => 'Kuasa',
			'status' => 'Status',
			'provinsi_parkir' => 'Provinsi Parkir',
			'kota_parkir' => 'Kota Parkir',
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
		$criteria->compare('nama_perusahaan',$this->nama_perusahaan,true);
		$criteria->compare('alamat_perusahaan',$this->alamat_perusahaan,true);
		$criteria->compare('telp_perusahaan',$this->telp_perusahaan,true);
		$criteria->compare('badan_hukum_perusahaan',$this->badan_hukum_perusahaan,true);
		$criteria->compare('jenis_usaha_id',$this->jenis_usaha_id);
		$criteria->compare('lokasi_parkir',$this->lokasi_parkir,true);
		$criteria->compare('jalan_parkir',$this->jalan_parkir,true);
		$criteria->compare('kelurahan_parkir',$this->kelurahan_parkir);
		$criteria->compare('kecamatan_parkir',$this->kecamatan_parkir);
		$criteria->compare('luas_parkir',$this->luas_parkir,true);
		$criteria->compare('luas_gedung',$this->luas_gedung,true);
		$criteria->compare('daya_tampung_halaman_r2',$this->daya_tampung_halaman_r2,true);
		$criteria->compare('daya_tampung_halaman_r4',$this->daya_tampung_halaman_r4,true);
		$criteria->compare('daya_tampung_gedung_r2',$this->daya_tampung_gedung_r2,true);
		$criteria->compare('daya_tampung_gedung_r4',$this->daya_tampung_gedung_r4,true);
		$criteria->compare('jam_parkir_1_mulai',$this->jam_parkir_1_mulai,true);
		$criteria->compare('jam_parkir_1_selesai',$this->jam_parkir_1_selesai,true);
		$criteria->compare('jam_parkir_2_mulai',$this->jam_parkir_2_mulai,true);
		$criteria->compare('jam_parkir_2_selesai',$this->jam_parkir_2_selesai,true);
		$criteria->compare('jml_petugas_parkir',$this->jml_petugas_parkir,true);
		$criteria->compare('status_sewa',$this->status_sewa);
		$criteria->compare('foto_pemohon_upl',$this->foto_pemohon_upl,true);
		$criteria->compare('ktp_pemohon_upl',$this->ktp_pemohon_upl,true);
		$criteria->compare('surat_izin_upl',$this->surat_izin_upl,true);
		$criteria->compare('npwd_upl',$this->npwd_upl,true);
		$criteria->compare('surat_izin_tempat_upl',$this->surat_izin_tempat_upl,true);
		$criteria->compare('imb_upl',$this->imb_upl,true);
		$criteria->compare('denah_parkir_upl',$this->denah_parkir_upl,true);
		$criteria->compare('daftar_petugas_upl',$this->daftar_petugas_upl,true);
		$criteria->compare('surat_kuasa_upl',$this->surat_kuasa_upl,true);
		$criteria->compare('akte_pendirian_perusahaan_upl',$this->akte_pendirian_perusahaan_upl,true);
		$criteria->compare('jaminan_asuransi_upl',$this->jaminan_asuransi_upl,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('kuasa_id',$this->kuasa_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('provinsi_parkir',$this->provinsi_parkir);
		$criteria->compare('kota_parkir',$this->kota_parkir);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}