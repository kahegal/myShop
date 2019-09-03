import React from 'react';
import {connect} from 'react-redux';
import PropTypes from 'prop-types';
import NumberField from 'yii-steroids/ui/form/NumberField';
import InputField from 'yii-steroids/ui/form/InputField';
import Modal from 'yii-steroids/ui/modal/Modal';
import Form from 'yii-steroids/ui/form/Form';
import {update} from 'yii-steroids/actions/list';
import {showNotification} from 'yii-steroids/actions/notifications';
import _get from 'lodash-es/get';
import UserMeta from 'app/user/models/meta/UserMeta';


import {widget, http, html} from 'components';
import Button from "yii-steroids/ui/form/Button";
import {openModal} from "yii-steroids/actions/modal";
import AddUserModal from "../AddUserModal";

// import './ChargeBalanceModal.scss';

const bem = html.bem('ChargeBalanceModal');


export default @widget.register('\\app\\shop\\widgets\\ChargeBalanceModal\\ChargeBalanceModal')

class ChargeBalanceModal extends React.Component {


    static propTypes = {
        userId: PropTypes.number,
        balance: PropTypes.double,
    };

    constructor() {
        super(...arguments);

        this.state = {
            userId: this.props.userId,
            balance: this.balance,
        };
    }

    //TODO move this overflow to steroids?
    componentDidMount() {
        html.addClass(document.body, 'overflow-hidden');
    }

    componentWillUnmount() {
        html.removeClass(document.body, 'overflow-hidden');
    }

    render() {
        return (
            <Modal
                {...this.props.modalProps}
                onRequestClose={this.props.onClose}
                className={bem('ModalView__modal', bem.block())}
                title={__('Пополнить баланс')}
            >
                <div className={bem.element('content')}>
                    <Form
                        formId={'chargeBalance'}
                        action={'/charge'}
                        onComplete={(values, data) => {
                            this.props.onComplete(values, data);
                            this.props.onClose();
                        }}
                        initialValues={{
                            id: this.props.userId,
                        }}
                    >
                        <NumberField
                            attribute={'balance'}
                            placeholder={'Введите сумму'}
                        />
                        <InputField
                            attribute={'id'}
                            type={'hidden'}
                        />
                        <Button
                            type={'submit'}
                            color={'info'}
                            label={'Пополнить'}
                        />
                    </Form>
                </div>
            </Modal>
        );
    }

    chargeBalance(item) {
        console.log(11, this.state);
        http.post('/user/change', {
            userId: item.id,
        })
        /* .then(data => {
             if (data) {
                 this.setState({
                     userStory: data.userStory,
                     user: _find(this.state.users, function (item) {
                         return item.id === user.id;
                     })
                 });
             }
         });*/
    }
}
