const inputEL = document.getElementById('input-el')
const squareEl = document.getElementById('square')
const reciprocalEl = document.getElementById('reciprocal')
const percentageEl = document.getElementById('percentage')
const inverseEl = document.getElementById('inverse')
const squareRootEl = document.getElementById('squareRoot')
const del = document.getElementById('delT')
const factorialEl = document.getElementById('fac')
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

// CUSTOM FOR EXTRA OPERATIONS
squareEl.addEventListener('click', function () {
  inputEL.value = Math.pow(parseFloat(inputEL.value), 2)
})

reciprocalEl.addEventListener('click', function () {
  const x = parseFloat(inputEL.value)
  inputEL.value = x !== 0 ? 1 / x : 'error'
})
percentageEl.addEventListener('click', function () {
  inputEL.value = parseFloat(inputEL.value) / 100
})
inverseEl.addEventListener('click', function () {
  const x = parseFloat(inputEL.value)
  inputEL.value = x !== 0 ? 1 / (x * x) : 'error'
})

squareRootEl.addEventListener('click', function () {
  inputEL.value = Math.sqrt(parseFloat(inputEL.value))
})

del.addEventListener('click', function () {
  console.log('the button')
  // inputEL.value = inputEL.value.slice(0, -1)
})

factorialEl.addEventListener('click', function () {
  console.log('the button clicked')
  // =======-----
  //   let x = parseFloat(inputEL.value)
  //   if (x < 0 || Number.isInteger(x)) {
  //     inputEL.value = 'error'

  //     return
  //   }

  //   let result = 1
  //   for (let i = 2; i <= x; i++) {
  //     result *= i
  //   }

  //   inputEL.value = result
})
