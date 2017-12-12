var chapt=document.getElementById('optSel').innerHTML;
$(document).ready(function(){
  $('#tab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
  $('#edit #returnBtn').click(function(e) {
    e.preventDefault();
      $('#browseOpt').tab('show');
  });
//Przelaczanie editLink
  $('#tab-cont .editBtn').click(function(e) {
    e.preventDefault();
      $('#editOpt').tab('show');
      var id=$(this).parent().siblings(".id").text();
      var cName=$(this).parent().siblings(".cName").text();
      var cNo=$(this).parent().siblings(".cNo").text();
      elCNo=  $('#editChapterNo').val(cNo);
      elCName=$('#editChapterName').val(cName);
  });
//Przełączanie blokow
  $('#optList button.list-group-item-action').click(function () {
    $('#optList .active').removeClass('active');
    $(this).addClass('active');
    $( "#optSel" ).animate({opacity: 0,},'fast', function() {
    $('#optSel').hide();
    $('.load').show();
    $( ".load" ).animate({opacity:1,},'fast',function(){
    $('.load').animate({
      opacity:0,
    },'fast',function() {
      $('.load').hide();
      $('#optSel').show();
      $('#optSel').animate({
          opacity:1,
      },'fast');
    });



  });
  });

    //TUTAJ WSTAWIANIE BLOKU
  });
  //Usuwanie z bazy
  $('td .close').click(function() {
    var alertMsg='<div class="alert alert-success alert-dismissible fade show">Deleting accomplished<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>'
    $(this).parents('tr').addClass('noDisp');
    $('#alertBox').html(alertMsg);

  });
  //Dodawanie do bazy
  $('#add #addBtn').click(function(){
    console.log('yey');
    var alertMsg='<div class="alert alert-success alert-dismissible fade show">Adding accomplished<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>'
    $('#alertBox').html(alertMsg);

  });
  //Update na bazie
  $('#edit #saveBtn').click(function(){
    var alertMsg='<div class="alert alert-success alert-dismissible fade show">Editing accomplished<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button></div>'
    $('#alertBox').html(alertMsg);
    //UPDATE KODU Z BAZY ORAZ TABELI
  });

});

//Filtrowanie
var tab=document.getElementById("tab-search")
var input=tab.getElementsByTagName("input");
for(var i=0; i<input.length;i++){
  input[i].addEventListener('input',szuk);
}
function szuk(){
  var input, filter, table, tr, td, i,j;
  if(this.value==""){
      table = document.getElementById("tab-cont");
      tr = table.getElementsByTagName("tr");
    for(i=0;i<tr.length;i++){
      tr[i].style.display = "";
    }
  }else{
      input = document.getElementsByTagName("input");
      filter = this.value.toUpperCase();
      for(var i=0; i<input.length;i++){
        if(this==input[i])
        {
          j=i+1;
        }else{
          input[i].value='';
        }
      }
      table = document.getElementById("tab-cont");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[j];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
}









//
