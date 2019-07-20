path = require("path");
Webpack = require("webpack");

module.exports = {
  mode: "development",
  entry: ["./src/convCSV.ts"],
  target: 'node',
  devtool: false,
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: "[name].js"
  },
  module: {
    rules: [
      {
        test: /\.tsx?$/,
        loader: 'ts-loader',
      },
    ]
  },
  resolve: {
    extensions: [
      '.js',
      '.jsx',
      '.json',
      '.ts',
      '.tsx'
    ]
  },
};
