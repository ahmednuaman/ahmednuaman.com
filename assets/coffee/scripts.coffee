d = document
srcs = [
  'assets/vendor/fittext/fittext'
]

load = (src) ->
  js = d.createElement 'script'
  js.src = src

  d.appendChild js

for src in srcs
  load src