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

const bem = html.bem('AddProductModal');
const FORM_ID = 'AddProductModal';


export default @widget.register('\\app\\shop\\widgets\\AddProductModal\\AddProductModal')

class AddProductModal extends React.Component {


    static propTypes = {
        modalProps: PropTypes.object,
        item: PropTypes.object,
    };


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
                title={__('Добавить товар')}
            >
                <div className={bem.element('content')}>
                    <Form
                        formId={'AddUser'}
                        action={'/product'}
                        onComplete={(values, data) => {
                            this.props.onComplete(values, data);
                            this.props.onClose();
                        }}
                    >
                        <InputField
                            label={'Название'}
                            attribute={'title'}
                        />
                        <NumberField
                            label={'Стоимость'}
                            attribute={'price'}
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
