const path = require("path");

module.exports = {
    outputDir: path.resolve(__dirname, "./html"),
    chainWebpack: config => {
      config
        .module
        .rule("md")
        .test(/\.md$/)
        .use("raw-loader")
        .loader("raw-loader")
        .options()
        .end();
    }
  }