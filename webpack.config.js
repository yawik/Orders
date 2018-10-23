let Encore = require('@symfony/webpack-encore');
let CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    .setOutputPath('test/sandbox/public/build/')
    .setPublicPath('/build')
    .addEntry('yawik', './test/sandbox/public/modules/Core/yawik.js')
    .addEntry('bootstrap-dialog', './test/sandbox/public/modules/Core/bootstrap-dialog.js')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableLessLoader()
    .autoProvideVariables({
        'global.$': 'jquery',
        jQuery: 'jquery',
        'global.jQuery': 'jquery',
    })
    .addPlugin(new CopyWebpackPlugin([
        {
            from: "./node_modules/tinymce/skins",
            to: "skins"
        }
    ]))
;

const core = Encore.getWebpackConfig();
core.name = 'core';
core.resolve = {
    extensions: ['.js'],
    alias: {
        'jquery-ui/ui/widget': 'blueimp-file-upload/js/vendor/jquery.ui.widget.js'
    }
};

module.exports = core;