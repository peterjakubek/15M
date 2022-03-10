Feature: Login
  In order to use the site the user should be able to login

  Scenario: login with invalid password
   Given I am on "/login"
    When login with invalid credentials
    Then I see "These credentials do not match our records."
     And I should be on "/login"

  Scenario: login with valid password
   Given I am on "/login"
     And login with valid credentials
    Then I see "You are logged in!"
     And I should be on "/home"

  Scenario: logout
   Given I am on "/login"
    When user logs out
    Then I see link "Login"

  Scenario: forgot password
   Given I am on "/login"
    When I click link "Forgot Your Password?"
    Then I should be on "/password/reset"
     And I see "Reset Password"
     And I see "Send Password Reset Link"
