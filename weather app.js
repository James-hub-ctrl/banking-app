const apiKey = ''
const apiUrl = ''
const searchBox = document.querySelector('.search input')
const searchBtn = document.querySelector('.search button')
const weatherIcon = document.querySelector('.weather-icon')

async function checkWeather(city) {
  const response = await fetch(apiUrl + city + '')

  if (response.status == 404) {
    document.querySelector('.error').style.display = 'block'
    document.querySelector('.weather').style.display = 'none'
  } else {
    var data = await response.json()

    document.querySelector('city').innerHTML = data.name
    document.querySelector('temp').innerHTML = Math.round(data.main.temp) + 'C'
    document.querySelector('humidity').innerHTML = data.main.humidity + '%'
    document.querySelector('wind').innerHTML = data.wind.speed + 'km/h'

    if (data.weather[0].main == 'clouds') {
      weatherIcon.src = ''
    } else if (data.weather[0].main == 'Clear') {
      weatherIcon.src = ''
    } else if (data.weather[0].main == 'Rain') {
      weatherIcon.src = ''
    } else if (data.weather[0].main == 'drizzle') {
      weatherIcon.src = ''
    } else if (data.weather[0].main == 'mist') {
      weatherIcon.src = ''
    }

    document.querySelector('.weather').style.display = 'block'
    document.querySelector('.error').style.display = 'none'
  }
}

searchBtn.addEventListener('click', function () {
  checkWeather(searchBox.value)
})
