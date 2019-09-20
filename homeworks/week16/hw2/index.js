
function Stack() {
  const stackArray = [];
  return {
    push: (item) => {
      stackArray[stackArray.length] = item;
      return stackArray;
    },
    pop: () => {
      const result = stackArray[stackArray.length - 1];
      stackArray.splice(stackArray.length - 1, 1);
      return result;
    },
  };
}

const stack = new Stack();
stack.push(10);
stack.push(5);
console.log(stack.pop()); // 5
console.log(stack.pop()); // 10


function Queue() {
  const queueArray = [];
  return {
    push: (item) => {
      queueArray[queueArray.length] = item;
      return queueArray;
    },
    pop: () => {
      const result = queueArray[0];
      queueArray.splice(0, 1);
      return result;
    },
  };
}

const queue = new Queue();
queue.push(1);
queue.push(2);
console.log(queue.pop()); // 1
console.log(queue.pop()); // 2
