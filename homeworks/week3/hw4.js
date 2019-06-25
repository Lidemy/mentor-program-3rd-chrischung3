function isPalindromes(str) {
  const newStr = str.split('');
  const strFront = [];
  const strBack = [];
  const n = Math.floor(newStr.length / 2);
  for (let i = 0; i < n; i += 1) {
    strFront.push(newStr[i]);
  }

  for (let j = 1; j <= n; j += 1) {
    strBack.push(newStr[newStr.length - j]);
  }

  let result = 0;

  for (let i = 0; i <= strFront.length - 1; i += 1) {
    if (strFront[i] === strBack[i]) {
      result += 1;
    }
  }
  if (result === strFront.length) {
    return true;
  }
  return false;
}

module.exports = isPalindromes;
