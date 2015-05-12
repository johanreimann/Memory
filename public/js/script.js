/* global imgs1 */
$(document).ready(function(){
  imgs1 = $(this).find('img');
  wait = 0;
  
  $('img').click(function(){  
    if($(this).attr('src') == 'images/tweety.png' && wait < 2)
    {   
      x = $(this).attr('name');
      c = $(this);
      wait++;
     // console.log(wait);
      $.ajax({
        url: 'game',
        type: 'post',
          data: {'value': x, '_token': $('input[name=_token]').val()},
        success: function(data){
          c.attr('src', data['name']);
          
        console.log(data['done']);
             
          if((data['count'] % 2) && (data['check'] == 0))
          {
            setTimeout(function() {
              c.attr('src', 'images/tweety.png'); 
              imgs1[data['old']].src = 'images/tweety.png';
              wait = 0;
            }, 1000);
          }
          else if(data['count'] % 2)
          {
            setTimeout(function() {
              wait = 0;
            }, 1000);
          }
        }
      }); 
    }
  });  
});