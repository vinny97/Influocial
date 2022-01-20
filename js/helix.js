let camera, scene, renderer, loader, imgURL, ratio, text;
init();
animate();
function init() {
  windowHeight = window.innerHeight > 950 ? 950 : window.innerHeight;
  windowWidth = document.querySelector(".helix-section .container").offsetWidth;
  camera = new THREE.PerspectiveCamera( 70, windowWidth / windowHeight, 0.01, 20 );
  camera.position.set( 0, 0, 3 );
  scene = new THREE.Scene();
  scene.background = new THREE.Color(0xffffff)

  renderer = new THREE.WebGLRenderer( { antialias: true, alpha: true } );
  renderer.setSize( windowWidth, windowHeight );
  renderer.setPixelRatio( 2 );

  imgURL = [
    'img/helix/1-brand-dashboard.jpg',
    'img/helix/2-campaigns.jpg',
    'img/helix/3-proposals.jpg',
    'img/helix/4-proposal-profile-audience.jpg',
    'img/helix/5-chat.jpg',
    'img/helix/6-measure-analytics.jpg',
    'img/helix/7-past-collaborations.jpg',
    'img/helix/8-capture.jpg',
  ]
  ratio = [
    0.9025,
    0.70875,
    0.833125,
    0.893125,
    1.03,
    0.9025,
    0.9025,
    0.833125,
  ]
  text = [
    'Manage everything in one place',
    'Easily view your campaigns',
    'View all proposals and choose \nyour favourite influencers, \nits totally up to you on \nwho you want to work with',
    'Vet Influencers properly, see \nif they are the right fit for \nyour brand, check there social \nmetrics, target audience, previous \nwork examples and more.',
    'No more back and forth emails, \nchat directly with influencers \non the platform',
    'track the performance of your \ncampaign every step of the way',
    'Manage all the influencers that \nyou have collaborated with in \nthe past and create private \ngroups for them',
    'Use our social media schedule \nto auto post and schedule your \ninstagram posts, do 2 hours of \nwork in 20 minutes.',
  ]
  function getWidth() {
    if(window.innerWidth >= 992) {
      return 1;
    }
    else {
      return 0.7;
    }
  }
  function getFontSize() {
    if(window.innerWidth >= 1200) {
      return window.innerWidth/window.innerHeight*0.40;
    }
    if(window.innerWidth >= 768) {
      return window.innerWidth/window.innerHeight*0.7;
    }
    return window.innerWidth/window.innerHeight;
  }
  const loader = new THREE.FontLoader();
  loader.load( 'fonts/helvetiker_regular.typeface.json', function ( font ) {
    for(let i = 0; i < imgURL.length; i++) {
      const imgMesh = new THREE.Mesh( new THREE.PlaneBufferGeometry(getWidth(), ratio[i]*getWidth()), new THREE.MeshBasicMaterial( { map: new THREE.TextureLoader().load(imgURL[i]), side: THREE.DoubleSide, toneMapped: false } ) );
      const textMesh = new THREE.Mesh(new THREE.TextGeometry( text[i], {font: font, size: 0.05*getFontSize(), height: 0.001}).center(), new THREE.MeshBasicMaterial({color: 0x0336b9}));
      const t = -i * Math.PI/4;
      imgMesh.position.z = Math.cos( t ) * 2;
      imgMesh.position.x = Math.sin( t ) * 2;
      imgMesh.position.y = -i * 0.5;
      imgMesh.rotation.y = -i * Math.PI/4; 
      textMesh.position.z = Math.cos( t ) * 2.01;
      textMesh.position.x = Math.sin( t ) * 2.01;
      textMesh.position.y = (-i * 0.5) - 0.5;
      textMesh.rotation.y = -i * Math.PI/4; 
      scene.add( imgMesh );
      scene.add( textMesh );
      // const img = new Image();
      // img.src = imgURL[i];
      // img.onload = function() {
      // }
    }
  });
  document.querySelector(".helix").appendChild( renderer.domElement );
}
function animate() {
  requestAnimationFrame( animate );
  renderer.render( scene, camera );
}
function updateCamera(z) {
  if (scene.position.y > 3.5 && z > 3500) {return};
  scene.rotation.y = (Math.PI/2)*(z)/1000;
  scene.position.y = 1*(z)/1000;
}
window.addEventListener("scroll", () => {
  var z = - document.querySelector(".helix").getBoundingClientRect().top;
  updateCamera(z);
  if(z < 0) {
    document.querySelector('canvas').style.position = "relative";
    document.querySelector('canvas').style.top = "50vh";
    document.querySelector('canvas').style.left = "50%";
    document.querySelector('canvas').style.transform = "translate(-50%, -50%)";
  }
  if(z >= 0 && z <= (imgURL.length-1)*500) {
    document.querySelector('canvas').style.position = "fixed";
    document.querySelector('canvas').style.top = "50vh";
    document.querySelector('canvas').style.left = "50%";
    document.querySelector('canvas').style.transform = "translate(-50%, -50%)";
  }
  if(z >= (imgURL.length-1)*500) {
    document.querySelector('canvas').style.position = "absolute";
    document.querySelector('canvas').style.top = "unset";
    document.querySelector('canvas').style.bottom = "50vh";
    document.querySelector('canvas').style.transform = "translate(-50%, 50%)";
  }
});