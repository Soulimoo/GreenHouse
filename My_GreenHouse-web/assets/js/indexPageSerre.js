$(document).ready(function () {
  $("html").niceScroll({
    cursorcolor: "#67cb6c",
    cursorwidth: "8px",
    zindex: 999,
    horizrailenabled: false,
  });
});
document.addEventListener("scroll", onscroll);
function onscroll() {
  // var tl = new TimelineMax({});
  navbar = document.querySelector("nav");
  // trigger = document.querySelector(".whatwedodivs");
  // div1 = document.querySelector(".div1");
  // div2 = document.querySelector(".div2");
  // div3 = document.querySelector(".div3");
  // div4 = document.querySelector(".div4");
  // controller = new ScrollMagic.Controller();
  if (window.pageYOffset > 200) {
    navbar.classList.add("navtrans");
  } else navbar.classList.remove("navtrans");
}
//ANIMATION GA3 L CONTENU LI F PAGE MNI TNZL YBDAW YKHRJO MN JNAB
// tl.fromTo(div2, 4, { x: -100, opacity: 0 }, { x: 0, opacity: 1 });
// tl.fromTo(div1, 2, { x: -50, opacity: 0 }, { x: 0, opacity: 1 });
// tl.fromTo(div3, 4, { x: 100, opacity: 0 }, { x: 0, opacity: 1 });
// tl.fromTo(div4, 2, { x: 50, opacity: 0 }, { x: 0, opacity: 1 });
// scene = new ScrollMagic.Scene({
//   triggerElement: ".whatwedodiv",
//   triggerHook: 1,
//   duration: "90%",
//   reverse: false,
// })
//   .setTween(tl)
//   .addTo(controller);
function check(x) {
  cont1 = document.querySelector(".con1");
  cont2 = document.querySelector(".con2");
  cont3 = document.querySelector(".con3");
  div1 = document.querySelector(".w1");
  div2 = document.querySelector(".w2");
  div3 = document.querySelector(".w3");
  var tl = new TimelineMax({});
  if (x == 1) {
    cont1.style.visibility = "visible";
    div1.classList.add("one");
    tl.fromTo(
      cont1,
      0.6,
      { opacity: 0, top: "20px" },
      { opacity: 1, top: "0px" }
    );
    cont2.style.visibility = "hidden";
    div2.classList.remove("one");
    cont3.style.visibility = "hidden";
    div3.classList.remove("one");
  }
  if (x == 2) {
    cont1.style.visibility = "hidden";
    div1.classList.remove("one");
    cont2.style.visibility = "visible";
    div2.classList.add("one");
    tl.fromTo(
      cont2,
      0.6,
      { opacity: 0, top: "20px" },
      { opacity: 1, top: "0px" }
    );
    cont3.style.visibility = "hidden";
    div3.classList.remove("one");
  }
  if (x == 3) {
    cont1.style.visibility = "hidden";
    div1.classList.remove("one");
    cont2.style.visibility = "hidden";
    div2.classList.remove("one");
    cont3.style.visibility = "visible";
    div3.classList.add("one");
    tl.fromTo(
      cont3,
      0.6,
      { opacity: 0, top: "20px" },
      { opacity: 1, top: "0px" }
    );
  }
}
