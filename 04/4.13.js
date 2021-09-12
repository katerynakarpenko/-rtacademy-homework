function sum (a, b) {
  if ( a < b ) {
    return a + sum(a + 1, b);
  }
  return b;
}

console.log ( sum (1,3));
console.log ( sum (1,10));
console.log ( sum (100,1000));