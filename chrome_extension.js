let myLeads = []
const inputEL = document.getElementById('input-el')
const inputBtn = document.getElementById('input-btn')
const ulEl = document.getElementById('ul-el')
const deleteBtn = document.getElementById('delete-btn')
const tapBtn = document.getElementById('tap-btn')

let leadsFromLocalStorage = JSON.parse(localStorage.getItem('myLeads'))
console.log(leadsFromLocalStorage)

if (leadsFromLocalStorage) {
  myLeads = leadsFromLocalStorage
  render(myLeads)
}

tapBtn.addEventListener('click', function () {
  chrome.taps.query({ active: true, currentWindow: true }, function (taps) {
    myLeads.push(taps[0].url)

    localStorage.setItem('myLeads', JSON.stringify(myLeads))
    render(myLeads)
  })
})

function render(leads) {
  let listItems = ''

  for (i = 0; i < leads.length; i++) {
    listItems += `<li>
    <a target='_blank' href='${myLeads[i]}'>${myLeads[i]}
    </a>
    </li>`
  }

  ulEl.innerHTML = listItems
}

deleteBtn.addEventListener('click', function () {
  localStorage.clear()
  myLeads = []

  render(myLeads)
})

inputBtn.addEventListener('click', function () {
  myLeads.push(inputEL.value)

  inputEL.value = ''

  localStorage.setItem('myLeads', JSON.stringify(myLeads))

  render(myLeads)

  console.log(localStorage.getItem('myLeads'))
})
