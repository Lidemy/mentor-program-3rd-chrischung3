/* eslint-disable */
"use strict";var obj={value:1,hello:function(){console.log(this.value)},inner:{value:2,hello:function(){console.log(this.value)}}},obj2=obj.inner,hello=obj.inner.hello;obj.inner.hello(),obj2.hello(),hello();