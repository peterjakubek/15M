Feature: HomePage
  In order to use the site the home page should be displayed
  Scenario: visit homepage
    When homepage is visited
    Then company greeting should be visible
