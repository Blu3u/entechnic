var elPass1 = document.getElementById('password');
var elFName = document.getElementById('fName');
var elLName = document.getElementById('lName');
var elUName = document.getElementById('username');
var elEmail = document.getElementById('email');
var elPass2 = document.getElementById('passwordR');
var elDay = document.getElementById('day');
var elMonth = document.getElementById('month');
var elYear = document.getElementById('year');
var elGender1 = document.getElementById('fml');
var elGender2 = document.getElementById('ml');
var elAgree = document.getElementById('agree');
var elReset = document.getElementById('reset');
var elSubmit = document.getElementById('signUpBtn');


for(var i=1;i<32;i++){
        elDay.innerHTML+='<option value"'+i+'">'+i+'</option>';
}

var date =new Date();
var dateY = date.getFullYear();
for(var i=dateY;i>=1905;i--){

        elYear.innerHTML+='<option value"'+i+'">'+i+'</option>';
}

var elBar = document.getElementById('prog-passwd');
$(document).ready(function(){
  elPass1.addEventListener('input',progressbar);
  elPass1.addEventListener('load',progressbar);
  elFName.addEventListener('blur',vFName);
  elLName.addEventListener('blur',vLName);
  elUName.addEventListener('blur',vUName);
  elEmail.addEventListener('blur',vEmail);
  elPass1.addEventListener('blur',vPass1);
  elPass1.addEventListener('blur',vPass2);
  elPass2.addEventListener('blur',vPass2);
  elReset.addEventListener('click',reset);
  elSubmit.addEventListener('click',submit);

});

$(document).ready(progressbar());

function progressbar(){
    var x = elPass1.value;
    var regExp = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,35})$/;
    if(x.length>=8 && regExp.test(x)){
        elBar.style.width=100+'%';
        elBar.className='progress-bar progress-bar-animated bg-succes';
    }else if(regExp.test(x)){
      elBar.style.width=((x.length/8)*100) + '%';
        elBar.className='progress-bar progress-bar-animated bg-warning';

    }else{
      elBar.className='progress-bar progress-bar-animated bg-danger';
          elBar.style.width=((x.length/8)*100) + '%';
    }
}





function vFName(){
    var regExp = /^[a-z]{2,20}$/gi;
        if(regExp.test(this.value))
        {
          $(this).removeClass("form-control-danger");
          $(this).parent().removeClass("has-danger");
          $(this).siblings(".form-control-feedback").text('');
        }
        else
        {
          $(this).addClass("form-control-danger");
          $(this).parent().addClass("has-danger");
          $(this).siblings(".form-control-feedback").text("Sorry, your first name don't match our exceptations");
        }
}

function vLName() {
      var regExp = /^[a-z]{2,20}(\-[a-z]{2,15})?$/gi;
      if(regExp.test(this.value))
      {
        $(this).removeClass("form-control-danger");
        $(this).parent().removeClass("has-danger");
        $(this).siblings(".form-control-feedback").text('');
      }
      else
      {
        $(this).addClass("form-control-danger");
        $(this).parent().addClass("has-danger");
        $(this).siblings(".form-control-feedback").text("Sorry, your last name don't match our exceptations");
      }
}
function vUName() {
    var regExp = /^[a-z0-9]{1}[\w\.\-]{1,25}[a-z0-9]{1}$/gi;
    if(regExp.test(this.value))
    {
      $(this).removeClass("form-control-danger");
      $(this).parent().removeClass("has-danger");
      $(this).siblings(".form-control-feedback").text('');
    }
    else
    {
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");
      $(this).siblings(".form-control-feedback").text("Sorry, your login don't match our exceptations");
    }
}
function vEmail() {
    var regExp = /^[a-z0-9]{1}[a-z0-9._-]{1,25}[a-z0-9]@{1}[a-z0-9.]{2,15}\.{1}[a-z]{2,10}(\.{1}[a-z0-9]{1,10})?$/gi;
    if(regExp.test(this.value))
    {
      $(this).removeClass("form-control-danger");
      $(this).parent().removeClass("has-danger");
      $(this).siblings(".form-control-feedback").text('');
    }
    else
    {
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");
      $(this).siblings(".form-control-feedback").text("Sorry, your email don't match our exceptations");
    }
}
function vPass1() {
    var regExp =/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,35})$/;
    if(regExp.test(this.value))
    {
      $(this).removeClass("form-control-danger");
      $(this).parent().removeClass("has-danger");
      $(this).siblings(".form-control-feedback").text('');
    }
    else
    {
      $(this).addClass("form-control-danger");
      $(this).parent().addClass("has-danger");
      $(this).siblings(".form-control-feedback").text("Your password must have at least one smal, one big letter, one number and length at lesast 8 characters");
    }
}
function vPass2() {
  if(elPass1.value!=elPass2.value || elPass2.value==''){
    $(elPass2).siblings(".form-control-feedback").text("Your passwords don't match");
    $(elPass2).addClass("form-control-danger");
    $(elPass2).parent().addClass("has-danger");
  }else{
    $(elPass2).removeClass("form-control-danger");
    $(elPass2).parent().removeClass("has-danger");
    $(elPass2).siblings(".form-control-feedback").text("");
  }
}

function reset(){
var fields=document.querySelectorAll('#signUp-mod input');
  for(var i in fields){
    fields[i].value='';
  }
  $('.has-danger').removeClass("has-danger");
  $(".form-control-feedback").text("");
  progressbar();

}
function submit(){
if(elAgree.checked){
    var fields=document.querySelectorAll('#signUp-mod input[type="text"]');
    var puste = false;
    for(var i = 0; i<fields.length;i++)
        {
            if(fields[i].value == '')
                {
                    puste = true;
                    break;
                }
        }

        if(puste)
            {
              $(this).siblings(".form-control-feedback").text("Fill all fields");
              $(this).addClass("form-control-danger").removeClass("form-control-success");
              $(this).parent().addClass("has-danger").removeClass("has-success");
            }else{

              if(elDay.value=='0' || elYear.value=='0' || elMonth.value=='0'){
                $(this).siblings(".form-control-feedback").text("Select correct birthdate.");
                $(this).addClass("form-control-danger").removeClass("form-control-success");
                $(this).parent().addClass("has-danger").removeClass("has-success");

              }else{
                $(this).siblings(".form-control-feedback").text("Congratulation!");
                $(this).removeClass("form-control-danger").addClass("form-control-success");
                $(this).parent().removeClass("has-danger").addClass("has-success");
var walidacja=false;
var fields=document.querySelectorAll('#signUp-mod  .has-danger');
for(var i = 0; i<fields.length;i++)
    {
      console.log(fields);
                walidacja = true;
    }

                if(walidacja){
                  $(this).siblings(".form-control-feedback").text("Check your datas");
                  $(this).addClass("form-control-danger").removeClass("form-control-success");
                  $(this).parent().addClass("has-danger").removeClass("has-success");
                }else{


                }
            }

}
}else{
  $(this).siblings(".form-control-feedback").text("Accept our terms");
  $(this).addClass("form-control-danger").removeClass("form-control-success");
  $(this).parent().addClass("has-danger").removeClass("has-success");
}}












//
