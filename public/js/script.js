$(document).ready(function(){
  imgs1 = $(this).find('img');
  
  $('img').click(function(){  
    if($(this).attr('src') == 'images/tweety.png')
     {   
      x = $(this).attr('name');
      c = $(this);

      $.ajax({
        url: 'game',
        type: 'post',
          data: {'value': x, '_token': $('input[name=_token]').val()},
        success: function(data){
          c.attr('src', data['name']);
          

        if(data['done'] == 19)
          window.location.assign("players");
        
             
          if((data['count'] % 2) && (data['check'] == 0))
          {
            setTimeout(function() {
              c.attr('src', 'images/tweety.png'); 
              imgs1[data['old']].src = 'images/tweety.png';
            }, 1000);
          }
          else if(data['count'] % 2)
          {
            setTimeout(function() {
            }, 1000);
          }

        }
      }); 
     }
  });  
});