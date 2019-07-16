const request = new XMLHttpRequest();
const btn = document.querySelector('.btn');

btn.onclick = function () {
  if (request.status >= 200 && request.status < 400) {
    const json = JSON.parse(request.responseText);
    if (json.prize === 'FIRST') {
      btn.style.display = 'none';
      document.querySelector('.first').style.display = 'flex';
    } else if (json.prize === 'SECOND') {
      btn.style.display = 'none';
      document.querySelector('.second').style.display = 'flex';
    } else if (json.prize === 'THIRD') {
      btn.style.display = 'none';
      document.querySelector('.third').style.display = 'flex';
    } else if (json.prize === 'NONE') {
      btn.style.display = 'none';
      document.querySelector('.none').style.display = 'flex';
    } else {
      alert('系統不穩定，請再試一次');
    }
  } else {
    alert('系統不穩定，請再試一次');
  }
};

request.open('GET', 'https://dvwhnbka7d.execute-api.us-east-1.amazonaws.com/default/lottery', true);
request.send();
