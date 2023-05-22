// ##############################
function validate(callback) {
  const form = event.target;
  const validate_error = "rgba(240, 130, 240, 0.2)";
  document
    .querySelectorAll("[data-validate]", form)
    .forEach(function (element) {
      element.classList.remove("validate_error");
      element.style.backgroundColor = "white";
    });
  document
    .querySelectorAll("[data-validate]", form)
    .forEach(function (element) {
      switch (element.getAttribute("data-validate")) {
        case "str":
          if (
            element.value.length < parseInt(element.getAttribute("data-min")) ||
            element.value.length > parseInt(element.getAttribute("data-max"))
          ) {
            element.classList.add("validate_error");
            element.style.backgroundColor = validate_error;
          }
          break;
        case "int":
          if (
            !/^\d+$/.test(element.value) ||
            parseInt(element.value) <
              parseInt(element.getAttribute("data-min")) ||
            parseInt(element.value) > parseInt(element.getAttribute("data-max"))
          ) {
            element.classList.add("validate_error");
            element.style.backgroundColor = validate_error;
          }
          break;
        case "email":
          let re =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          if (!re.test(element.value.toLowerCase())) {
            element.classList.add("validate_error");
            element.style.backgroundColor = validate_error;
          }
          break;
        case "regex":
          var regex = new RegExp(element.getAttribute("data-regex"));
          // var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
          if (!regex.test(element.value)) {
            console.log(element.value);
            console.log("regex error");
            element.classList.add("validate_error");
            element.style.backgroundColor = validate_error;
          }
          break;
        case "match":
          console.log(element.value);
          console.log(form.querySelector('[name="password"]').value);
          if (element.value != form.querySelector('[name="password"]').value) {
            element.classList.add("validate_error");
            element.style.backgroundColor = validate_error;
          }
          break;
        case "password":
          console.log(element.value);
          let temp = document.querySelector("#error-message");

          let input = element;
          console.log(input.value);
          //check empty password field
          if (input.value == "") {
            let errorMess =
              "<p style='font-size: 0.5rem;color:red;'>**Fill the password please!</p>";
            /*  input.style = "border-color:red"; */
            input.classList.add("validate_error");
            input.style.backgroundColor = validate_error;
            console.log(input.nextSibling);
            input.nextElementSibling.innerHTML = errorMess;
            return false;
          }

          //minimum password length validation
          if (input.value.length < 3) {
            let errorMess =
              "<p style='font-size: 0.5rem;'>**Password length must be atleast 8 characters</p>";
            input.classList.add("validate_error");
            input.style.backgroundColor = validate_error;
            console.log(input.nextSibling);
            input.nextElementSibling.innerHTML = errorMess;

            return false;
          }

          //maximum length of password validation
          if (input.value.length > 15) {
            errorMess =
              "<p style='font-size: 0.5rem;'>**Password length must not exceed 15 characters</p>";
            input.classList.add("validate_error");
            input.style.backgroundColor = validate_error;
            console.log(input.nextSibling);
            input.nextElementSibling.innerHTML = errorMess;

            return false;
          } else {
            /* errorField. =""; */
            input.nextElementSibling.innerHTML = "";
            input.classList.remove("validate_error");
          }
      }
    });
  if (!document.querySelector(".validate_error", form)) {
    callback();
    return;
  }
  document.querySelector(".validate_error", form).focus();
}

function validatePassword() {
  let temp = document.querySelector("#error-message");

  let input = event.currentTarget;
  console.log(input.value);
  //check empty password field
  if (input.value == "") {
    let errorMess =
      "<p style='font-size: 0.5rem;color:red;'>**Fill the password please!</p>";
    /*  input.style = "border-color:red"; */
    input.classList.add("validate_error");
    console.log(input.nextSibling);
    input.nextElementSibling.innerHTML = errorMess;
    return false;
  }

  //minimum password length validation
  if (input.value.length < 3) {
    let errorMess =
      "<p style='font-size: 0.5rem;color:red;'>**Password length must be atleast 8 characters</p>";
    input.classList.add("validate_error");
    console.log(input.nextSibling);
    input.nextElementSibling.innerHTML = errorMess;

    return false;
  }

  //maximum length of password validation
  if (input.value.length > 15) {
    errorMess =
      "<p style='font-size: 0.5rem;color:red;'>**Password length must not exceed 15 characters</p>";
    input.classList.add("validate_error");
    console.log(input.nextSibling);
    input.nextElementSibling.innerHTML = errorMess;

    return false;
  } else {
    /* errorField. =""; */
    input.nextElementSibling.innerHTML = "";
    input.classList.remove("validate_error");
  }
}

function validateConfirmPassword() {}

function validateEmail() {
  input = event.currentTarget;

  async function compareEmail() {
    let errorMess =
      '<p style="color:red;font-size:0.5rem;">Email already exist</p>';
    let input = event.target;
    let conn = await fetch("api-get-emails?email=" + input.value);

    if (!conn.ok) {
      input.classList.add("validate_error");
      input.nextElementSibling.innerHTML = errorMess;
    } else {
      input.nextElementSibling.innerHTML = "";
      input.classList.remove("validate_error");
    }
  }

  //VALLIDATE ALL THE OTHER THINGS FOR EMAIL AND THEN COMPARE

  compareEmail();
}
