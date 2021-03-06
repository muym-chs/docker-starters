module.exports = {
  '@tags': ['dcg_module_mix'],
  before(browser) {
    browser.drupalInstall();
  },
  after(browser) {
    browser.drupalUninstall();
  },
  'Front page': browser => {
    browser
      .drupalRelativeURL('/')
      .waitForElementVisible('body', 1000)
      .assert.containsText('h1', 'Log in')
      .drupalLogAndEnd({onlyOnError: false});
  },
};
