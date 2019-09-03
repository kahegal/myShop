import {ui, widget} from 'components';

ui.addViews(require.context('yii-steroids/ui', true, /View.js$/));
ui.addViews({
    'form.DropDownFieldView': require('./views/form/DropDownField/DropDownFieldView').default,
});
// Automatically import all views

ui.addFields(require.context('yii-steroids/ui', true, /Field.js$/));
ui.addFormatters(require.context('yii-steroids/ui', true, /Formatter.js$/));

// Add components for default backend widgets
widget.add({
    'steroids\\widgets\\ActiveForm': require('yii-steroids/ui/form/Form').default,
    'steroids\\widgets\\GridView': require('yii-steroids/ui/list/Grid').default,
    'steroids\\widgets\\ModalWrapper': require('yii-steroids/ui/modal/ModalWrapper').default,
    'steroids\\widgets\\Crud': require('yii-steroids/ui/crud/Crud').default,
});
