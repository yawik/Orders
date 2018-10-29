global.nodeModulesPath = __dirname + "/node_modules";

module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);
    grunt.config.init({
        targetDir: './test/sandbox/public'
    });
    grunt.loadTasks('./test/sandbox/public/modules/Core');
    grunt.registerTask('default', ['yawik:core']);
    grunt.registerTask('build',['yawik:core']);
};