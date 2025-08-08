let num1 = 8
let num2 = 2

document.getElementById('num1-el').textContent = num1
document.getElementById('num2-el').textContent = num2
sumEl = document.getElementById('sum-el')
console.log(sumEl)

//function add() {
// sumEl.textContent = 'sum: ' + num1 + num2

//console.log(num)
//}

//function subtract() {
//let num = num1 - num2
//num1.textContent = num
//num2.textContent = num
//sumEl.textContent += num

//console.log(num)
//}

//function divide() {
//let num = num1 / num2

//num1.textContent = num
//num2.textContent = num
//sumEl.textContent += num

//console.log(num)
//}

//function multiply() {
//let num = num1 * num2
//num1.textContent = num
//num2.textContent = num
//sumEl.textContent += num

//console.log(num)
//}

function add() {
  let result = num1 + num2
  sumEl.textContent = 'sum: ' + result
}

function subtract() {
  let result = num1 - num2
  sumEl.textContent = 'sum: ' + result
}

function divide() {
  let result = num1 / num2
  sumEl.textContent = 'sum: ' + result
}

function multiply() {
  let result = num1 * num2
  sumEl.textContent = 'sum: ' + result
}
