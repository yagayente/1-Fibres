import barba from '@barba/core'; // npm install @barba/core
import gsap from "gsap"; // npm install gsap
import 'lazysizes'; // npm i lazysizes

function PageTransition(){
    var tl = gsap.timeline();
    tl.to('.rendu', {duration: 0.5, opacity: 0 })
}
function PageTransitionEnter(){
    var tl = gsap.timeline();
    tl.from('.rendu', {duration: 0.5, opacity: 0 })
}

function ListeTransition(){
    var tl = gsap.timeline();
    tl.to('.liste', {duration: 0.5, opacity: 0 })
}
function ListeTransitionEnter(){
    var tl = gsap.timeline();
    tl.from('.liste', {duration: 0.5, opacity: 0 })
}

function contentAnimation(){
    var tl = gsap.timeline();

}

function AddCurrentClass(){
  var lien_actif = window.location.href;
  var currentURLLink = document.querySelector("a.project_list_item[href='"+lien_actif+"']");
  var parent = currentURLLink.parentNode;

  const active = document.querySelector('.current');
  if(active){
    active.classList.remove('current');
  }
  parent.classList.add('current');
}


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
        async beforeOnce(data) {
          AddCurrentClass();
        },
        async leave(data) {
            const done = this.async();
            PageTransition();
            await delay(700);
            done();

        },
        async enter(date) {
            PageTransitionEnter();
        },
    },
    {
        name: 'effet de fade pour la liste et la page lors de la fermeture',
        from: {
            custom: ({ trigger }) => {
              if (trigger.classList && trigger.classList.contains('logo')) {
                return true
              }
              if (trigger.classList && trigger.classList.contains('custom_transition')) {
                return true
              }
            }
          },
          async leave(data) {
            const done = this.async();
            PageTransition();
            ListeTransition(); // disparition de la liste
            await delay(700);
            done();
        },
        async enter(date) {
            PageTransitionEnter();
        },
    },
    {
        name: 'Fade la liste lors de larrivé apres avoir été sur la home',
        from: {
            custom: ({ trigger }) => {
              if (trigger.classList && trigger.classList.contains('go_to_post')) {
                return true
              }
            }
          },
          async enter(data) {
            ListeTransitionEnter();
            AddCurrentClass();
        },
        async enter(date) {
          PageTransitionEnter();
      },
    },

],
})
