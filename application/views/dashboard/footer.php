</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<script>
    $(document).ready(function(){
        $('#catbut').click(function(){
          if($("#catbut").hasClass('collapsed')){
            $("#catbut").removeClass('collapsed');
            $('#account-collapse').slideUp('hide');
          }else{
            $("#catbut").addClass('collapsed');
            $('#account-collapse').slideDown('show');
            
            
          }  
        })

        $('#postbut').click(function(){
          if($("#postbut").hasClass('collapsed')){
            $("#postbut").removeClass('collapsed');
            $('#post-collapse').slideUp('hide');
          }else{
            $("#postbut").addClass('collapsed');
            $('#post-collapse').slideDown('show');
            
            
          }  
        })
    });
</script>




</html>