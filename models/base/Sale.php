<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "sale".
 *
 * @property integer $id
 * @property string $date
 * @property integer $products_id
 * @property integer $qautity
 * @property integer $user_id
 * @property integer $invoice_id
 * @property string $price
 * @property string $profit_price
 *
 * @property \app\models\Invoice $invoice
 * @property \app\models\Products $products
 * @property \app\models\User $user
 * @property \app\models\SaleHasPurchase[] $saleHasPurchases
 * @property \app\models\PurchaseItem[] $purchaseItems
 * @property string $aliasModel
 */
abstract class Sale extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'products_id', 'qautity', 'user_id', 'invoice_id', 'price'], 'required'],
            [['date'], 'safe'],
            [['products_id', 'qautity', 'user_id', 'invoice_id'], 'integer'],
            [['price', 'profit_price'], 'string', 'max' => 255],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
            [['products_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Products::className(), 'targetAttribute' => ['products_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'date' => Yii::t('models', 'Date'),
            'products_id' => Yii::t('models', 'Products ID'),
            'qautity' => Yii::t('models', 'Qautity'),
            'user_id' => Yii::t('models', 'User ID'),
            'invoice_id' => Yii::t('models', 'Invoice ID'),
            'price' => Yii::t('models', 'Price'),
            'profit_price' => Yii::t('models', 'Profit Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(\app\models\Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['id' => 'products_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleHasPurchases()
    {
        return $this->hasMany(\app\models\SaleHasPurchase::className(), ['sale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseItems()
    {
        return $this->hasMany(\app\models\PurchaseItem::className(), ['id' => 'purchase_item_id'])->viaTable('sale_has_purchase', ['sale_id' => 'id']);
    }




}
