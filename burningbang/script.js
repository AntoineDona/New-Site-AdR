let controller = new ScrollMagic.Controller();
let timeline = new TimelineMax();

timeline
  .fromTo(".truck", {y:+300, scale: 1}, { y: -300, scale: 1.2, duration:10 })
  .to(".explosion", 10, { y: -200 }, "-=10")
  .fromTo(".background", { y: -50 }, { y: 0, duration: 10 }, "-=10")
  .to(".content", 10, { top: "0%" }, "-=10")
  .to('.background', {height: '100vh'})
  .to('.truck', {width: '100vh'})
  .fromTo(".title", { opacity: 0 }, { opacity: 1, duration: 3 }, "-=5");

let scene = new ScrollMagic.Scene({
  triggerElement: "section",
  duration: "300%",
  triggerHook: 0,
})
  .setTween(timeline)
  .setPin("section")
  .addTo(controller);