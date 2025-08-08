const inputEl = document.getElementById('input-el')
const clearEl = document.getElementById('clear')
const equalEl = document.getElementById('equals')

//for each button to  be clickable
document.querySelectorAll('.price').forEach((button) => {
  button.addEventListener('click', function () {
    inputEl.value += button.textContent
  })
})

//for the clearing button
clearEl.addEventListener('click', function () {
  inputEl.value = ''
})

//equals button

equalEl.addEventListener('click', function () {
  console.log('the button:' + inputEl.value)

  try {
    inputEl.value = eval(inputEl.value)
  } catch {
    inputEl.value = 'Error'
  }
})
