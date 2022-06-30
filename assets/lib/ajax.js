
//show list of lessons by department id
$('#department').on('change', function () {
  var did = this.value;
  $.ajax({
    url: 'ajax_lesson.php',
    type: "POST",
    data: {
      ds: did
    },
    success: function (result) {
      $('#lesson').html(result);
    }
  })
})


// show teacher name
function setItem(){
  $('#fullname_teacher').on('change', function () {
  var teacher = this.value;
  let teachers = localStorage.setItem('teacher_id',teacher);
  var teacher_id=localStorage.getItem('teacher_id',teachers);
    $.ajax({
      url: 'ajax_teacher_info.php',
      type: "GET",
      data: {
        teacher_id: teacher_id
      },
      success: function (result) {
        $('#teacher_info').html(result);
        // location.reload()
      }
})
return true;
});
}

$('#fullname_teacher').on('change', function () {
  var teacher = this.value;
  if(teacher==''){
    window.localStorage.removeItem('teacher_id');
    location.reload();
}
})

if(!setItem()){
  if(localStorage.getItem('teacher_id')!=''){
  $.ajax({
    url: 'ajax_teacher_info.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('teacher_id')
    },
    success: function (result) {
      $('#teacher_info').html(result);
      $("#fullname_teacher").val(window.localStorage.getItem('teacher_id',0));
    }
  })}
}

if(localStorage.getItem('teacher_id')!=''){
//show teacher report by month
$('.props').on('change', function () {
  var teacher = $("#fullname_teacher").val();
  var month = $("#month").val();
      $.ajax({
    url: 'ajax_show_report.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      month: month,
    },
    success: function (result) {
      $('#show-report').html(result);
    }
  })
})
}


//show table info
$('.props').on('change', function () {
  var items=[];
  var day = $("#day").val();
  var year = $("#year").val();
  var month = $("#month").val();
  items.push(localStorage.getItem('teacher_id',0),day,month,year);
  var allItems=localStorage.setItem( 'allItems',items);
  var item=localStorage.getItem('allItems',allItems);
})

// if(item[0]!=''){
//   $.get({
//     url: 'ajax_show_table_day.php',
//     type: "GET",
//     data: {
//       teacher_id:window.localStorage.getItem('allItems',item[0]),
//       // day: day,
//       // month: month,
//       // year: year
//     },
//     success: function (result) {
//       $('#table_info').html(result);
//     }
//   })
// }

// if (item[0] !='' && item[1] !='' && item[2] !='' && item[3] !='') {
if(item[0]!=''){
$.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      // day: day,
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#table_info').html(result);
      $("#day").val(localStorage.getItem('allItems',item[1]));
    }
  })

}else if (item[0] !='' && item[1] !='' && item[2] =='' && item[3] =='') {
  $.get({
  url: 'ajax_show_table_day.php',
  type: "GET",
  data: {
    teacher_id:window.localStorage.getItem('allItems',item[0]),
    day: window.localStorage.getItem('allItems',item[1]),
    // month: month,
    // year: year
  },
  success: function (result) {
    $('#table_info').html(result);
  }
}) }else if (item[0] !='' && item[1] !='' && item[2] !='' && item[3] =='') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      day:window.localStorage.getItem('allItems',item[1]),
      month: window.localStorage.getItem('allItems',item[2]),
      // year: item[3]
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })}else if (item[0] !='' && item[1] !='' && item[2] =='' && item[3] !='') {
    $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      day: window.localStorage.getItem('allItems',item[1]),
      // month: month,
      year:window.localStorage.getItem('allItems',item[3])
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })}else if (item[0] !='' && item[1] =='' && item[2] !='' && item[3] !='') {
    $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      // day: day,
      month: window.localStorage.getItem('allItems',item[2]),
      year:  window.localStorage.getItem('allItems',item[3])
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })
}else if (item[0] !='' && item[1] =='' && item[2] !='' && item[3] =='') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:item[0],
      // day: day,
      month: item[2],
      // year: year
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })
}else if (item[0] !='' && item[1] !='' && item[2] =='' && item[3] =='') {
    $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      day: window.localStorage.getItem('allItems',item[1]),
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })

}else if (item[0] !='' && item[1] =='' && item[2] =='' && item[3] !='') {
    $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      // day: day,
      // month: month,
      year: window.localStorage.getItem('allItems',item[3])
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })
}else {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id:window.localStorage.getItem('allItems',item[0]),
      day: window.localStorage.getItem('allItems',item[1]),
      month: window.localStorage.getItem('allItems',item[2]),
      year: window.localStorage.getItem('allItems',item[3])
    },
    success: function (result) {
      $('#table_info').html(result);
    }
  })
}
