Feature: Login
  In order to use the site the user should be able to login

  Scenario: login with invalid password
    When login page is visited
     And login with invalid credentials
    Then login error message is displayed

  Scenario: login with valid password
    When login page is visited
     And login with valid credentials
    Then you are logged in message is displayed

  Scenario: logout
    When user logs out
    Then user is logged out

  Scenario: forgot password
    When login page is visited
     And user clicks on forgot your password
    Then forgot password page should be displayed
