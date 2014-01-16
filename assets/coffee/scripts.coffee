addFitText = () ->
  h1s = document.getElementsByTagName 'h1'
  koms = [
    .5
    1.03
    1.7
  ]

  for h1, i in h1s
    window.fitText h1, koms[i]

addFitText()