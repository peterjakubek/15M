<?php

use Behat\Behat\Context\Context;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DuskTestCase implements Context
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        parent::setUp();
        // static::startChromeDriver();
    }

    /**
     * @Given I am on :url
     */
    public function iAmOn($url)
    {
        $this->browse(function (Browser $browser) use ($url) {
            $browser->visit($url);
        });
    }

    /**
     * @Then I see :text
     */
    public function iSee($text)
    {
        $this->browse(function (Browser $browser) use ($text) {
            $browser->assertSee($text);
        });
    }

    /**
     * @Then I should be on :url
     */
    public function iShouldBeOn($url)
    {
        $this->browse(function (Browser $browser) use ($url) {
            $browser->assertPathIs($url);
        });
    }

    /**
     * @Given I click link :link
     */
    public function iClickLink($link)
    {
        $this->browse(function (Browser $browser) use ($link) {
            $browser->clickLink($link);
        });
    }

    /**
     * @Then I see link :link
     */
    public function iSeeLink($link)
    {
        $this->browse(function (Browser $browser) use ($link) {
            $browser->assertSeeLink($link);
        });
    }

    /**
     * @When /^login with valid credentials$/
     */
    public function loginWithValidCredentials(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->type('email', 'thisis@myemail.com')
                ->type('password', '123456')
                ->press('Login');
        });
    }

    /**
     * @When /^login with invalid credentials$/
     */
    public function loginWithInvalidCredentials(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->type('email', 'foo@bar.com')
                ->type('password', 'baz')
                ->press('Login');
        });
    }

    /**
     * @Then /^user logs out$/
     */
    public function userLogsOut()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->clickLink('MyUsername')
                ->clickLink('Logout');
        });
    }
}
