addFitText = () ->
  h1s = document.getElementsByTagName 'h1'
  koms = [
    .5
    1.03
    1.126
    .9
    .933
    1.1
    1.68
  ]

  for h1, i in h1s
    window.fitText h1, koms[i]

addFitText()