function sum( a, b){
  return parseFloat((a + b).toFixed(6));
}
function min( a, b){
  return parseFloat((a - b).toFixed(6));
}
function mul( a, b){
  return parseFloat((a * b).toFixed(6));
}
function div( a, b){
  return parseFloat((a / b).toFixed(6));
}
function mod( a, b){
  return parseFloat((a % b).toFixed(6));
}
function pow( a, b){
  return parseFloat((a ** b).toFixed(6));
}

document.getElementById("button").onclick = function() { 
  let a = document.getElementById("oper1").value;
  let b = document.getElementById("oper2").value;
  let actionMath = document.getElementById("select-action").value;

  //если не введен операнд-1  - появляется красная рамка
  if (a != a.match( /[0-9]+/g ) ){
    document.getElementById("oper1").style.border = "0.0625rem solid #ff0000";
    // document.getElementById("result").value = "Enter operand 1";
  } 

  //если не введен операнд-2  - появляется красная рамка
  else if (b != b.match( /[0-9]+/g ) ){
    document.getElementById("oper2").style.border = "0.0625rem solid #ff0000"
    // document.getElementById("result").value = "Enter operand 2";
  }
  else {
    //если введены значения а и b, проверяется математическое действие и возвращается результат
    switch (actionMath){
      case ("sum"):  
        document.getElementById("result").value = sum( +a, +b);
        break;
      
      case ("min"): 
        document.getElementById("result").value = min( +a, +b );
        break;
      
      case ("mul"): 
        document.getElementById("result").value  = mul( +a, +b );
        break;
      
      case ("div"): 
        if (+b == 0) document.getElementById("result").value = "Error";
        else
        document.getElementById("result").value  = div( +a, +b );
        break;
      
      case ("mod"):
        document.getElementById("result").value = mod( +a, +b );
        break;
      
      case ("pow"): 
        document.getElementById("result").value  = pow( +a, +b );
        break;

      default:
        //document.getElementById("select-error").value = "Choose the action";
        document.getElementById("select-action").style.border = "0.0625rem solid #ff0000";
        document.getElementById("result").value = "";
    }
  }
  return (document.getElementById("result").value);
}

//снятие красной рамки с поля action, если она есть
document.getElementById("select-action").onclick = function (){
  if ( document.getElementById("select-action").style.border = "0.0625rem solid #ff0000" )
  return document.getElementById("select-action").style.border = "0.0625rem solid #808080";
}
//снятие красной рамки с поля operand-1, если она есть
document.getElementById("oper1").onclick = function(){
  if (document.getElementById("oper1").style.border = "0.0625rem solid #ff0000")
  return document.getElementById("oper1").style.border = "0.0625rem solid #808080";
}
//снятие красной рамки с поля operand-2, если она есть
document.getElementById("oper2").onclick = function(){
  if (document.getElementById("oper2").style.border = "0.0625rem solid #ff0000")
  return document.getElementById("oper2").style.border = "0.0625rem solid #808080";
}