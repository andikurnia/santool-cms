<?php

class LoginForm extends CActiveRecord {
    //public $no_ktp; 
    //public $no_paket;    
    
	
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
	
	
    public function rules() { 
        return array( 
            array('username, password', 'required','message'=>'{attribute} harus diisi'),           
            //array('no_paket', 'authenticate'), 
           ); 
        
    }
    
          
   public function attributeLabels() { 
       return array( 'username'=>'No. KTP', 'password'=>'No. Paket', ); 
       
      } 
       
}
?>
