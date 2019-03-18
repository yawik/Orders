Feature: Settings

  Scenario: Update settings
    Given I am logged in as an administrator
    When I go to orders setting page
    Then I should see "Orders"
    And I should see "Invoice Address"
    When I fill in "Company" with "Some Company"
    And I fill in "Street" with "Some Street"
    And I fill in "Value added tax ID" with "Some ID"
    And I select "Mr." from "Salutation"
    And I press "Save"
    And I wait for the ajax response
    Then I should see "Changes successfully saved"
