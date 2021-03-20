module.exports = function(grunt) {
  const sass = require('node-sass');

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      css: {
        files: ['scss/*.scss', 'scss/**/*.scss'],
        tasks: ['css'],
        options: {
          interrupt: true
        }
      },
      js: {
        files: ['js-src/vendor/**/*.js', 'js-src/**/*.js', 'js-src/*.js'],
        tasks: ['js'],
        options: {
          interrupt: true
        }
      }
    },

    postcss: {
      options: {
        map: false,
        processors: [
          require('autoprefixer')({browsers: 'last 10 versions'})
        ]
      },
      dist: {
        src: 'css/*.css'
      }
    },

    sass: {
      options: {
        implementation: sass,
        outputStyle: 'compressed',
        sourceMap: false
      },
      dist: {
        files: {
          'css/main.min.css': 'scss/main.scss'
        }
      }
    },

    concat: {
      options: {
        separator: ';'
      },
      all: {
        src: [
          'js-src/polyfill/*.js',
          'js-src/lib/*.js', 
          'js-src/_utils.js',
          'js-src/*.js',
          '!js-src/App.js',
          'js-src/App.js'
        ],
        dest: 'js/scripts.js'
      }
    },

    uglify: {
      all: {
        files: {
        'js/scripts.min.js': ['js/scripts.js']
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify-es');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-sass');

  grunt.registerTask('css', ['sass', 'postcss']);
  grunt.registerTask('js', ['concat', 'uglify']);
  grunt.registerTask('default', ['watch']);
};