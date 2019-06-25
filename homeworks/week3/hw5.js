
function add(a, b) {
  const strA = a.split('');
  const strB = b.split('');
  const groups = (strA.length) / 9;

  const tempStr = [];

  for (let i = 0; i < groups; i += 1) {
    let strANew = strA.slice(strA.length - 9);
    strA.splice(strA.length - 9, 9);
    strANew = Number(strANew.join(''));

    let strBNew = strB.slice(strB.length - 9);
    strB.splice(strB.length - 9, 9);
    strBNew = Number(strBNew.join(''));

    tempStr.push(strANew + strBNew);
  }

  for (let i = 0; i < tempStr.length - 1; i += 1) {
    if (tempStr[i] > 1000000000) {
      tempStr[i] -= 1000000000;
      tempStr[i + 1] += 1;
    }
  }
  const resultStr = (tempStr.reverse()).join('');
  return resultStr;
}

module.exports = add;
