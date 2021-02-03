function showpass() {
    var x = document.getElementById("pass");
    var x1 = document.getElementById("pass1");
    var x2 = document.getElementById("pass2");
    var s = document.getElementById("show");
    if (x.type === "password") {
    x2.type = x1.type = x.type = "text";
    s.innerHTML = "<i class='fas fa-eye'></i>";
    }
    else{
    x2.type = x1.type = x.type = "password";
    s.innerHTML = "<i class='far fa-eye'></i>";
    }
}

function showpassc() {
    var x = document.getElementById("passc");
    var s = document.getElementById("showc");
    if (x.type === "password") {
    x.type = "text";
    s.innerHTML = "<i class='fas fa-eye'></i>";
    }
    else{
    x.type = "password";
    s.innerHTML = "<i class='far fa-eye'></i>";
    }
}
//<div class="input-group-text" id="icon"><a id="show" onclick="showpass()"><i class="far fa-eye"></i></a></div>