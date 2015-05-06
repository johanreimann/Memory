$(document).ready(function(){
  $('img').click(function(){   
    x = $(this).attr('name');
    c = $(this);
    $.ajax({
      url: 'game',
      type: 'post',
        data: {'value': x, '_token': $('input[name=_token]').val()},
      success: function(data){
         c.attr('src', data['name']);
      }
    });      
  }); 
});
