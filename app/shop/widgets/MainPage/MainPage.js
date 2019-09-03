import React from 'react';
import PropTypes from 'prop-types';
import {connect} from 'react-redux';
import {refresh} from 'yii-steroids/actions/list';
import Button from 'yii-steroids/ui/form/Button';
import Grid from 'yii-steroids/ui/list/Grid';
import Pagination from 'yii-steroids/ui/list/Pagination';
import DropDownField from 'yii-steroids/ui/form/DropDownField';
import _find from 'lodash/find';
import {openModal} from 'yii-steroids/actions/modal';
import AddUserModal from '../AddUserModal'
import ChargeBalanceModal from '../ChargeBalanceModal'
import AddProductModal from '../AddProductModal'
import ModalWrapper from 'yii-steroids/ui/modal/ModalWrapper';
import './MainPage.less';
import BalanceTypeEnumMeta from 'app/shop/enums/meta/BalanceTypeEnumMeta';

const bem = html.bem('MainPage');

import {widget, http, html} from 'components';

//import './MainPage.less';
export default @widget.register('\\app\\shop\\widgets\\MainPage\\MainPage')

@connect()
class MainPage extends React.Component {

    static propTypes = {
        user: PropTypes.shape({
            id: PropTypes.number,
            name: PropTypes.string,
            balance: PropTypes.double,
        }),
        userStory: PropTypes.arrayOf(PropTypes.shape({
            type: PropTypes.string,
            createTime: PropTypes.string,
        })),
        users: PropTypes.arrayOf(PropTypes.shape({
            id: PropTypes.number,
            name: PropTypes.string,
        })),
        products: PropTypes.shape({
            id: PropTypes.number,
            title: PropTypes.string,
            price: PropTypes.double,
        }),
        purchase: PropTypes.shape({
            name: PropTypes.string,
            title: PropTypes.string,
            createTime: PropTypes.string,
        }),
        averageCheck: PropTypes.number,
    };

    constructor() {
        super(...arguments);

        this.state = {
            user: this.props.user,
            users: this.props.users,
            products: this.props.products,
            userStory: this.props.userStory,
            averageCheck: this.props.averageCheck,
            isShowProducts: true,
            isShowPurchase: false,
            isShowHistory: false
        };
    }


    render() {
        const items = this.state.users.map(item => (
            {
                'id': item.id,
                'label': item.name,
            }
        ));
        return (
            <div className={bem.block()}>
                <div>
                    <div className={bem.element('userCase')}>
                        <div className={bem.element('userInfo')}>
                            <span>Пользователь: <span className={bem.element('bold-text')}>{this.state.user.name}</span></span>
                            <span className={'ml-4'}>Баланс:
                                <span className={bem.element('bold-text')}> {this.state.user.balance} рублей</span>
                            </span>
                            <Button
                                color={'primary'}
                                size={'sm'}
                                label={'Пополнить баланс'}
                                onClick={() => this.props.dispatch(openModal(ChargeBalanceModal, {
                                    userId: this.state.user.id,
                                    onComplete: (values, data) => this.setState({user: data.user})
                                }))}
                            />
                        </div>
                        <div>
                            <DropDownField
                                placeholder={'Выберете пользователя'}
                                autoComplete={true}
                                onItemChange={(item) => this.changeUser(item)}
                                items={items}
                            />
                            <Button
                                color={'primary'}
                                size={'sm'}
                                label={'Добавить пользователя'}
                                onClick={() => this.props.dispatch(openModal(AddUserModal, {
                                    onComplete: (values, data) => this.setState({users: data.users})
                                }))}
                            />
                        </div>
                    </div>
                </div>
                {
                    <div className={bem.element('button-case')}>
                        <Button
                            color={'primary'}
                            size={'sm'}
                            label={'Показать товары'}
                            onClick={() => this.showGrid('products')}
                        />
                        <Button
                            color={'primary'}
                            size={'sm'}
                            label={'Показать 10 последних покупок'}
                            onClick={() => this.showGrid('purchase')}
                        />
                        <Button
                            color={'primary'}
                            size={'sm'}
                            label={'Показать историю пользователя'}
                            onClick={() => this.showGrid('history')}
                        />
                    </div>
                }
                <div className={'d-flex justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'d-flex justify-content-between mt-5'}>
                            <span>Средний чек:
                                <span className={bem.element('bold-text')}> {this.state.averageCheck} рублей</span>
                            </span>
                            <Button
                                color={'primary'}
                                size={'sm'}
                                label={'Добавить товар'}
                                onClick={() => this.props.dispatch(openModal(AddProductModal, {
                                    onComplete: () => this.props.dispatch(refresh('gridProduct'))
                                }))}
                            />
                        </div>
                        {this.state.isShowProducts && (
                            <Grid
                                listId={'gridProduct'}
                                defaultPageSize={10}
                                action={'/product'}
                                actionMethod={'get'}
                                total={20}
                                loadMore={false}
                                columns={[
                                    {
                                        label: 'Наименование',
                                        attribute: 'title',
                                    },
                                    {
                                        label: 'Цена',
                                        attribute: 'price',
                                        sortable: true,
                                    },
                                    {
                                        label: 'Количество покупок',
                                        attribute: 'purchaseCount',
                                        sortable: true,
                                    },
                                    {
                                        valueView: ({item}) => (
                                            Number(item.price) <= Number(this.state.user.balance) &&
                                            <Button
                                                color={'primary'}
                                                size={'sm'}
                                                label={'Купить'}
                                                onClick={() => this.buy(item.id)}
                                            />
                                        )
                                    }
                                ].filter(Boolean)
                                }
                            />)
                        }
                        {this.state.isShowPurchase && (
                            <Grid
                                listId={'gridPurchase'}
                                action={'/purchase'}
                                actionMethod={'get'}
                                loadMore={false}
                                columns={[
                                    {
                                        label: 'Имя пользователя',
                                        attribute: 'user.name',
                                    },
                                    {
                                        label: 'Название товара',
                                        attribute: 'product.title',
                                    },
                                    {
                                        label: 'Дата покупки',
                                        attribute: 'createTime',
                                    },
                                ].filter(Boolean)
                                }
                            />)
                        }
                        {this.state.isShowHistory && (
                            <Grid
                                listId={'gridHistory'}
                                defaultPageSize={10}
                                action={'/history'}
                                actionMethod={'get'}
                                total={20}
                                loadMore={false}
                                columns={[
                                    {
                                        label: 'Тип изменения',
                                        valueView: ({item}) => (
                                            <span>{BalanceTypeEnumMeta.getLabel(item.changeBalanceType)}</span>
                                        )
                                    },
                                    {
                                        label: 'Дата изменения',
                                        attribute: 'createTime',
                                    },
                                    {
                                        label: 'Дельта',
                                        attribute: 'delta',
                                    },
                                ].filter(Boolean)
                                }
                            />)
                        }
                    </div>
                </div>
                <ModalWrapper/>
            </div>
        );
    }

    changeUser(user) {
        http.post('/user/change', {
            userId: user.id,
        })
            .then(data => {
                if (data) {
                    this.setState({
                        userStory: data.userStory,
                        user: _find(this.state.users, function (item) {
                            return item.id === user.id;
                        })
                    }, () => this.props.dispatch(refresh('gridHistory')));

                }
            });

    }

    buy(id) {
        http.post('/product/buy', {
            id: id,
        })
            .then(data => {
                if (data) {
                    this.setState({
                        user: data.user,
                        averageCheck: data.averageCheck
                    });
                }
            });
    }

    showGrid(name) { // products
        const gridNames = {
            'products': 'isShowProducts',
            'purchase': 'isShowPurchase',
            'history': 'isShowHistory'
        };
        let stateObject = {};
        Object.keys(gridNames).map(function (key, index) {
            if (key === name) {
                stateObject[gridNames[key]] = true;
                return;
            }
            stateObject[gridNames[key]] = false;
        });
        this.setState(
            stateObject
        );
    }
}
