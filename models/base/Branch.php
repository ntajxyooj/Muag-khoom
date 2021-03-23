<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "branch".
 *
 * @property integer $id
 * @property string $branch_name
 * @property integer $status
 *
 * @property \app\models\ItemTransferToWarehouse[] $itemTransferToWarehouses
 * @property \app\models\User[] $users
 * @property \app\models\WarehouseBranch[] $warehouseBranches
 * @property \app\models\Products[] $products
 * @property string $aliasModel
 */
abstract class Branch extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_name'], 'required'],
            [['status'], 'integer'],
            [['branch_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch_name' => 'Branch Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTransferToWarehouses()
    {
        return $this->hasMany(\app\models\ItemTransferToWarehouse::className(), ['branch_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\app\models\User::className(), ['branch_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouseBranches()
    {
        return $this->hasMany(\app\models\WarehouseBranch::className(), ['branch_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\Products::className(), ['id' => 'products_id'])->viaTable('warehouse_branch', ['branch_id' => 'id']);
    }




}
