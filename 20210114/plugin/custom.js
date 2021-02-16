//after DOM ready
$(document).ready(function () {

  //scroll to id
  $("#lokiMenu a, #lokiFooter a").click(function () {
    // console.log(this.href); //完整路徑URL (X)
    const theid = $(this).attr("href"); //#lokiFood
    const val = $(theid).offset().top - $("#lokiMenu").innerHeight() + 1;
    $("html").animate(
      { scrollTop: val }, 1000, "swing"
    );
  });


  //scroll spy
  function spy() { //檢查目前滾動位置與對應MENU之ACTIVE
    const nowat = $(document).scrollTop();
    $("section").each(function () {
      const
        id = $(this).attr('id'), // id = this.id,
        offset = $(this).offset().top - $("#lokiMenu").innerHeight(),
        height = $(this).innerHeight();

      if (offset <= nowat && nowat < offset + height) { //目前高度落於該section內
        $('#lokiMenu a').not(`a[href='#${id}']`).removeClass('active');
        $(`#lokiMenu a[href='#${id}']`).addClass('active');
      }
    });
  }

  function bgmenu() { //判斷如果scroll是否在section#lokiSlider內來決定是否提供.bg-dark
    const
      nowat = $(document).scrollTop(),
      height = $("#lokiSlider").innerHeight(),
      offset = $("#lokiMenu").innerHeight(),
      screenW = $(document).innerWidth();

    if (screenW >= 992) { //屬於大螢幕時才會做判斷
      if (nowat < height - offset) { //在slider區域內
        $("#lokiMenu").removeClass("bg-dark");
        $("#lokiTop").removeClass("shown");
      } else {
        $("#lokiMenu").addClass("bg-dark");
        $("#lokiTop").addClass("shown");
      }
    } else $("#lokiMenu").addClass("bg-dark");
  }

  $(document).scroll(function () { //有人對document進行滾動
    spy();
    bgmenu();
  });
  $(window).resize(bgmenu); //當有人對window重新調整尺寸時

  spy();
  bgmenu();



  // new WOW().init();
  const wow = new WOW(
    {
      boxClass: 'jojo',      // default
      animateClass: 'animate__fadeInLeft', // default
      offset: 200          // default
      // mobile: true,       // default
      // live: true        // default
    }
  )
  wow.init();



  //鎖右鍵
  document.oncontextmenu=function(){
    event.preventDefault();
  }
});

