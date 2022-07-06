// add new info

function change() {
  var days = ['یەکشەممە', 'دووشەممە', 'سێشەممە', 'چوارشەممە', 'پێنجشەممە', 'هەینی', 'شەممە'];
  var dates = new Date($('#dates').val());
  let dayname=days[dates.getDay()]
  $('#day_name').val(dayname);

}

function deleteInfo(id){
  $.ajax({
    url: 'delete_dayle_info.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_'+id).hide()
    
    }
  });
}

function teacherDelete(id){
  $.ajax({
    url: 'delete_teacher.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_teacher_'+id).hide()
    
    }
  });
}
function lessonDelete(id){
  $.ajax({
    url: 'delete_lesson.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_lesson_'+id).hide()
    
    }
  });
}
function departmentDelete(id){
  $.ajax({
    url: 'delete_department.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_department_'+id).hide()
    
    }
  });
}
function staffDelete(id){
  $.ajax({
    url: 'delete_staff.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_staff_'+id).hide()
    
    }
  });
}
function timeDelete(id){
  $.ajax({
    url: 'delete_time.php',
    type: 'GET',
    data: {
      id: id
    },success: function () {
      // location.reload();
      $('#tr_time_'+id).hide()
    
    }
  });
}


function submit() {
  var teacher_id = $('#teacher_id').val();
  var fullname = $('#fullname').val();
  var stage = $('#stage').val();
  var department = $('#department').val();
  var start_time = $('#start_time').val();
  var end_time = $('#end_time').val();
  var lesson_name = $('#lesson').val();
  var week = $('#day_name').val();
  var num_week = $('#num_week').val();
  var date = new Date($('#dates').val());
  var d = date.getDate('dd');
  var m = date.getMonth()+1;
  var y = date.getFullYear();
  var note = $('#note').val();

if(teacher_id==''){
  alert("خانەی کۆدی وانەبێژ بەتاڵە");
}else if(date=='Invalid Date'){
  alert("خانەی بەروار بەتاڵە");
}else if(num_week==''){
  alert("خانەی ژمارەی هەفتە بەتاڵە");
}else if(fullname==''){
  alert("خانەی ناوی سیانی وانەبێژ بەتاڵە");
}else if(department==''){
  alert("خانەی بەشی زانستی بەتاڵە");
}else if(stage==''){
  alert("خانەی قۆناغ بەتاڵە");
}else if(lesson_name==''){
  console.log("خانەی ناوی وانە بەتاڵە");
}else if(start_time==''){
  alert("خانەی کاتی دەستپێک بەتاڵە");
}else if(end_time==''){
  alert("خانەی کاتی تەواوبوون بەتاڵە");
}else{
  $.post({
    url: "save_info.php",
    type: 'POST',
    data: {
      teacher_id: teacher_id,
      fullname: fullname,
      stage: stage,
      department: department,
      start_time: start_time,
      end_time: end_time,
      lesson: lesson_name,
      week: week,
      num_week: num_week,
      date: [y,m,d].join('-'),
      note: note
    },
    success: function () {
      location.reload();
    }
  });
}
};



//show list of lessons by department id
function department() {
  var did = $('#department').val();
  $.ajax({
    url: 'ajax_lesson.php',
    type: "GET",
    data: {
      ds: did
    },
    success: function (result) {
      $('#lesson').html(result);
    }
  })
}



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
  }
}



//show table info
$('.props').on('change', function () {

  var year = $('#year').val();
  var month = $('#month').val();
  var teacher = window.localStorage.getItem('teacher_id')
  if (teacher != '') {
    localStorage.setItem('month', month);
    localStorage.setItem('year', year);
  } else {
    localStorage.removeItem('month', month);
    localStorage.removeItem('year', year);
    location.reload();
  }
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#month").val(window.localStorage.getItem('month'));
      $("#year").val(window.localStorage.getItem('year'));
    }
  })

  if (teacher != '' && month != '' && year != '') {
    $.get({
      url: 'ajax_show_table_day.php',
      type: "GET",
      data: {
        teacher_id: teacher,
        month: month,
        year: year
      },
      success: function (result) {
        $('#showTable').html(result);
        $("#month").val(month);
        $("#year").val(year);
      }
    })
  } else if (teacher != '' && month != '' && year == '') {
    $.get({
      url: 'ajax_show_table_day.php',
      type: "GET",
      data: {
        teacher_id: teacher,
        month: month,
        // year: year
      },
      success: function (result) {
        $('#showTable').html(result);
        $("#month").val(month);
        // $("#year").val(year);
      }
    })
  } else if (teacher != '' && month == '' && year != '') {
    $.get({
      url: 'ajax_show_table_day.php',
      type: "GET",
      data: {
        teacher_id: teacher,
        // month: month,
        year: year
      },
      success: function (result) {
        $('#showTable').html(result);
        // $("#month").val(month);
        $("#year").val(year);
      }
    })
  } else {
    $.get({
      url: 'ajax_show_table_day.php',
      type: "GET",
      data: {
        teacher_id: teacher,
        // month: month,
        // year: year
      },
      success: function (result) {
        $('#showTable').html(result);
        // $("#month").val(month);
        // $("#year").val(year);
      }
    })
  }
})


var teacher = window.localStorage.getItem('teacher_id')
var month = localStorage.getItem('month');
var year = localStorage.getItem('year');

if (teacher != '' && month != '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#month").val(month);
      $("#year").val(year);
    }
  })
} else if (teacher != '' && month != '' && year == '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      $("#month").val(month);
      // $("#year").val(year);
    }
  })
} else if (teacher != '' && month == '' && year != '') {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // month: month,
      year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#month").val(month);
      $("#year").val(year);
    }
  })
} else {
  $.get({
    url: 'ajax_show_table_day.php',
    type: "GET",
    data: {
      teacher_id: teacher,
      // month: month,
      // year: year
    },
    success: function (result) {
      $('#showTable').html(result);
      // $("#month").val(month);
      // $("#year").val(year);
    }
  })
}

//show teacher report by month
$('.props').on('change', function () {
  var month = $("#month").val();
  var teacher = $("#fullname_teacher").val();
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

if (teacher != '' && month != '') {
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