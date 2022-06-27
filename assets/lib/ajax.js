$('#department').on('change',function(){
 var did=this.value;
 // console.log(did);
 $.ajax({
  url:'lesson.php',
  type:"GET",
  data:{
   ds:did
  },
  success:function(result){
   $('#lesson').html(result);
   // console.log(result);
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
  }
 })
})

$('.props').on('change',function(){
 var list=[];
 var teacher=$("#fullname_teacher").val();
 var day=$("#day").val();
 var year=$("#year").val();
 var month=$("#month").val();
 list.push(teacher,day,year,month);
 console.log(list);
 $.ajax({
  url:'table_day.php',
  type:"GET",
  data:{
   teacher_id:teacher,
   day:day,
   month:month,
   year:year,
  },
  success:function(result){
   $('#table_info').html(result);
  }
 })
})