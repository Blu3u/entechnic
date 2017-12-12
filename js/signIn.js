var elPass = document.getElementById('passwd');
var elMail = document.getElementById('mail');
var elReset = document.getElementById('resetSI');
var elSubmit = document.getElementById('signInBtn');

$(document).ready(function(){
  elPass.addEventListener('blur',vPass1);
  elMail.addEventListener('blur',vEmail);
  elReset.addEventListener('click',reset);
  elSubmit.addEventListener('click',submit);

});

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


function reset(){
var fields=document.querySelectorAll('#signIn-mod input');
  for(var i in fields){
    fields[i].value='';
  }
  $('.has-danger').removeClass("has-danger");
  $(".form-control-feedback").text("");

}
function submit(){
    var fields=document.querySelectorAll('#signIn-mod input[type="text"]');
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
                $(this).siblings(".form-control-feedback").text("Congratulation!");
                $(this).removeClass("form-control-danger").addClass("form-control-success");
                $(this).parent().removeClass("has-danger").addClass("has-success");
var walidacja=false;
var fields=document.querySelectorAll('#signIn-mod  .has-danger');
for(var i = 0; i<fields.length;i++)
    {
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


//
