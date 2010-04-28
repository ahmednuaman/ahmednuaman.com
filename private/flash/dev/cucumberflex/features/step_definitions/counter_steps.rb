Given /^I open my flex app$/ do
  open_flex_app
end
 
Given /^I click the (increment|decrement) button$/ do |button|  
  click_button("button#{button.capitalize}")  
end
 
Then /^the label text should be "([^\"]*)"$/ do |text|
  label_text.should == text  
end