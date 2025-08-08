//ent.getElementById('count-el').innerText = 5
// //let firstBatch = 5
// //let secondBatch = 7

// let count = firstBatch + secondBatch

// console.log(count)

//function increment() {
//console.log('the button was clicked')
//}

//function countdown() {
//console.log(5)
//console.log(4)
//console.log(3)
//console.log(2)
//console.log(1)
//}

//setting up the race

//countdown()
//GO
//PLAYERS are running the race
//race is finished

//getting ready for a new race
//countdown()

//let lap1 = 34
//let lap2 = 33
//let lap3 = 36

//function Lap() {
// let Lap = lap1 + lap2 + lap3
//console.log(Lap)
//}

//let lapsCompleted = 0

//function incrementLap() {
//lapsCompleted = lapsCompleted + 1
//}
//incrementLap()
//incrementLap()
//incrementLap()
//console.log(lapsCompleted)

//camelCase
let saveEl = document.getElementById('save-el')
let countEl = document.getElementById('count-el')
let count = 0

console.log(saveEl)

function increment() {
  //console.log('clicked')
  count += 1
  countEl.textContent = count
}

function save() {
  let countStr = count + ' - '

  saveEl.textContent += countStr
  // count = count + 1
  //countEl.innerText = count

  countEl.textContent = 0
  count = 0
}
console.log(count)

//save()

//let username = 'per'

//let message = 'you have tree new notifications'
//console.log(message + ',' + username+"!")

//let messageToUser = message + ' ,' + username + '!'
//console.log(messageToUser)

//let name = 'james'
//let greetings = 'hi, my name is '
//myGreetings = greetings + name
//console.log(myGreetings)
