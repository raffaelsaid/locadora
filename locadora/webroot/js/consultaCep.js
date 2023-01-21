$("#cep").change(function () {
  let cep = $("#cep").val();

  $("#endereco").val("");
  $("#bairro").val("");
  $("#municipio").val("");
  $("#endereco").val("");
  $("#uf").val("");

  $.ajax({
    url: "./service/consultaCep.php?cep=" + cep,
    dataType: "json",
    success: function (result) {
      if (result.erro) {
        this.error(result);
      } else {
        $("#endereco").val(result.logradouro);
        $("#bairro").val(result.bairro);
        $("#municipio").val(result.localidade);
        $("#endereco").val(result.logradouro);
        $("#uf").val(result.uf);
      }
    },
    error: function () {
      $("#endereco").val("");
      $("#bairro").val("");
      $("#municipio").val("");
      $("#endereco").val("");
      $("#uf").val("");

      alert("A consulta de CEP não retornou dados");
    },
  });
});
