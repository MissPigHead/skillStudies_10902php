// funtion checkZero(num){
//   if (num < 10) return "0" + num;
//   else return num;
// }
const checkZero = num => (num < 10) ? "0" + num : num;


onload = () => {
  const retime1 = () => {
    setTimeout(retime1, 1000);
    const nt = new Date();

    //個位數
    const hd = nt.getHours() % 10;
    const md = nt.getMinutes() % 10;
    const sd = nt.getSeconds() % 10;

    //十位數
    const ht = Math.floor(nt.getHours() / 10);
    const mt = Math.floor(nt.getMinutes() / 10);
    const st = Math.floor(nt.getSeconds() / 10);

    document.getElementById("ck1").className = "c" + ht;
    document.getElementById("ck2").className = "c" + hd;
    document.getElementById("ck3").className = "c" + mt;
    document.getElementById("ck4").className = "c" + md;
    document.getElementById("ck5").className = "c" + st;
    document.getElementById("ck6").className = "c" + sd;
    document.getElementsByClassName("cc")[0].style.opacity = 1;
    document.getElementsByClassName("cc")[1].style.opacity = 1;

    setTimeout(function () {
      document.getElementsByClassName("cc")[0].style.opacity = 0;
      document.getElementsByClassName("cc")[1].style.opacity = 0;
    }, 500);
  }
  retime1();
  ////////////////////////////////////////////////////

  const wordDate = ['SUN', 'MON', 'TUS', 'WED', 'THR', 'FRI', 'SAT'];
  const retime2 = () => {
    const
      nt = new Date(),
      dh = nt.getHours(), dm = nt.getMinutes(), ds = nt.getSeconds(),
      yy = nt.getFullYear(), mm = nt.getMonth() + 1, dd = nt.getDate(), ww = nt.getDay();

    document.getElementById("clkTime").textContent = `${checkZero(dh)}:${checkZero(dm)}:${checkZero(ds)}`;
    document.getElementById("clkDate").textContent = `${yy}-${checkZero(mm)}-${checkZero(dd)} ${wordDate[ww]}`;
  }
  retime2();
  setInterval(retime2, 1000);
  /////////////////////////////////////////////////////

}

