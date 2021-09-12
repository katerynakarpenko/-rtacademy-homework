function capitalize (town) {
  return town[0].toUpperCase()+town.substring(1).toLowerCase();
}   
let cityNameCapitalized = capitalize ('стОКГольМ')
console.log (cityNameCapitalized);