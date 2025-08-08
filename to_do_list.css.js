let myDeads = []
const addBtn = document.getElementById('add-el')
const saveBtn = document.getElementById('save-el')
const deleteBtn = document.getElementById('delete-el')
const editBtn = document.getElementById('edit-el')
const inputEl = document.getElementById('input-el')
const olEl = document.getElementById('ol-el')

const leadsFromLocalStorage = JSON.parse(localStorage.getItem('myDeads'))

if (leadsFromLocalStorage) {
  myDeads = leadsFromLocalStorage

  render()
}
function render() {
  let listItems = ''

  for (i = 0; i < myDeads.length; i++) {
    listItems += '<input type="checkbox"><li>' + myDeads[i] + '</li>'
  }

  olEl.innerHTML = listItems
}

deleteBtn.addEventListener('dblclick', function () {
  localStorage.clear()

  myDeads = []
  render()
})

addBtn.addEventListener('click', function () {
  myDeads.push(inputEl.value)
  inputEl.value = ''
  render()
})

saveBtn.addEventListener('click', function () {
  localStorage.setItem('myDeads', JSON.stringify(myDeads))
})
