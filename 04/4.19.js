const validate =
{
    'initialize' : () =>
    {
        // видалення блоків з текстом помилок
        document.querySelectorAll('#form-post div.error-text').forEach( ( element ) => element.remove() );

        // видалення класів valid та invalid
        document.querySelectorAll('#form-post .valid, #form-post .invalid').forEach(
            ( element ) =>
            {
                element.classList.remove( 'invalid' );
                element.classList.remove( 'valid' );
            }
        );
    },

    '_setElementInvalid' : ( element ) =>
    {
        // видалення CSS-класа з коректними даними
        element.classList.remove('valid');

        // додавання CSS-класа з некоректними даними
        element.classList.add('invalid');
    },

    '_setElementValid' : ( element ) =>
    {
        // видалення CSS-класа з некоректними даними
        element.classList.remove('invalid');

        // додавання CSS-класа з коректними даними
        element.classList.add('valid');
    },

    '_createErrorElement' : ( text ) =>
    {
        const errorDiv = document.createElement('div');
        errorDiv.setAttribute( 'class', 'error-text' );
        errorDiv.append( document.createTextNode( text ) );

        return errorDiv;
    },

    '_showHideErrors' : ( element, errorText ) =>
    {
        if( errorText.length > 0 )          // якщо текст помилки присутній
        {
            // створення та додавання елемента з текстом помилки
            const errorDiv = validate._createErrorElement( errorText );
            element.parentElement.append( errorDiv );

            // додавання CSS-класа з некоректними даними
            validate._setElementInvalid( element );

            return false;                   // містить помилки
        }

        // додавання CSS-класа з коректними даними
        validate._setElementValid( element );

        return true;                        // все гаразд
    },

    'title' : ( value, element ) =>
    {
        const
            minLength   = 2,
            maxLength   = 128,
            regExp      = /^[A-ZА-ЯЫЁЭҐІЇЄ0-9`ʼ~!@"#№\$%\^&\*\(\)-_\+=\{\}\[\]\|\?\/\.,':;<>\s]+$/iu;

        let errorText = '';

        if( value.length < minLength )
        {
            errorText = 'Необхідно заповнити поле "Назва"';
        }
        else if( value.length > maxLength )
        {
            errorText = 'Максимальна довжина поля "Назва" - ' + maxLength + ' символів';
        }
        else if( ! regExp.test( value ) )
        {
            errorText = 'Поле "Назва" містить некоректні символи';
        }

        return validate._showHideErrors( element, errorText );
    },

    'content' : ( value, element ) =>
    {
        const
            minLength   = 2,
            maxLength   = 65536,
            regExp      = /^[A-ZА-ЯЫЁЭҐІЇЄ0-9`ʼ~!@"#№\$%\^&\*\(\)-_\+=\{\}\[\]\|\?\/\.,':;<>\s]+$/ium;

        let errorText = '';

        if( value.length < minLength )
        {
            errorText = 'Необхідно заповнити поле "Вміст"';
        }
        else if( value.length > maxLength )
        {
            errorText = 'Максимальна довжина поля "Вміст" - ' + maxLength + ' символів';
        }
        else if( ! regExp.test( value ) )
        {
            errorText = 'Поле "Вміст" містить некоректні символи';
        }

        return validate._showHideErrors( element, errorText );
    },

    'publish_date' : ( value, element ) =>
    {
        const
            minLength   = 16,
            maxLength   = 16,
            // дата та час за форматом "YYYY-MM-DDTHH:MM"
            regExp = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])T(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/;

        let errorText = '';

        if( value.length < minLength )
        {
            errorText = 'Необхідно заповнити поле "Дата публікації"';
        }
        else if( value.length > maxLength )
        {
            errorText = 'Максимальна довжина поля "Дата публікації" - ' + maxLength + ' символів';
        }
        else if( ! regExp.test( value ) )
        {
            errorText = 'Некоректно введено дату та час в поле "Дата публікації"';
        }

        return validate._showHideErrors( element, errorText );
    },

    'category' : ( value, element ) =>
    {
        const
            minLength       = 1;

        let errorText = '';

        if( value.length < minLength )
        {
            errorText = 'Необхідно заповнити поле "Категорія"';
        }

        return validate._showHideErrors( element, errorText );
    },

    'cover' : ( value, element ) =>
    {
        const
            minLength       = 1;

        let errorText = '';

        if( value.length < minLength )
        {
            errorText = 'Необхідно заповнити поле "Зображення"';
        }

        return validate._showHideErrors( element, errorText );
    }
};

const formGetElementsAndValues = () =>
{
    // отримання елементів
    const element = {};
    element.title           = document.getElementById( 'form-post-title' );
    element.content         = document.getElementById( 'form-post-content' );
    element.publish_date    = document.getElementById( 'form-post-publish-date' );
    element.category        = document.getElementById( 'form-post-category' );
    element.cover           = document.getElementById( 'form-post-cover' );

    // отримання значень
    const value = {};
    value.title             = ( element.title.value || '' ).toString();
    value.content           = ( element.content.value || '' ).toString();
    value.publish_date      = ( element.publish_date.value || '' ).toString();
    value.category          = ( element.category.value || '' ).toString();
    value.cover             = ( element.cover.value || '' ).toString();

    return { element, value };
};

const formSubmit = () =>
{
    // отримання елементів та їх значень
    const { element, value }        = formGetElementsAndValues();
    // цей спосіб називається "Деструктуризація"
    // https://learn.javascript.ru/destructuring-assignment#destrukturizatsiya-obekta

    // видаляємо всі елементи з помилками, червоні та зелені рамки
    validate.initialize();

    let hasError = false;                   // за замовчуванням - помилки відсутні

    for( let item in value )                // синтаксис for...in для перебирання обʼєктів: https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Statements/for...in
    {
        // item: це ключ об`єкта, наприклад "title", "content", "publish_date" і т.д.

        if( ! validate[ item ]( value[ item ], element[ item ] ) )          // виклик методів обʼєкта validate за іменем ключа та параметрами також за іменем ключа
        {
            hasError = true;                                                // якщо validate[item]() поверне false -- hasError отримає true
        }
    }

    return !hasError;       // true - продовжити надсилання форми, false - скасувати
};

const formInputFilePreview = function( event )          // Увага! Тут function, бо я використовую this, в якому міститься поточний елемент
{
    // видаляємо всі попередні <img>
    this.parentElement.querySelectorAll( 'img' ).forEach( element => element.remove() );

    const [ file ] = this.files;                // зберігаємо беремо перший елемент з масиву this.files у змінну file

    if( file )
    {
        // створюємо img-елемент з preview обраного зображення
        const img = document.createElement( 'img' );
        img.setAttribute( 'class', 'preview' );
        img.setAttribute( 'src', URL.createObjectURL( file ) );

        this.parentElement.append( img );
    }
};

// обробка submit форми (натиснення Enter спричине Submit форми, бо присутній input type=submit)
document.getElementById('form-post').onsubmit = formSubmit;

// обробка натискання на кнопку "Надіслати"
document.getElementById('form-post-submit').onclick = formSubmit;

// preview зображення, при виборі
document.getElementById('form-post-cover').onchange = formInputFilePreview;