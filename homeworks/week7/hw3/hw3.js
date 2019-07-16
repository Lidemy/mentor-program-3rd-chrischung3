let operator = '';
let operand = '0';
let hasOperator = false;

document.querySelector('.btn-pad').addEventListener('click', (e) => {
  const result = document.getElementById('result');

  if (e.target.className === 'nums') {
    if (!hasOperator && result.innerText === '0') {
      result.innerText = e.target.innerText;
      console.log(result.innerText);
    } else if (!hasOperator && result.innerText !== '0') {
      result.innerText += e.target.innerText;
      console.log(result.innerText);
    } else if (hasOperator && result.innerText === '0') {
      result.innerText = e.target.innerText;
      console.log(result.innerText);
    } else if (hasOperator && result.innerText !== '0') {
      result.innerText += e.target.innerText;
      console.log(result.innerText);
      console.log(e.target.innerText);
    }
  }

  if (e.target.id === '.') {
    if (result.innerText.includes('.')) {
      result.innerText = result.innerText;
    } else {
      result.innerText += e.target.innerText;
    }
  }

  if (e.target.className === 'operator') {
    operand = result.innerText;
    console.log(operand);
    operator = e.target.innerText;
    console.log(operator);
    hasOperator = true;
    result.innerText = 0;
  }

  if (e.target.id === 'clear') {
    result.innerText = '0';
    operator = '';
    operand = '0';
    hasOperator = false;
  }

  if (e.target.id === 'equal') {
    if (operator === '+') {
      result.innerText = parseFloat(result.innerText) + parseFloat(operand);
    } else if (operator === '-') {
      result.innerText = parseFloat(result.innerText) - parseFloat(operand);
    } else if (operator === '×') {
      result.innerText = parseFloat(result.innerText) * parseFloat(operand);
    } else if (operator === '÷') {
      result.innerText = parseFloat(result.innerText) / parseFloat(operand);
    }
  }
});
