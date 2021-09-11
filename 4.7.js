/*  завдання #4.7.1 with if


let d, m, h;

for (let i = 1; i <= 32; i++) {
  if ( i % 2 == 1) {
      continue;
  }
  else if ( ( i % 4 == 0 ) && ( i % 10 == 0 ) ) {
    d = '*^' + i;
    console.log(d); 
    }
  else  if ( i % 4 == 0)
    {
      m = '*' + i;
      console.log (m);
    }
  else if ( i % 10 == 0 ) {
    h = '^' + i;
    console.log(h);
  }
  else
  {
    console.log (i);
  }
  console.log (i);
}
*/


// завдання #4.7.2 with while

let k=1;
let z, x, w;
do {
  if (( k % 4 == 0 ) && ( k % 10 == 0 )) {
    z = '*^' + k;
    console.log(z);       
  }
  else  if ( k % 4 == 0 ) {
    x = '*' + k;
    console.log (x);
  }
  else if ( k % 10 == 0 ) {
    w = '^' + k;
    console.log(w);
  }
  else if ( k % 2 == 0 ) {
      console.log (k);
  }
  k++;
}
while ( k <= 32 );