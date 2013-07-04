$(document).ready(function(){

var site_url = BASE_URL;

//Enable dismissal of an alert
$(".alert").alert();
  
 // functions....
    
  function ajaxCall(post_url,data,element,type){ //ajax call function
    $.ajax({
    url: post_url,
    type: "post",
    data: data,
    beforeSend:function(){
        $(element).html('<center> Loading....</center>');
    },
    success: function( response ){
      $('input[type="submit"]').addClass('btn');
      if((type == 'form')||(type == 'del_link' )){      
      $('.alert-success').show();
      }
    $(element).html(response);
    },
    error: function(){
   // $('#main').html('<div class="alert alert-error"></div>');
    $('.alert-error').show();
    
    $('.alert-error').html('<strong>Error:</strong>Some errors occurs during processing your request <button type="button" class="close" data-dismiss="alert">Ã—</button>');    
    }
    })

  }//end function
  
  function filterList(){  
   var welcam_id = $('#welcome_group').val();
   var post_url = site_url+'members/viewByWelcomeGroup';
   var element = '.table';   
   var data = 'welcome_group='+welcam_id;
   ajaxCall(post_url,data,element,null); 
      
  }//end function viewByGroup
    
///////////  links  navigation  ///////  
$('a').click(function(){
var post_url =  $(this).attr('href');
var data = null;
History.replaceState(null,'USCF',post_url);
var element = '#main';
var type = 'link';
if( $(this).attr('id') == 'logout'){
   element = 'body';    
}
if( $(this).attr('class') == 'delete'){
    return confirm('Are you sure you want to delete this record?');
    
}
ajaxCall(post_url,data,element,type);    
return false;
});

/////////////// form processing /////////////
$('form').validationEngine();
$('form').submit(function(){ 
var data = $(this).serializeArray();
var post_url =  $(this).attr('action');
//var form_id = $(this).attr('id');
History.replaceState(null,'USCF',post_url);

 var element = '#main';
 $.each(data,function(index,f_element){
      if (f_element.name == 'username'){
          element = 'body';
      }
 })
 ajaxCall(post_url,data,element,'form');
 return false;
})

///////////////   view by welcome group /////
$('#welcome_group').on('change',filterList);
   
///////////////   view by dates /////////////
$('#datepicker1').change(function(){
   $('#datepicker2').change(function(){
   var date1 = $('#datepicker1').val();
   var date2 = $('#datepicker2').val();
   var post_url = site_url+'/members/viewByDates';
   var data = 'date1=' + date1 + 'date2=' + date2;
   var element = '#main';
    ajaxCall(post_url,data,element,null);
 })
})

});