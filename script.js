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

function newPage() {
    window.location.pathname = '/end_page.php'
}

fetch('code.txt')
    .then(respose => respose.text())
    .then(text => doStuff(text))

function doStuff(text) {
    const code = text
    codeDisplayElement.innerHTML = ''
    code.split('').forEach(character => {
        const characterSpan = document.createElement('span')
        characterSpan.innerText = character
        codeDisplayElement.appendChild(characterSpan)
    })
    codeInputElement.value = null
    startTimer()
}
let startTime
function startTimer() {  
    timerElement.innerText = 0  
    startTime = new Date()  
    setInterval(() => {    
        timer.innerText = getTimerTime()  
        let value = timer.innerText
        localStorage["key"] = value
    }, 1000)
}
function getTimerTime() {  
    return Math.floor((new Date() - startTime) / 1000)
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