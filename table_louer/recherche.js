  $(document).ready(function(){
    $('#search').keyup(function(){
      var txt = $(this).val();
      if (txt != '') 
      {
        $.ajax({
              url:"louerListe.php",
              method:"post",
              data:{search:txt},
              dataType:"text",
              success:function(data)
              {
                $('#result').html(data);
              }
        });
      }
      else
      {
        $('#result').html('');
        $.ajax({
              url:"louerListe.php",
              method:"post",
              data:{search:txt},
              dataType:"text",
              success:function(data)
              {
                $('#result').html(data);
              }
        });
      }
      });
  });