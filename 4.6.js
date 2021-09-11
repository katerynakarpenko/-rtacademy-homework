let num1 = 3;
let resultSign1 = 0;

switch ( true )
{
    case ( num1 > 0 ): 
        resultSign1 = '+';
        break;
    case ( num1 < 0 ):
        resultSign1 = '-';
        break;
   
}
console.log ( num1, resultSign1);