let player = {
  name: 'per',
  chips: 200,
}

let cards = []
let sum = 0
let hasBlackjack = false
let isAlive = false

let message = ''

let messageEl = document.getElementById('message-el')
let sumEl = document.getElementById('sum-el')
let cardsEl = document.getElementById('cards-el')

let playerEl = document.getElementById('player-el')
playerEl.textContent = player.name + ': $' + player.chips

function getRandomCard() {
  let randomNumber = Math.floor(Math.random() * 13) + 1

  if (randomNumber > 10) {
    return 10
  } else if (randomNumber === 1) {
    return 11
  } else {
    return randomNumber
  }
}

function startGame() {
  isAlive = true
  let firstCard = getRandomCard()
  let secondCard = getRandomCard()
  cards = [firstCard, secondCard]
  sum = firstCard + secondCard

  renderGame()
}

function renderGame() {
  cardsEl.textContent = 'Cards: '

  for (let i = 0; i < cards.length; i++) {
    cardsEl.textContent += cards[i] + ' '
  }
  sumEl.textContent = 'Sum:' + sum
  if (sum <= 20) {
    message = 'Do you want to draw a new card'
  } else if (sum === 21) {
    message = "you've got  Black jack"
    hasBlackjack = true
  } else {
    message = "you're out of the game"
    isAlive = false
  }

  messageEl.textContent = message
}

function newCard() {
  if (isAlive === true && hasBlackjack === false) {
    let card = getRandomCard()
    sum += card

    cards.push(card)
    console.log(cards)

    renderGame()
  }
}

// CASH OUT
//if (sum < 21) {
//console.log('Do you want to draw a new card?')
//} else if (sum === 21) {
//console.log('wohoo! you have got a black jack!')
//} else {
//console.log("you're out of the game")
//
//}

//let age = 21
//console.log(age)

//if (age < 21) {
//console.log('you cannot enter the club')
//} else {
//console.log('you are welcome')
//}

//let age = 101

//if (age < 100) {
// console.log('Not eligible')
//} else if (age === 100) {
//console.log('Here is your birthday card')
//} else {
//console.log('Not eligible,you have already gotten one')
//}
