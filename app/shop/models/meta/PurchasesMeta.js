import Model from 'yii-steroids/base/Model';

export default class PurchaseMeta extends Model {

    static className = 'app\\shop\\models\\Purchases';

    static fields() {
        return {
            'id': {
                'component': 'InputField',
                'attribute': 'id',
                'type': 'hidden',
                'label': __('ID')
            },
            'userId': {
                'component': 'DropDownField',
                'attribute': 'userId',
                'autoComplete': true,
                'dataProvider': {
                    'action': ''
                },
                'label': __('ID пользователя'),
                'required': true
            },
            'productId': {
                'component': 'DropDownField',
                'attribute': 'productId',
                'autoComplete': true,
                'dataProvider': {
                    'action': ''
                },
                'label': __('ID товара'),
                'required': true
            },
            'createTime': {
                'component': 'DateTimeField',
                'attribute': 'createTime',
                'label': __('Дата добавления')
            }
        };
    }

    static formatters() {
        return {
            'id': {
                'label': __('ID')
            },
            'userId': {
                'label': __('ID пользователя')
            },
            'productId': {
                'label': __('ID товара')
            },
            'createTime': {
                'label': __('Дата добавления')
            }
        };
    }

}
