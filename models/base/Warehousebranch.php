<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "warehouse_branch".
 *
 * @property integer $products_id
 * @property integer $branch_id
 * @property integer $qautity
 *
 * @property \app\models\Branch $branch
 * @property \app\models\Products $products
 * @property string $aliasModel
 */
abstract class Warehousebranch extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse_branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['products_id', 'branch_id', 'qautity'], 'required'],
            [['products_id', 'branch_id', 'qautity'], 'integer'],
            [['products_id', 'branch_id'], 'unique', 'targetAttribute' => ['products_id', 'branch_id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Branch::className(), 'targetAttribute' => ['branch_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Products::className(), 'targetAttribute' => ['products_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'products_id' => Yii::t('models', 'Products ID'),
            'branch_id' => Yii::t('models', 'Branch ID'),
            'qautity' => Yii::t('models', 'Qautity'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(\app\models\Branch::className(), ['id' => 'branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['id' => 'products_id']);
    }




}