/* global imgs1 */
$(document).ready(function(){
    imgs1 = $(this).find('img');
    counter = 0;
  
  $('img').click(function(){   
    x = $(this).attr('name');
    c = $(this);
  
  	
    $.ajax({
      url: 'game',
      type: 'post',
        data: {'value': x, '_token': $('input[name=_token]').val()},
      success: function(data){
        c.attr('src', data['name']);
           
        if((data['count'] % 2) && (data['check'] == 0))
        {
          setTimeout(function() {
            c.attr('src', 'images/tweety.png'); 
            imgs1[data['old']].src = 'images/tweety.png';
            
          }, 2000);
       

        }

         

           
      }
    });  

  });  
});