$(document).ready(function(){
    $('#search').keyup(function(){
      var txt = $(this).val();
      if (txt != '') 
      {
        $.ajax({
              url     : "rechercheVoiture.php",
              method  : "POST",
              data    : {search:txt},
              dataType: "text",
              success : function(data)
              {
                $('#result').html(data);
              }
        });
      }
      else
      {
        $('#result').html('');
        $.ajax({
              url     : "rechercheVoiture.php",
              method  : "POST",
              data    : {search:txt},
              dataType: "text",
              success : function(data)
              {
                $('#result').html(data);
              }
        });
      }
      });
  });