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
    })
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
        $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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
      $('#table_info').html(result);
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