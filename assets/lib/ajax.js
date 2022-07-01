
// add new info

function submit() {

  var teacher_id = $('#teacher_id').val();
  var fullName = $('#fullname').val();
  var stage= $('#stage').val();
  var department= $('#department').val();
  var start_time= $('#start_time').val();
  var end_time= $('#end_time').val();
  var day= $('#day').val();
  var num_week= $('#num_week').val();
  var date= $('#date').val();
  console.log("a");

  $.ajax({
    url:"save.php",
    type:'POST',
    data:{
      teacher_id:teacher_id,
      fullName:fullName,
      stage:stage,
      department:department,
      start_time:start_time,
      end_time:end_time,
      day:day,
      num_week:num_week,
      date:date
    },
    success:function(data){
      console.log(data);
    }
  });

}




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
function setItem() {
  $('#fullname_teacher').on('change', function () {
    var teacher = this.value;
    let teachers = localStorage.setItem('teacher_id', teacher);
    var teacher_id = localStorage.getItem('teacher_id', teachers);
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
    }),
    $.ajax({
      url: 'add_new_info.php',
      type: "GET",
      data: {
        teacher_id: window.localStorage.getItem('teacher_id')
      },
      success: function (result) {
        $('#addInfo').html(result);
        $("#fullname_teacher").val(window.localStorage.getItem('teacher_id', 0));
      }
    });
    return true;
  });
}

$('#fullname_teacher').on('change', function () {
  var teacher = this.value;
  if (teacher == '') {
    window.localStorage.removeItem('teacher_id');
    location.reload();
  }
})

if (!setItem()) {
  if (localStorage.getItem('teacher_id') != '') {
    $.ajax({
      url: 'ajax_teacher_info.php',
      type: "GET",
      data: {
        teacher_id: window.localStorage.getItem('teacher_id')
      },
      success: function (result) {
        $('#teacher_info').html(result);
        $("#fullname_teacher").val(window.localStorage.getItem('teacher_id', 0));
      }
    })
   ,
  $.ajax({
      url: 'add_new_info.php',
      type: "GET",
      data: {
        teacher_id: window.localStorage.getItem('teacher_id')
      },
      success: function (result) {
        $('#addInfo').html(result);
        $("#fullname_teacher").val(window.localStorage.getItem('teacher_id', 0));
      }
    });
  }
}
  


//show table info
$('.props').on('change', function () {
  // var items=[];
  var day = $("#day").val();
  var year = $("#year").val();
  var month = $("#month").val();
  // items.push(day,month,year);
  localStorage.setItem('day', day);
  localStorage.setItem('month', month);
  localStorage.setItem('year', year);

  var teacher = window.localStorage.getItem('teacher_id')

    $.get({
      url: 'ajax_show_table_day.php',
      type: "GET",
      data: {
        teacher_id: teacher
        // day: day,
        // month: month,
        //year: year
      },
      success: function (result) {
        $('#showTable').html(result);
        // $("#day").val(day);
        // $("#month").val(month);
        // $("#year").val(year);
      }
    })
  
  if (teacher != '' && day != '' && month != '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month == '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      // $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month != '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      month: month,
      // year: item[3]
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month == '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      // month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      // $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month != '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month != '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month == '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      // month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      // $("#month").val(month);
      $("#year").val(year);
    }
  })
}else{
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      // $("#month").val(month);
      // $("#year").val(year);
    }
  })
}
})
var teacher = window.localStorage.getItem('teacher_id')
var day = localStorage.getItem('day');
var month = localStorage.getItem('month');
var year = localStorage.getItem('year');

if (teacher != '' && day != '' && month != '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month == '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      // $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month != '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      month: month,
      // year: item[3]
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day != '' && month == '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      day: day,
      // month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#day").val(day);
      // $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month != '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month != '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && day == '' && month == '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      // month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      // $("#month").val(month);
      $("#year").val(year);
    }
  })
}else{
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // day: day,
      // month: month,
      //year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#day").val(day);
      // $("#month").val(month);
      // $("#year").val(year);
    }
  })
}


//show teacher report by month
  $('.props').on('change', function () {
    var month = $("#month").val();
    localStorage.setItem('month', month);
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

  if(teacher!=''&& month!=''){
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
  }