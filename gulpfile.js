var gulp = require('gulp'),
prefixer = require('gulp-autoprefixer'),
include = require('gulp-include'),
coffee = require('gulp-coffee'),
header = require('gulp-header'),
stylus = require('gulp-stylus'),
reload = require('gulp-livereload'),

src = {
  coffee: './src/coffee/*.coffee',
  stylus: './src/stylus/*.styl',
},

dest = {
  coffee: './public_html/js',
  stylus: './public_html/css',
},

opt = {
  coffee: {bare: false},
  header: '/*\n * @author Timur Valiyev\n * @link https://webprowww.github.io\n */\n\n',
  prefixer: {browsers: ['last 5 versions'], cascade: true}
},

watch = {
  coffee: './src/coffee/**/*.coffee',
  stylus: './src/stylus/**/*.styl',
  php: [
    './assets/**/*.php',
    './controllers/**/*.php',
    './models/**/*.php',
    './public_html/**/*.php',
    './views/**/*.php'
  ]
};

function taskError(err, done) {
  console.log(err.message);
  return done();
}

function taskCoffee(done) {
  gulp.src(src.coffee)
    .pipe(include().on('error', function(err) {
      taskError(err, done);
    }))
    .pipe(coffee(opt.coffee).on('error', function(err) {
      taskError(err, done);
    }))
    .pipe(header(opt.header))
    .pipe(gulp.dest(dest.coffee))
    .pipe(reload());
  return done();
}

function taskStylus(done) {
  gulp.src(src.stylus)
    .pipe(stylus().on('error', function(err) {
      taskError(err, done);
    }))
    .pipe(prefixer(opt.prefixer))
    .pipe(header(opt.header))
    .pipe(gulp.dest(dest.stylus))
    .pipe(reload());
  return done();
}

function taskReload(done) {
  reload.reload('./public_html/index.php');
  return done();
}

function defaultTask(done) {
  gulp.watch(watch.coffee, taskCoffee);
  gulp.watch(watch.stylus, taskStylus);
  gulp.watch(watch.php, taskReload);
  reload.listen();
  return done();
}

gulp.task('default', defaultTask);

/* gulpfile.js */