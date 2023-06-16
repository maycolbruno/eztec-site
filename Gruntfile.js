module.exports = function(grunt){

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass:{
			dev: {
				options: {
					style: 'expanded',
					sourceMap: true,
					// sourcemap: 'none',
				},
				files: {
					'style-human.css': 'sass/style.scss'
				}
			},
			dist: {
				options: {
					style: 'compressed',
					sourceMap: true,
					// sourcemap: 'auto',
				},
				files: {
					'style.css': 'sass/style.scss'
				}
			}
		},

		uglify: {
			dev: {
				options: {
					beautify: true
				},
				files: {
					'js/pages.js': ['js/pages/*.js']
				}
			},
			dist: {
				files: {
					'js/custom.min.js': ['js/custom/custom.js'],
					'js/pages.min.js': ['js/pages/*.js']
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 2 versions']
			},
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'compiled/*.css',
				dest: ''
			}
		},

		notify: {
			sass: {
				options: {
					title: 'SASS TASK COMPLETE',  // optional
					message: 'Sass finished running', //required
				}
			},
			uglify: {
				options: {
					title: 'UGLIFY TASK COMPLETE',  // optional
					message: 'Uglify finished running', //required
				}
			},
			watch: {
				options: {
					title: 'WATCH TASK STARTED',  // optional
					message: 'Watching file is running', //required
				}
			},
		},

		watch:{
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'notify:sass','autoprefixer']
			},
			js: {
				files: '**/*.js',
				tasks: ['uglify', 'notify:uglify']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-notify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('monitor',[
		'notify:watch',
		'watch'
	]);

}