const inputEL = document.getElementById('input-el')
const percentageEl = document.getElementById('percentage')
const inverseEl = document.getElementById('inverse')
const squareEl = document.getElementById('square')
const squarerRootEl = document.getElementById('squareRoot')
const reciprocalEl = document.getElementById('reciprocal')

function appendValue(value) {
  inputEL.value += value
}

function clearDisplay() {
  inputEL.value = ''
}

function calculateResult() {
  try {
    inputEL.value = eval(inputEL.value)
  } catch {
    inputEL.value = 'error'
  }
}
percentageEl.addEventListener('click', function () {
  inputEL.value = parseFloat(inputEL.value) / 100
})

inverseEl.addEventListener('click', function () {
  const x = parseFloat(inputEL.value)
  inputEL.value = x !== 0 ? 1 / (x * x) : 'error'
})
squareEl.addEventListener('click', function () {
  inputEL.value = Math.pow(parseFloat(inputEL.value), 2)
})

squarerRootEl.addEventListener('click', function () {
  inputEL.value = Math.sqrt(parseFloat(inputEL.value))
})
reciprocalEl.addEventListener('click', function () {
  const x = parseFloat(inputEL.value)
  inputEL.value = x !== 0 ? 1 / x : 'error'
})
