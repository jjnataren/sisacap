<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%test}}".
 *
 * @property integer $id_test
 * @property string $name
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_test' => 'Id Test',
            'name' => 'Name',
        ];
    }
}
