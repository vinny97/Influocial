function onLoad() {
  ScrollTrigger.defaults({
    toggleActions: "play none none reverse",
    start: "center 90%",
  });

  let fadeUp = document.querySelectorAll('.fadeUp');
  let zoomIn = document.querySelectorAll('.zoomIn');
  let fadeInFromLeft = document.querySelectorAll('.fadeInFromLeft');
  let fadeInFromRight = document.querySelectorAll('.fadeInFromRight');
  let insetFromTop = document.querySelectorAll('.insetFromTop');
  for(let i = 0; i < fadeUp.length; i++) {
    gsap.from(fadeUp[i], {
      scrollTrigger: fadeUp[i],
      y: 100,
      opacity: 0
    });
  }
  for(let i = 0; i < zoomIn.length; i++) {
    gsap.from(zoomIn[i], {
      scrollTrigger: zoomIn[i],
      scale: 0,
      opacity: 0,
    });
  }
  for(let i = 0; i < fadeInFromLeft.length; i++) {
    gsap.from(fadeInFromLeft[i], {
      scrollTrigger: fadeInFromLeft[i],
      x: -100,
      opacity: 0,
    });
  }
  for(let i = 0; i < fadeInFromRight.length; i++) {
    gsap.from(fadeInFromRight[i], {
      scrollTrigger: fadeInFromRight[i],
      x: 100,
      opacity: 0,
    });
  }
  for(let i = 0; i < insetFromTop.length; i++) {
    gsap.from(insetFromTop[i], {
      scrollTrigger: insetFromTop[i],
      clipPath: "inset(0 0 1000px 0)",
    });
  }
  // gsap.to(".loading", {autoAlpha: 0, duration: 0.25});
  gsap.to(".loading", {autoAlpha: 0, duration: 0.25, onComplete: () => {window.scrollTo(0, 0);}});
}
function fadeRight() {
  gsap.to('.contact-toast', {opacity: 0, x: 200})
}