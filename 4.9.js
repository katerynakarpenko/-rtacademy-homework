function capitalize (town) {
  let array = town.split( "-" );
  let newArray = [];
  console.log (array);
 
  for (let i = 0; i < array.length; i++) {
    city = array[i][0].toUpperCase()+array[i].substring(1).toLowerCase();
    newArray.push (city);
    console.log (newArray);
    newArray.join("-");
  }
 
  return newArray.join("-");
}   

let cityNameCapitalized = capitalize ('Сен-СатюРнен-леЗ-Апт');
console.log (cityNameCapitalized);