require 'rubygems'
require 'funfx/browser/safariwatir'
 
module FlexWorld
  def open_flex_app
    @browser.goto('http://localhost:9852/App.html')
  end
 
  def click_button(button_id)
    @flex_app.button(:id => button_id).click
  end
 
  def label_text
    @flex_app.label(:id => 'myLabel').text
  end
end
 
Before do
  @browser  = Watir::Safari.new
  @browser.set_fast_speed
  @flex_app = @browser.flex_app('App', 'App')  
end
 
After do
  #@browser.close
end
 
World(FlexWorld)