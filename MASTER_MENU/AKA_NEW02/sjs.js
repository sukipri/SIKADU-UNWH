function hap(str){
  var id= str;
  var cf=confirm("Batalkan Permintaan :"+id+" ?");
 if(cf)
  { 
$.ajax({
        type: 'GET',
        url: "pages/administrator/traproval/h2.php?del="+id,
        success: function(){
        jikukdata();
        
      }
      });
  }
   
}

/*  function jikukdata(delok,status){
  const url = "pages/administrator/traproval/h2.php";

  $.ajax({
    url:url,
    type:"POST",
    data:({ambildata:status,delok:delok}),
    dataType:"text",
    success:function(result){
      $("#tampil").html(result);
    }
  });
}*/
 function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
    function ganti(str,ok){
  var id= str;
  var cf=confirm("Yakin "+ok+" "+id+"? ");
 if(cf)
  { 
$.ajax({
        type: 'GET',
        url: "sprosesvk.php?ganti="+id+"&dg="+ok,
        success: function(){
       location.reload();
        
      },
      error: function(){
        alert("gagal");
      }
      });
  }
   
}
    function tes(str,okkk){
      alert(okkk);
    }