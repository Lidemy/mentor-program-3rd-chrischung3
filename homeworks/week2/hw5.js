
function join(str, concatStr) {
  let result = str[0].toString();
  for (let i = 1; i <= str.length - 1; i += 1) {
    result += concatStr + str[i].toString();
  }
  return result;
}


function repeat(str, times) {
  let result = '';
  for (let i = 1; i <= times; i += 1) {
    result += str;
  }
  return result;
}


console.log(join(['a', 1, 'b', 2, 'c', 3], ','));

console.log(repeat('yoyo', 2));
