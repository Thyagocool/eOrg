
</body>

<script type="text/javascript" src="js/jquery-ui.min"></script>

<script type="text/javascript">
	$("div.alert").fadeIn( 200 ).delay( 2000 ).fadeOut( 200 );


	$("#btnExibeOcultaDiv").click(function(e){
   		e.preventDefault(); // evita que o formulário seja submetido
   		$("#dvPrincipal").toggle();
   		$("#dvPesquisa").toggle();
	});
</script>

<script type="text/javascript">
	$("#btnExibeOcultaDPesq").click(function(e){
   		e.preventDefault(); // evita que o formulário seja submetido
   		$("#dvPrincipal").toggle();
   		$("#dvPesquisa").toggle();
	});
</script>

<script type="text/javascript">
   
   $(function(){

      var uf = $("#uf").val();

      $("#id_cidade").autocomplete({
         data: uf,
         source: 'buscar.php',
         minLength:2
      });
      alert(source);
   });

</script>

</html>