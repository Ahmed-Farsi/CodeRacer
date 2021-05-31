const codeDisplayElement = document.getElementById('codeDisplay')
const codeInputElement = document.getElementById('codeInput')
const timerElement = document.getElementById('timer')

codeInputElement.addEventListener('input', () => {
    const arrayCode = codeDisplayElement.querySelectorAll('span')
    const arrayValue = codeInputElement.value.split('')
    let correct = true
    arrayCode.forEach((characterSpan, index) => {
        const character = arrayValue[index]
        if (character == null) {
            characterSpan.classList.remove('correct')
            characterSpan.classList.remove('incorrect')
            correct = false
        }
        else if (character === characterSpan.innerText) {
            characterSpan.classList.add('correct')
            characterSpan.classList.remove('incorrect')
        }   else {
            characterSpan.classList.remove('correct')
            characterSpan.classList.add('incorrect')
            correct = false
        }
    })
    
    if (correct) newPage()
})




function Hidecode() {
    var button = document.getElementsByClassName("front-button-inner");
    
    if (button.clicked)   {

    document.getElementsByClassName("codeDisplay").style.display = ("none");

    } else {
      doStuff()
    }
  }


    function doStuff() {
    const code = document.getElementById('text').innerText;
    codeDisplayElement.innerHTML = ''
    code.split('').forEach(character => {
        const characterSpan = document.createElement('span')
        characterSpan.innerText = character
        codeDisplayElement.appendChild(characterSpan)
    })
    codeInputElement.value = null
}
let startTime
function startTimer() {  
    timerElement.innerText = 0
    startTime = new Date()
    setInterval(() => {
        const tijd = getTimerTime()
        const seconds = Math.floor(tijd / 100)
        const milliseconds = tijd % 100
        if (milliseconds <= 9) {
            milliseconds = `${milliseconds}`
        }
        timer.innerText = `${seconds} . ${milliseconds}`
    }, 10)
}

function getTimerTime() {  
    return Math.floor((new Date() - startTime) / 10)
}


function newPage() {
    let value = timer.innerText / 100;
    document.cookie = `tijd=${value}`
    console.log(`tijd=${value}`)
    const page = window.location.href
    // console.log(location)
    // document.location.href = `end_page.php?time=${value}`
    window.location.replace("end_page.php")
}


// function getCode() {
//     return fetch('code.txt')
//         .then(respose => respose.text())
//         .then(text => text)
// }

// async function renderNewCode() {
//     const code = getCode()
//     codeDisplayElement.innerHTML = code
// }




