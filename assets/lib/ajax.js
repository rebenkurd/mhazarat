$('#department').on('change',function(){
 var did=this.value;
 // console.log(did);
 $.ajax({
  url:'lesson.php',
  type:"POST",
  data:{
   ds:did
  },
  success:function(result){
   $('#lesson').html(result);
   // console.log(result);
      location.reload();
window.location.href = "index.php";
  }
 
})
 

})



$('.props').on('change',function(){
 var teacher=$("#fullname_teacher").val();
 $.ajax({
  url:'teacher_info.php',
  type:"GET",
  data:{
   teacher_id:teacher
  },
  success:function(result){
   $('#teacher_info').html(result);
      location.reload();
window.location.href = "index.php";
  }
 
})
 
})

$('.props').on('change',function(){
 var teacher=$("#fullname_teacher").val();
 var day=$("#day").val();
 var year=$("#year").val();
 var month=$("#month").val();
 $.ajax({
  url:'table_day.php',
  type:"GET",
  data:{
   teacher_id:teacher,
   day:day,
   month:month,
   year:year
  },
  success:function(result){
    $('#table_info').html(result);
      location.reload();
      window.location.href = "index.php";
    }
 
})
 
})

$('.props').on('change',function(){
 var teacher=$("#fullname_teacher").val();
 var month=$("#month").val();
 $.ajax({
  url:'show_report.php',
  type:"GET",
  data:{
   teacher_id:teacher,
   month:month,
  },
  success:function(result){

   console.log($('#show-report').html(result));

      location.reload();
window.location.href = "index.php";
  }
 
})
 


 
})