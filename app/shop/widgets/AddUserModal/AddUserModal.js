import React from 'react';
import {connect} from 'react-redux';
import PropTypes from 'prop-types';
import Form from 'yii-steroids/ui/form/Form';
import NumberField from 'yii-steroids/ui/form/NumberField';
import InputField from 'yii-steroids/ui/form/InputField';
import Button from "yii-steroids/ui/form/Button";
import FieldList from 'yii-steroids/ui/form/FieldList';
import Modal from 'yii-steroids/ui/modal/Modal';
import {update} from 'yii-steroids/actions/list';
import {showNotification} from 'yii-steroids/actions/notifications';
import _get from 'lodash-es/get';
import UserMeta from 'app/user/models/meta/UserMeta';



import {widget, http, html} from 'components';

// import './ChargeBalanceModal.scss';

const bem = html.bem('AddUserModal');
const FORM_ID = 'AddUserModal';


export default @widget.register('\\app\\shop\\widgets\\AddUserModal\\AddUserModal')

class AddUserModal extends React.Component {


    static propTypes = {
        modalProps: PropTypes.object,
        item: PropTypes.object,
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
                title={__('Добавить пользователя')}
            >
                <div className={bem.element('content')}>
                    <Form
                        formId={'AddUser'}
                        action={'/user'}
                        onComplete={(values, data) => {
                            this.props.onComplete(values, data);
                            this.props.onClose();
                        }}
                    >
                        <InputField
                            attribute={'name'}
                            label={'Имя'}
                            type={'text'}
                        />
                        <NumberField
                            label={'Баланс'}
                            attribute={'balance'}
                        />
                        <Button
                            type={'submit'}
                            color={'info'}
                            label={'Добавить'}
                        />
                    </Form>
                </div>
            </Modal>
        );
    }
}
