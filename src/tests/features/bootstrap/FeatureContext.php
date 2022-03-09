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
     * @Then /^company greeting should be visible$/
     */
    public function companyGreetingShouldBeVisible()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Welcome, 15 Marketing');
        });
    }
}
