/* eslint-env jquery */

$(document).ready(() => {
  $('.posts').click((e) => {
    const target = $(e.target);
    const msgId = target.attr('msgId');
    // console.log('ajax-id=' + msgId);
    if (target.hasClass('delete__post')) {
      $.ajax({
        method: 'POST',
        url: './delete.php',
        data: {
          id: msgId,
        },
      }).done((response) => {
        const msg = JSON.parse(response);
        alert(msg.message);
        const content = target.parent().parent();
        content.fadeOut(500, () => { content.remove(); });
      }).fail(() => {
        alert('delete failed');
      });
    }
  });
});
