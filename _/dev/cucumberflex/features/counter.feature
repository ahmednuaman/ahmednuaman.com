Feature: Counter
	In order to count something
	As a flex rock star
	I want to use my great flex app
 
	Scenario: Increment index
		Given I open my flex app
		And I click the increment button
		Then the label text should be "1"
		When I click the decrement button
		Then the label text should be "0"
		When I click the decrement button
		Then the label text should be "-1"