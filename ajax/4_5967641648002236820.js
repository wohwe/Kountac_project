
<script>
$(function() {
$('#bouton').click(function() {
   $.ajax({
  method: "POST",
  url: "ajout_panier.php",
  data: { id: "t6" }
})
  .done(function( msg ) {
   alert( "Data Saved: " + msg );
  });
  });
  });
</script>