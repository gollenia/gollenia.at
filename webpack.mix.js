const mix = require('laravel-mix');
const concat = require('concat-files');
const fs = require('fs');

const createVersion = () => {
	const uid = Date.now();
	const content = '<?php return [ "version" => "' + uid + '"]; ?>';
	fs.writeFile('./version.php', content, err => {
		if (err) {
		  console.error(err)
		  return
		}
		console.log(`Version ${uid} generated`);
	  })
}

mix.sass('src/scss/style.scss', '.').then(function () {
    concat([
        'src/css/theme.css',
        'style.css'
    ], 'style.css', function (err) {
        if (err) { throw err; }
    });
	createVersion();
});

mix.sass('src/scss/admin.scss', '.');