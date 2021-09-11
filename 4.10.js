function getSign( num ) {
  let resultSign = '+';
  if ( num < 0 ) {
    resultSign = '-';
  }
  else if ( num == 0 ) {
    resultSign = '0';
  }
  return resultSign;
}
let sign = getSign( 952 );
console.log( sign );