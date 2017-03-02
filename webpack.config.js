var WebpackNotifierPlugin = require('webpack-notifier');

module.exports = {
	
	resolve: {
 		alias: {
    		'vue$': 'vue/dist/vue.common.js'
  		}
	},

	entry: './src/main.js',

	output: {
		path: './js',
		filename: 'bundle.js'
	},
	devtool: 'eval-source-map',
	module: {
		loaders: [
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/
			},
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			}
		]
	},
	plugins: [
   		new WebpackNotifierPlugin({
   			alwaysNotify: true,
   		}),
  ]
}