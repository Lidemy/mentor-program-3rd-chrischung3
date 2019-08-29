/* eslint-env jquery */

$(document).ready(() => {
  $('.add__btn').click(() => {
    const inputValue = String($('#add__input').val());
    if (inputValue !== '') {
      $('.add__btn').after(`<li><hr/><div class='list'>${inputValue}</div><button type='submit' class='delete__btn btn btn-secondary'>完成</button>`);
      $('#add__input').val('');
    }
  });

  $('.main__list').click((e) => {
    const target = $(e.target);
    if (target.hasClass('delete__btn')) {
      target.parent().remove();
    }
  });
});
