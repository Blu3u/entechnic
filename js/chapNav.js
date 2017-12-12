$(document).ready(function() {
  progressbar();
    $('#chapNav .list-group .list-group-item .list-group').hide();
  $('#chapNav>.list-group>.list-group-item').click(function() {
      $(this).children('.list-group').slideToggle(300);
  });
  var nav=true;
  $("#barSlide").click(function(){
              //var balLeft=$((window).width()-50);
              //balLeft+='px';
              if(nav){
                  var x=$(window).width();
                  $("#barSlide").animate({left:'-=22%'});
                  $("#chapNav").animate({left:'-=22%'});
                //  $("#arrow").css({transform:'rotate(-180deg)'})
                nav=false;
                  }else{
                  $("#barSlide").animate({left:'+=22%'});
                  $("#chapNav").animate({left:'+=22%'});
                  //$("#arrow").css({transform:'rotate(0deg)'})
                  nav=true;
                  }
          });
          $('.main').click(function() {
            $('#chapNav').animate({left:'100vw'});
            $('#barSlide').animate({left:'98.7%'});
            nav=true;
});


});
function progressbar(){
var elChaps=document.querySelectorAll('#chapNav>.list-group>div.list-group-item');
for(var i=0;i<elChaps.length;i++){
  var x=elChaps[i].querySelectorAll('.list-group-item-success').length;
  var y=elChaps[i].querySelector('.list-group').children.length;
  var progressWidth=(x/y)*100;
  progressWidth+='%';
  var thisProgress=elChaps[i].querySelector('.progress .progress-bar');
  console.log(thisProgress);
  if(progressWidth=='100%'){
    thisProgress.className='progress-bar bg-success';
    thisProgress.style.width='100%';
  }else{
    thisProgress.style.width=progressWidth;

}
}}
