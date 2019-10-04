/* eslint-env jquery */

const list = [
  {
    id: 1,
    complete: false,
    item: '求職履歷',
  },
  {
    id: 2,
    complete: true,
    item: 'week18 hw2',
  },
  {
    id: 3,
    complete: false,
    item: '面試準備',
  },
];

// render

function render() {
  $('.todolist').empty();
  for (let i = 0; i < list.length; i += 1) {
    let itemList;
    if (list[i].complete === false) {
      itemList = `<div class='listed__items' id =${list[i].id}><span>${list[i].item}</span></div>`;
    }
    $('.todolist').append(itemList);
  }
}
render();

// 計算 id
function createId() {
  let id = 3;
  return () => {
    id += 1;
    return id;
  };
}

const newId = createId();

// 增加新的 to-do item
$('#add_btn').click(() => {
  const inputText = $('#add_item').val();
  list.push({ id: newId(), complete: false, item: inputText });
  $('#add_item').val('');
  render();
});

// 把 to-do item 改成 complete = true
$('.todolist').click((e) => {
  console.log(e);
  let itemIndex;
  if (e.target.id !== '') {
    itemIndex = e.target.id - 1;
  } else {
    itemIndex = e.target.parentNode.id - 1;
  }
  console.log('delete complete');
  list[itemIndex].complete = true;
  render();
});
