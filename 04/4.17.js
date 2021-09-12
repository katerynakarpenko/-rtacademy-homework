(async function() {
  // GET-запит для countries.json, що буде завантажуватись з поточного домена
  let response = await fetch( '/rtacadamy_homework/countries.json' );

  if( response.ok )            // HTTP = 200, все ОК
  {
      const countriesList = await response.json();   // читаємо відповідь в форматі JSON

      // створюємо елемент <input>
      const input = document.createElement( 'input' );
      input.setAttribute( 'type', 'text' );
      input.setAttribute( 'id', 'country' );
      input.setAttribute( 'list', 'countries' );

      // створюємо елемент <datalist>
      const datalist = document.createElement( 'datalist' );
      datalist.setAttribute( 'id', 'countries' );

      // заповнюємо значеннями елемент <datalist>
      countriesList.forEach(
          ( country ) =>
          {
            const option = document.createElement( 'option' );
            option.append( document.createTextNode( country.Name ) );

            datalist.append( option );
          }
      );

      // відображаємо <input> та <datalist> у елементі <main>
      document.getElementsByTagName('main')[0].append( input, datalist );
  }
  else
  {                       // HTTP не 200, обробляємо як помилку
      console.error( 'Сталася помилка ' + response.status + ': ' + response.statusText );
  }
})();