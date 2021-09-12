//1
let cityName='киЇВ';
cityNameLower=cityName.toLowerCase();
cityNameCapitalize=cityNameLower.replace('к', 'К');
console.log(cityNameCapitalize);

//2
let cityN='харькоВ';
let a=cityN.toLowerCase();
let b=cityN.toUpperCase();
let c=a.replace(a[0], b[0]);
console.log(c);

//3
let city='льВів';
let a1=city.toLowerCase();
let a2=city.toUpperCase();
let a3=a2[0]+a1.substring(1);
console.log(a3);

//4
let town='дНіпро';
let aa2=town[0].toUpperCase()+town.substring(1).toLowerCase();
console.log(aa2);