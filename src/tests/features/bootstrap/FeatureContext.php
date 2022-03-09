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
     * @When /^homepage is visited$/
     */
    public function homepageIsVisited(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
        });
    }

    /**
     * @When /^login page is visited$/
     */
    public function loginPageIsVisited(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
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
                ->press('Login')
                ->assertPathIs('/home')
                ->assertDontSee('These credentials do not match our records.');
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
                ->press('Login')
                ->assertPathIs('/login');
        });
    }

    /**
     * @Then /^login error message is displayed$/
     */
    public function loginErrorMessageIsDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('These credentials do not match our records.');
        });
    }

    /**
     * @Then /^you are logged in message is displayed$/
     */
    public function youAreLoggedInMessageIsDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('You are logged in!');
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

    /**
     * @Then /^user is logged out$/
     */
    public function userIsLoggedOut()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSeeLink('Login');
        });
    }

    /**
     * @Then /^user clicks on forgot your password$/
     */
    public function userClickOnForgotYourPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->clickLink('Forgot Your Password?');
        });
    }

    /**
     * @When /^forgot password page should be displayed$/
     */
    public function forgotPasswordPageShouldBeDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->assertPathIs('/password/reset');
        });
    }

    /**
     * @Then /^company greeting should be visible$/
     */
    public function companyGreetingShouldBeVisible()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Welcome, 15 Marketing');
        });
    }
}
