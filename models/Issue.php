<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property string $priority
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
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['status', 'priority'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent Issue',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'priority' => 'Priority',
            'url' => 'URL',
        ];
    }

    public function relations()
    {
        return array(
            'parent'=>array(self::BELONGS_TO, 'Issue', 'parent_id'),
        );
    }
}
