const btn = document.querySelector('.btn');
const body = document.querySelector('body');

const time = Math.random() * 2000 + 1000;
let startTime = 0;
let endTime = 0;
let gameStart = false;
let colorTimer = 0;

function startGame(e) {
  startTime = 0;
  gameStart = true;
  body.style.background = 'white';
  colorTimer = setTimeout(() => {
    body.style.background = 'orange';
    startTime = new Date();
  }, time);
  e.stopPropagation();
  btn.style.display = 'none';
}

function mouseClick() {
  if (gameStart) {
    endTime = new Date();
    const score = (endTime - startTime) / 1000;
    if (body.style.background === 'white') {
      alert('還沒有變色呢！');
      clearTimeout(colorTimer);
    } else {
      alert(`你的成績是 ${score} 秒`);
    }
  }
  gameStart = false;
  btn.style.display = 'block';
  btn.innerText = '再試一次';
  body.removeEventListener('click', mouseClick);
}


btn.addEventListener('click', (e) => {
  startGame(e);
  body.addEventListener('click', mouseClick);
});
