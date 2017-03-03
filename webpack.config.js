
var WebpackNotifierPlugin = require('webpack-notifier');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var webpack = require('webpack');
var inProduction = (process.env.NODE_ENV === 'production');

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
	// devtool: 'eval-source-map',
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
			},
			{
				test: /\.css$/,
				use: ExtractTextPlugin.extract({
					use: "css-loader"
				})
			},
			{
				test: /\.(png|woff|woff2|eot|ttf|svg)$/, 
				loader: 'url-loader?limit=100000' 
			}
		]
	},
	plugins: [
   		new WebpackNotifierPlugin({
   			alwaysNotify: true,
   		}),
   		new ExtractTextPlugin("../css/style.css"),

   		new webpack.LoaderOptionsPlugin({
   			minimize: inProduction
   		}),
   		new webpack.ProvidePlugin({
           $: "jquery",
           jQuery: "jquery"
       })
  ]
}