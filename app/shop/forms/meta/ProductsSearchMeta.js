import Model from 'yii-steroids/base/Model';

export default class ProductsSearchMeta extends Model {

    static className = 'app\\shop\\forms\\ProductsSearch';

    static fields() {
        return {
            'purchaseCount': {
                'component': 'NumberField',
                'attribute': 'purchaseCount',
                'label': __('Количество покупок')
            },
            'price': {
                'component': 'NumberField',
                'attribute': 'price',
                'label': __('Цена')
            }
        };
    }

}
