/* global imgs1 */
$(document).ready(function(){
    imgs1 = $(this).find('img');
  $('img').click(function(){   
    x = $(this).attr('name');
    c = $(this);
  
  	
    $.ajax({
      url: 'game',
      type: 'post',
        data: {'value': x, '_token': $('input[name=_token]').val()},
      success: function(data){
        c.attr('src', data['name']);
       //console.log(data['check'])
       //console.log(data['count']);
       //console.log($(data['old']));
        
          	console.log(imgs1);
           
        if((data['count'] % 2) && (data['check'] == 0))
        {
          setTimeout(function() {
            c.attr('src', 'images/tweety.png'); 
            imgs1[data['old']-1].src = 'images/tweety.png';
          }, 2000);
        }
         
      
           
      }
    });  

  }); 
    
});