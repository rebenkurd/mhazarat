

function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").textContent;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","get_teacher.php?teacher_id="+str,true);
        xmlhttp.send();
    }
    
    if (str == "") {
        document.getElementById("tbInfo").textContent;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tbInfo").innerHTML = this.responseText;
        }
        };
        xmlhttp.open("GET","daily_info.php?teacher_id="+str,true);
        xmlhttp.send();
    }

    }   

