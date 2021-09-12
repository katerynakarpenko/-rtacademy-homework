let c1 = 10;
let c_sign;

if ( c1 > 0) 
{
    c_sign = '+';
}
else {
    if ( c1 < 0 )
    {
        c_sign = '-';
    }
    else {
        c_sign = '0';
    }
}
console.log( c1, c_sign );

////

let b1 = 10;
let sign_b1 = 0 ;

if ( b1 > 0 ) 
{
sign_b1 = '+';
}
if ( b1 < 0 )
{
    sign_b1 = '-';
}
console.log (b1, sign_b1);
