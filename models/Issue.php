<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property int $ID
 * @property int $PARENT_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $STATUS
 * @property string $PRIORITY
 * @property string $URL
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PARENT_ID'], 'integer'],
            [['NAME'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['NAME'], 'string', 'max' => 30],
            [['STATUS', 'PRIORITY'], 'string', 'max' => 12],
            [['URL'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PARENT_ID' => 'Parent Issue',
            'NAME' => 'Name',
            'DESCRIPTION' => 'Description',
            'STATUS' => 'Status',
            'PRIORITY' => 'Priority',
            'URL' => 'URL',
        ];
    }
}
