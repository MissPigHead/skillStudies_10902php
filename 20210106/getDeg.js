//clock1
const now = new Date();
const valM = now.getMinutes(), valS = now.getSeconds(), valH = now.getHours();
// console.log(valH,valM,valS); //13 52 39

const degS = valS * 6; //360度/60S => 6度/S (可算入MS帶來的偏移量)
const degM = valM * 6 + valS * 0.1; //360度/60M => 6度/M && 6度/60S => 0.1度/S(S影響的偏移量)
const degH = valH * 30 + valM * 0.5; //360度/12H=> 30度/H && 30度/60M => 0.5度/1M (M影響的偏移量) && 0.008333333333333333/s(S偏移量)

//document.write or USE DOM
//document.write(`<style>....</style>`);

let kf = document.createElement('style');
kf.innerHTML = `
@keyframes js {
  from {transform: rotate(${degS}deg);}
  to {transform: rotate(${degS + 360}deg);}
}
@keyframes jm {
  from {transform: rotate(${degM}deg);}
  to {transform: rotate(${degM + 360}deg);}
}
@keyframes jh {
  from {transform: rotate(${degH}deg);}
  to {transform: rotate(${degH + 360}deg);}
}`;

document.querySelector("head").append(kf);


//clock5
onload = () => {
  const domH = document.querySelector(".no4>.jhour1");
  const domM = document.querySelector(".no4>.jmin1");
  const domS = document.querySelector(".no4>.jsec1");
  // console.log(domH,domM,domS);
  domH.style.transform = `rotate(${degH}deg`;
  domM.style.transform = `rotate(${degM}deg`;
  domS.style.transform = `rotate(${degS}deg`;

  setInterval(function () {
    const now = new Date();
    const valM = now.getMinutes(), valS = now.getSeconds(), valH = now.getHours();
    const degS = valS * 6; //360度/60S => 6度/S (可算入MS帶來的偏移量)
    const degM = valM * 6 + valS * 0.1; //360度/60M => 6度/M && 6度/60S => 0.1度/S(S影響的偏移量)
    const degH = valH * 30 + valM * 0.5; //360度/12H=> 30度/H && 30度/60M => 0.5度/1M (M影響的偏移量) && 0.008333333333333333/s(S偏移量)
    domH.style.transform = `rotate(${degH}deg`;
    domM.style.transform = `rotate(${degM}deg`;
    domS.style.transform = `rotate(${degS}deg`;
  }, 1000);
}
