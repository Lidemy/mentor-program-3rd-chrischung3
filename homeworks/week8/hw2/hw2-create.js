const request = new XMLHttpRequest();

function post() {
  // POST
  request.open('POST', 'https://lidemy-book-store.herokuapp.com/posts');
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  request.send(`content=${document.querySelector('.content__input').value}`);

  // POST 之後等瀏覽器收到 response 之後才執行
  request.onreadystatechange = function () {
    if (request.readyState === XMLHttpRequest.DONE) {
      alert('成功新增留言！');
      window.location.href = './hw2.html';
    }
  };
}

document.querySelector('#submit').addEventListener('click', post);

// 回首頁
const homePage = (() => {
  window.open('./hw2.html', '_self');
});

document.querySelector('#cancel').addEventListener('click', homePage);
