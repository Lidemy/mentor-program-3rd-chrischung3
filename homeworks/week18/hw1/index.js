/* eslint-env es6 */
/* eslint object-shorthand: 0 */

const obj = {
  value: 1,
  hello: function () {
    console.log(this.value);
  },
  inner: {
    value: 2,
    hello: function () {
      console.log(this.value);
    },
  },
};

const obj2 = obj.inner;
const { hello } = obj.inner.hello;
obj.inner.hello(); // ??
obj2.hello(); // ??
hello(); // ??
