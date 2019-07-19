const path = require("path");
const Webpack = require("webpack");

module.exports = {
  mode: "development",
  entry: "./src/index.ts",
  devtool: false,
  output: {
    filename: "bundle.js",
    path: path.join(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.ts$/,
        use: "ts-loader"
      }
    ]
  },
  resolve: {
    extensions: [".ts"]
  }
};
