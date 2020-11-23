const path = require('path')

module.exports = {
  entry: ['./webpack_javascript/simon_script.js', './webpack_scss/index.scss'],
  watch: true, // live changement (il faut initialiser une fois avec le mot 'webpack' ou npm run dev)
  output: {
    path: path.resolve('./assets'),
    filename: 'ASB.js'
  },
  module: {
  	rules: [
  	  {
  		test: /\.js$/,
  		exclude: /node_modules/,
  	  },
      {
				test: /\.scss$/,
				use: [
					{loader: 'file-loader',
						options: {name: '[name].css',}
					},
					{loader: 'extract-loader'},
					{loader: 'css-loader?-url'},
          {loader: 'postcss-loader'},
					{loader: 'sass-loader'}
				]
			}
  	]
  }
};
