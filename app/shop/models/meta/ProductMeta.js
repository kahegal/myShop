import Model from 'yii-steroids/base/Model';

export default class ProductMeta extends Model {

    static className = 'app\\shop\\models\\Product';

    static fields() {
        return {
            'id': {
                'component': 'InputField',
                'attribute': 'id',
                'type': 'hidden',
                'label': __('ID')
            },
            'title': {
                'component': 'InputField',
                'attribute': 'title',
                'label': __('Название'),
                'required': true
            },
            'price': {
                'component': 'NumberField',
                'attribute': 'price',
                'label': __('Цена'),
                'required': true
            },
            'createTime': {
                'component': 'DateTimeField',
                'attribute': 'createTime',
                'label': __('Время добавления')
            }
        };
    }

    static formatters() {
        return {
            'id': {
                'label': __('ID')
            },
            'title': {
                'label': __('Название')
            },
            'price': {
                'label': __('Цена')
            },
            'createTime': {
                'label': __('Время добавления')
            }
        };
    }

}
