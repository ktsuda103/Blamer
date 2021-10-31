const scrollTopButton = document.querySelector('#start-button');
scrollTopButton.addEventListener('click',() => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});


function bestCommentHandle(event){
  event.preventDefault();
  if(window.confirm('ベストコメントに選びますか？ベストコメントには一度しか選べません。')){
    document.getElementById('best-comment').submit();
  } else {
    alert('キャンセルしました。');
  }
}