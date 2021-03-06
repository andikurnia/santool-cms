<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property integer $parent_id
 * @property string $label
 * @property string $resume
 * @property string $content
 * @property string $type
 * @property integer $position
 * @property string $permalink
 * @property integer $author_id
 * @property string $author_name
 * @property string $author_email
 * @property string $status
 * @property integer $terms_id
 * @property string $date_create
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property TermsRelationships[] $termsRelationships
 * @property User $author
 * @property Terms $terms
 */
class Berita extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Berita the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, position, author_id, terms_id', 'numerical', 'integerOnly'=>true),
			array('label, permalink', 'length', 'max'=>512),
			array('type, author_email', 'length', 'max'=>64),
			array('author_name', 'length', 'max'=>128),
			array('status', 'length', 'max'=>16),
			array('resume, content, date_create, date_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, label, resume, content, type, position, permalink, author_id, author_name, author_email, status, terms_id, date_create, date_modified', 'safe', 'on'=>'search'),
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
			'termsRelationships' => array(self::HAS_MANY, 'TermsRelationships', 'posts_id'),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'terms' => array(self::BELONGS_TO, 'Terms', 'terms_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'label' => 'Label',
			'resume' => 'Resume',
			'content' => 'Content',
			'type' => 'Type',
			'position' => 'Position',
			'permalink' => 'Permalink',
			'author_id' => 'Author',
			'author_name' => 'Author Name',
			'author_email' => 'Author Email',
			'status' => 'Status',
			'terms_id' => 'Terms',
			'date_create' => 'Date Create',
			'date_modified' => 'Date Modified',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('resume',$this->resume,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('permalink',$this->permalink,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('author_name',$this->author_name,true);
		$criteria->compare('author_email',$this->author_email,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('terms_id',$this->terms_id);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        //
        public function getLatestNews(){
            $model = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('posts')
                    ->where("terms_id='2'")
                    ->order('id desc')
                    ->limit(10)
                    ->queryAll();
            return $model;           
        }
}