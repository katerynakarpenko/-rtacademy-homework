document.getElementById("button").onclick = function() { 
  let dateValue1 = document.getElementById("date1").value
  let dateValue2 = document.getElementById("date2").value

  let date1 = Date.parse (dateValue1);
  let date2 = Date.parse (dateValue2);

  //проверка - если дата начала больше даты конца  или если не выбрана дата
  switch (true){
    case (dateValue1.length == 0):
      document.getElementById("date1").style.border = "0.0625rem solid #ff0000";
      document.getElementById("date1").style.background = "0.0625rem solid #ff0000";
      break;

    case (dateValue2.length == 0):  
      document.getElementById("date2").style.border = "0.0625rem solid #ff0000";
      document.getElementById("date2").style.background = "0.0625rem solid #ff0000";
      break;
    
    case (date1 > date2):
      document.getElementById("date2").style.border = "0.0625rem solid #ff0000";
      break;

    //когда все ок, то создаем блок и выводим разницу
    default:
      const dateN1 = new Date(dateValue1); 
      const dateN2 = new Date(dateValue2); 

      const fullDate1 = (dateN1.getDate() + "." + (dateN1.getMonth()+1) + "." + dateN1.getFullYear() + " " + dateN1.getHours() + ":" + dateN1.getMinutes() + ":" + dateN1.getSeconds());
      const fullDate2 = (dateN2.getDate() + "." + (dateN2.getMonth()+1) + "." + dateN2.getFullYear() + " " + dateN2.getHours() + ":" + dateN2.getMinutes() + ":" + dateN2.getSeconds());
      
      const resultDate = (date2-date1);
      const years = Math.floor(resultDate / (1000 * 60 * 60 * 24 * 30 * 12));
      const months = Math.floor(resultDate / (1000 * 60 * 60 * 24 * 30) % 12);
      const days = Math.floor(resultDate / (1000 * 60 * 60 * 24) % 30);
      const hours = Math.floor((resultDate / (1000 * 60 * 60)) % 24);
      const minutes = Math.floor((resultDate / (1000 * 60)) % 60);
      const seconds = Math.floor((resultDate / 1000) % 60);

      let arrayDate = [{років:years}, {місяців:months}, {днів:days}, {годин:hours}, {хвилин:minutes}, {секунд:seconds}];
      console.log (arrayDate);

      let newArray = [];
      for (let i = 0; i < arrayDate.length; i++ ) {
        if (i.prop == 0)  newArray = arrayDate.splice(i, 1);
        console.log (newArray); 
      };
      console.log (arrayDate);

      const fullDateR = years + " років " + months + " місяців " + days + " днів " + hours + " годин " + minutes + " хвилин " + seconds + " секунд ";
      
      let div = document.createElement ("div");
      div.id = "resultDate";
      div.style.cssText = ` border: 0.0625rem solid #808080; border-radius: 1rem; width: 30rem;`;
      document.getElementById("date-result").append (div);

      let div1 = document.createElement ("div1");
      div1.id = "divHeader";
      div1.style.cssText = ` 
          width: 30rem
          background-color: #c2c2c2;
          padding: 1rem;
          text-align: center;
          font-size:1rem;
          font-weight: bold;
          `;
      div1.innerHTML = "<h2>Різниця між датами</h2>"
      document.getElementById("resultDate").append (div1);
          
      let p = document.createElement ("p");
      document.getElementById("resultDate").append (p);
      p.style.cssText = `background: '#c1c1c1';
      border-top: 0.0625rem solid #808080;
      
      heigh: 100%;
      font-size: 1.2rem;
      line-height:160%;
      padding:1.2rem;
      `;

      p.innerHTML = `Різниця між  <span> ${fullDate1}</span> та  <span>${fullDate2}</span> становить: ${fullDateR}`;
      
      let pSpan = document.getElementsByTagName('span');
      pSpan.style.cssText = `
      color: #0000ff;`      
  }
}

//снятие красной рамки с поля date1, если она есть
document.getElementById("date1").onclick = function(){
  if (document.getElementById("date1").style.border = "0.0625rem solid #ff0000")
  return document.getElementById("date1").style.border = "0.0625rem solid #808080";
}

//снятие красной рамки с поля date2, если она есть
document.getElementById("date2").onclick = function(){
  if (document.getElementById("date2").style.border = "0.0625rem solid #ff0000")
  return document.getElementById("date2").style.border = "0.0625rem solid #808080";
}
/*
document.onclick = function (){
  document.getElementById("resultDate").remove();
}*/