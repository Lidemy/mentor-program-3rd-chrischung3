function alphaSwap(str) {
  let str1 = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str.charAt(i) === str.charAt(i).toLowerCase()) {
      str1 += str.charAt(i).toUpperCase();
    } else if (str.charAt(i) === str.charAt(i).toUpperCase()) {
      str1 += str.charAt(i).toLowerCase();
    }
  }
  return str1;
}

module.exports = alphaSwap;
