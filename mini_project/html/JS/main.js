"use strict";

function logIn() {
  let username = document.getElementById("user_name").value;
  let pswd = document.getElementById("password").value;

  if (username == "" || pswd == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  } else {
    return true;
  }
}
function signup() {
  let username = document.getElementById("user_name").value;
  let fname = document.getElementById("email").value;
  let email = document.getElementById("fname").value;
  let pswd = document.getElementById("password").value;

  var result = zxcvbn(pswd);

  let score = result.score;
  //  alert(score)

  if (username == "" || pswd == "" || email == "" || fname == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  } else {
    if (score == 0) {
      alert(
        "Password is too Weak:(\n" +
          result.feedback.suggestions +
          "\n" +
          result.feedback.warning
      );
      return false;
    }
    if (score == 1) {
      alert("Password is too Weak:(\n" + result.feedback.suggestions);
      return false;
    }
    if (score == 2) {
      alert("Password is too Weak:(\n" + result.feedback.suggestions);
      return false;
    }
  }
}
function add_cart(val) {
  $.ajax({
    url: "../db_operation/db_operation.php?cart",
    type: "GET",
    data: { id: val },
    success: function (res) {
      alert(res);
    },
  });
  // console.log(res);
  return false;
}

function qty_add(val) {
  $.ajax({
    url: "../db_operation/db_operation.php?add_qty",
    type: "GET",
    data: { id: val },
    success: function (res) {
      $(".products").load("./page.php?page=cart .products");
    },
  });
  // console.log(res);
  return false;
}

function qty_remove(val) {
  $.ajax({
    url: "../db_operation/db_operation.php?remove_qty",
    type: "GET",
    data: { id: val },
    success: function (res) {
      $(".products").load("./page.php?page=cart .products");
    },
  });
  // console.log(res);
  return false;
}

function remove_cart(val, elem) {
  let cnf = confirm("Are you sure?");

  if (cnf == true) {
    $.ajax({
      url: "../db_operation/db_operation.php?remove_cart",
      type: "GET",
      data: { id: val },
      success: function (res) {
        $(elem).closest("tr").remove();
        $(".products").load("./page.php?page=cart .products");
      },
    });
    // console.log(res);
    return false;
  } else {
    // alert("jhgahgdasdgasjg")
  }
}
function clear_cart(val) {
  let cnf = confirm("Are you sure?");

  if (cnf == true) {
    $.ajax({
      url: "../db_operation/db_operation.php?clear_cart",
      type: "GET",
      data: { id: val },
      success: function (res) {
        $(".products").remove();
      },
    });
    // console.log(res);
    return false;
  } else {
    return false;
  }
}
function emailvalid() {
  var emls = $("#email").val();
  var pattern = /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,}$/gm;
  if (!pattern.test(emls)) {
    $("#err_email").text("Enter valid Email ID");
    return false;
  } else {
    $("#err_email").text("");
  }
}

function checkout() {
  let name = document.getElementById("name").value;
  let b_add = document.getElementById("billing_add").innerHTML;
  let s_add = document.getElementById("shipping_add").innerHTML;
  let number = document.getElementById("number").value;
  let payment = document.getElementById("payment").value;

  if (name == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (b_add == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (s_add == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (number == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (payment == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
}

function cust_query() {
  let username = document.getElementById("username").value;
  let email = document.getElementById("email").value;
  let con_number = document.getElementById("mobile").value;
  let message = document.getElementById("msg").value;

  if (username == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (email == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (con_number == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
  if (message == "") {
    swal("Please Fill out all feilds", "", "error");
    return false;
  }
}

$(document).ready(function () {
  let date = new Date();
  let hours = date.getHours();
  console.log(hours)

  if (hours > 0 && hours < 12) {
    document.getElementById("greeting").innerHTML = "Good Morning,";
  }

  if (hours >= 12 && hours <= 16) {
    document.getElementById("greeting").innerHTML = "Good Afternoon,";
  }

  if (hours >= 16 && hours < 24) {
    document.getElementById("greeting").innerHTML = "Good Evening,";
  }
});

function passwordVisible() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    document.getElementById("icon").className = "fa fa-eye-slash";
  } else {
    x.type = "password";
    document.getElementById("icon").className = "fa fa-eye";
  }
}
