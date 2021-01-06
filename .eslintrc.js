module.exports = {
  root: true,
  env: {
    browser: true,
    node: true
  },
  parserOptions: {
    parser: 'babel-eslint'
  },
  extends: ['@nuxtjs', 'plugin:nuxt/recommended'],
  plugins: [],
  // add your custom rules here
  rules: {
    quotes: 'off',
    'no-useless-escape': 'off',
    'object-shorthand': 'off',
    'no-console': 'off', // attention idéalement en production il ne faut pas de console. faire une fonction adhoc
    'vue/singleline-html-element-content-newline': 'off',
    'vue/max-attributes-per-line': [
      'error',
      {
        singleline: 9,
        multiline: {
          max: 3,
          allowFirstLine: false
        }
      }
    ]
  }
}
