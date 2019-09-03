
require('yii-steroids/webpack')
    // Index js. Core module at first
    .base('./app/*/client.js')

    // Index css
    .styles('./app/*/style/index.scss')

    // Admin css
    .styles('./app/*/admin/style/index.scss', 'admin')

    // Other css
    .styles('./app/*/style/index-*.scss')

    // Widgets. Only widgets with php file. Filter /path/MY_WIDGET/MY_WIDGET.js
    .widgets('./app/*/widgets')
    .widgets('./app/*/admin/widgets')
    .widgets('./vendor/kozhindev/yii-steroids/backend/modules/*/widgets')