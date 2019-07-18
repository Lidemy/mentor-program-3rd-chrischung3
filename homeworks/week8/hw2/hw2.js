const request = new XMLHttpRequest();
const postArea = document.querySelector('.post__area');

request.onload = function () {
  if (request.status >= 200 && request.status < 400) {
    const response = request.responseText;
    const json = JSON.parse(response);
    for (let i = 0; i < json.length; i += 1) {
      const div = document.createElement('div');
      div.classList.add('posts');
      div.innerHTML = `
          <div class='id'>${json[i].id}</div>
          <div class='content'>
            <div class='content__title'>留言內容</div>
            <div class='content__text'>${json[i].content}</div>
          </div>
          `;
      postArea.appendChild(div);
    }
  } else {
    console.log(request.status);
  }
};

request.open('GET', 'https://lidemy-book-store.herokuapp.com/posts', true);
request.send();


const newPage = (() => {
  window.open('./hw2-create.html', '_self');
});

document.querySelector('#add').addEventListener('click', newPage);
