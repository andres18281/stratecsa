
 $(function(){    
    
 $('#log_out').click(function() {
        $.ajax({
          dataType:'html',
          type:"post",
          url:"controller/session_destroy.php",
          data:{"session":"destroy"},
          success:function(data){
           window.location.reload();
          }
        });
        
     });

 });