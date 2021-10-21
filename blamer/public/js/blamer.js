const scrollTopButton = document.querySelector('#start-button');
scrollTopButton.addEventListener('click',()=>{
  window.scrollTo({
    top:0,
    behavior:"smooth"
  });
});