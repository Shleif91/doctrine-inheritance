Feature: Add OnlinerProduct
  In table add OnlinerProduct
  As a user
  I need to add OnlinerProduct in table

  Scenario Outline: Create product
    When I create donor "Onliner"
    And I add product with params "<name>", "<rating>", "<minPrice>" to this donor
    Then I have this products with params "<name>", "<rating>", "<minPrice>" in table
    Examples:
      | name     | rating | minPrice |
      | iphone 7 | 1      | 700      |