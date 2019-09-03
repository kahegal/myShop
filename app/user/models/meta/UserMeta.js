import Model from 'yii-steroids/base/Model';

export default class UserMeta extends Model {

    static className = 'app\\user\\models\\User';

    static fields() {
        return {
            'id': {
                'component': 'InputField',
                'attribute': 'id',
                'type': 'hidden',
                'label': __('ID')
            },
            'createTime': {
                'component': 'DateTimeField',
                'attribute': 'createTime',
                'label': __('Registration date')
            },
            'name': {
                'component': 'InputField',
                'attribute': 'name',
                'label': __('Name'),
                'required': true
            },
            'balance': {
                'component': 'NumberField',
                'attribute': 'balance',
                'label': __('Баланс'),
                'required': true
            }
        };
    }

    static formatters() {
        return {
            'id': {
                'label': __('ID')
            },
            'createTime': {
                'label': __('Registration date')
            },
            'name': {
                'label': __('Name')
            },
            'balance': {
                'label': __('Баланс')
            }
        };
    }

}
