import barba from '@barba/core'; // npm install @barba/core
import gsap from "gsap"; // npm install gsap
import 'lazysizes'; // npm i lazysizes

function scrolltop(){
  window.scrollTo(0, 0);
}



function PageTransition(){
    var tl = gsap.timeline();
    tl.to('.rendu', {duration: 0.5, opacity: 0 })
}


function FadeInTitles(){
    var tl = gsap.timeline();
    tl.from('.first, .second, .third, .fade, .out_content', {duration: 0.5, x: 0, opacity: 0}, '.5')
}

function FadeOutTitles(){
    var tl = gsap.timeline();
    tl.to('.first, .second, .third, .fade, .out_content', {duration: 0.5, x: 0, opacity: 0})
}


function FadeInTitles_shop(){
    var tl = gsap.timeline();
    tl.from('.to_shop, .texte_shop_fade', {duration: 0.5, x: 0, opacity: 0}, '.3')
}
function contentAnimation(){
    var tl = gsap.timeline();
    tl.from('.first', {duration: 0.5, x: 0, opacity: 0, stagger: 0.4 })
    tl.from('.second', {duration: 0.5,  x: 0, opacity: 0, stagger: 0.4 }, '.3')
    tl.from('.third', {duration: 0.5,  x: 0, opacity: 0}, '1.5')
}



//// SHOP ENTER (AVANT)
function FadeOutTitles_shop(){
    var tl = gsap.timeline();
    tl.to('.to_shop', {duration: 0.2, x: 0, opacity: 0})
}



//// SHOP LEAVE


function FadeOutShop() {
  var tl = gsap.timeline();
  tl.to('.leave_shop', {duration: 0.2, x: 0, opacity: 0})

}
function  FadeIn_when_BackFromShop(){
  var tl = gsap.timeline();
  tl.from('.back_from_shop', {duration: 0.2, x: 0, opacity: 0})
}



////

function delay(n) {
    n = n || 2000;
    return new Promise(done => {
        setTimeout(() => {
            done();
        }, n);
    });
}



barba.init({
    sync: true,
    transitions: [
        {
        name: 'default',
        async leave(data) {
            const done = this.async();
            scrolltop();
            await delay(400);
            FadeOutTitles();
            await delay(600);
            done();

        },
        async enter(date) {
            FadeInTitles();
        },
    },
    {
    name: 'go_to_shop',
    from: {
        custom: ({ trigger }) => {
          if (trigger.classList && trigger.classList.contains('go_to_shop')) {
            return true
          }
        }
      },
      async leave(data) {
          const done = this.async();
          scrolltop();
          await delay(400);
          FadeOutTitles_shop();
          await delay(100);
          done();

      },
      async enter(date) {
        FadeInTitles_shop();
      },
    },
    {
    name: 'leave_the_shop',
    from: {
        custom: ({ trigger }) => {
          if (trigger.classList && trigger.classList.contains('leave_the_shop')) {
            return true
          }
        }
      },
      async leave(data) {
          const done = this.async();
          scrolltop();
          await delay(400);
          FadeOutShop();
          await delay(200);
          done();

      },
      async enter(date) {
        FadeIn_when_BackFromShop();
      },
    },
],
})
