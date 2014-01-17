h1s = document.getElementsByTagName 'h1'

addFitText = () ->
  koms = [
    .5
    1.03
    1.15
    .922
    .945
    1.13
    1.877
  ]

  for h1, i in h1s
    window.fitText h1, koms[i]

checkForVW = () ->
  windowWidth = parseInt window.innerWidth / 2, 10
  el = document.createElement 'div'
  el.style.width = '50vw'

  document.body.appendChild el

  widthFunc = if window.getComputedStyle then window.getComputedStyle(el, null) else el.currentStyle
  calculatedWidth = widthFunc['width']
  elWidth = parseInt calculatedWidth, 10

  if elWidth isnt windowWidth
    addFitText()

  else
    window.addEventListener 'resize', () ->
      for h1 in h1s
        h1.style.zIndex = 1

checkForVW()