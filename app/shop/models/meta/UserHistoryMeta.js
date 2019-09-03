import Model from 'yii-steroids/base/Model';

import BalanceTypeEnum from 'app/shop/enums/meta/BalanceTypeEnumMeta';

export default class UserHistoryMeta extends Model {

    static className = 'app\\shop\\models\\UserHistory';

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
            'changeBalanceType': {
                'component': 'DropDownField',
                'attribute': 'changeBalanceType',
                'items': BalanceTypeEnum,
                'label': __('Тип изменения баланса'),
                'required': true
            },
            'createTime': {
                'component': 'DateTimeField',
                'attribute': 'createTime',
                'label': __('Дата добавления')
            },
            'delta': {
                'component': 'NumberField',
                'attribute': 'delta',
                'label': __('Изменение'),
                'required': true
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
            'changeBalanceType': {
                'component': 'EnumFormatter',
                'attribute': 'changeBalanceType',
                'items': BalanceTypeEnum,
                'label': __('Тип изменения баланса')
            },
            'createTime': {
                'label': __('Дата добавления')
            },
            'delta': {
                'label': __('Изменение')
            }
        };
    }

}
