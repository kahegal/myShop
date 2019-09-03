import Enum from 'yii-steroids/base/Enum';

export default class BalanceTypeEnumMeta extends Enum {

    static CHARGE = 'charge';
    static BUY = 'buy';

    static getLabels() {
        return {
            [this.CHARGE]: __('Пополнение'),
            [this.BUY]: __('Покупка'),
        };
    }
}
