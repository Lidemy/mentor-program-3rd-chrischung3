function reverse(str) {
  let newarray = [];
  for (let i = str.length - 1; i >= 0; i -= 1) {
    newarray.push(str[i]);
  }
  newarray = newarray.join('');
  console.log(newarray);
}

reverse('hello');
