'use strict';

module.exports = function (grunt) {

  // load all grunt tasks
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),
 
    uglify: {
      min: {
        files: {
          'public/content/themes/bci/js/main.js': ['public/content/themes/bci/js/src/libs/*.js','public/content/themes/bci/js/src/*.js']
        }
      }
    },
 
    compass: {
      dist: {
        options: {
          config: 'public/content/themes/bci/style/config.rb',
          sassDir: 'public/content/themes/bci/style/sass',
          imagesDir: 'public/content/themes/bci/img',
          cssDir: 'public/content/themes/bci/style',
          environment: 'production',
          outputStyle: 'expanded',
          force: true
        }
      }
    },

    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: 'public/content/themes/bci/img/src',
          src: ['*.{png,jpg,gif}'],
          dest: 'public/content/themes/bci/img/'
        }]
      }
    },

    browser_sync: {
      files: {
        src: 'public/content/themes/bci/style/screen.css'
      },
      options: {
          host: "localhost",
          watchTask: true
      }
    },

    watch: {
      options: {
        livereload: true
      },
      scripts: {
        files: ['public/content/themes/bci/js/src/*.js','public/content/themes/bci/js/src/libs/*.js'],
        tasks: ['uglify']
      },
      styles: {
        files: ['public/content/themes/bci/style/**/*.{sass,scss}','public/content/themes/bci/img/ui/*.png'],
        tasks: ['compass']
      },
      images: {
        files: ['public/content/themes/bci/img/src/*.{png,jpg,gif}'],
        tasks: ['imagemin']
      }
    },
  });
 
  // Development task checks and concatenates JS, compiles SASS preserving comments and nesting, runs dev server, and starts watch
  grunt.registerTask('default', ['compass', 'uglify', 'imagemin', 'browser_sync', 'watch']);
 
 }
