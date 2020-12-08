    delok();
    function delok(){
      const url = "smtl.php";
      var kodene=$('#kodene').val();
  $.ajax({
            type: 'POST',
            url: url,
            data: ({mode:"delok",kodene:kodene}),
            dataType:"text",
            success: function(master){
              $("#lahto").html(master);
              
        }
           });
}
 function simpan(){
   const url = "smtl.php";
    var data=$('#form2').serialize()+"&mode=simpan";
   //alert(data);
  $.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType:"text",
            success: function(master){
              //alert(master);
document.getElementById("form2").reset(); 
              delok();
              document.location.href="#nyoh";
              
        }
           });
} function ojo(a){
   const url = "smtl.php";
   //alert(data);
   var aprv=confirm("Yakin dihapus?");
 if(aprv)
  { 
  $.ajax({
            type: 'POST',
            url: url,
            data: ({mode:"ojo",idmain:a}),
            dataType:"text",
            success: function(master){
              //alert(master);
              delok();
              //document.location.href="#nyoh";
              
        }
           });
}
}