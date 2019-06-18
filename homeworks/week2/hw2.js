function capitalize(str) {
  const char = str.charCodeAt(0);
  let newLetter = '';
  if (char >= 97 && char <= 122) {
    newLetter = str.replace(str[0], String.fromCharCode(str.charCodeAt(0) - 32));
  }
  return newLetter;
}

console.log(capitalize('hello'));


/* 找出字母的 code
var str = 'Z'
var char = str.charCodeAt(0)
console.log(char)
*/


// A ~ Z = 65 ~ 90
// a ~ z = 97 ~ 122
