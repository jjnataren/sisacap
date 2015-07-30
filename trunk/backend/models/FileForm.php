<?php 

namespace backend\models;
use yii\base\Model;





class FileForm extends Model
{
	

	 /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
	public function rules()
		{
		    return [
		        [['file'], 'file','checkExtensionByMimeType' => false, 'extensions' => 'csv', 'maxSize'=>5242880, 'skipOnEmpty' => false],
		    ];
		}
 
 
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'file' => 'Select a file',
        );
    }
 
}


