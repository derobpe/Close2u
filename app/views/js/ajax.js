/*
 * Send forms via AJAX
 * This script handles the submission of forms with the class "FormAjax" via an asynchronous (AJAX) request.
 * It includes confirmation prompts, error handling, and dynamic responses using SweetAlert2.
 */

// Select all forms with the class "FormAjax"
const forms_ajax = document.querySelectorAll(".FormAjax");

// Add event listener for each form
forms_ajax.forEach((forms) => {
  forms.addEventListener("submit", function (e) {
    e.preventDefault();

    // SweetAlert2 confirmation dialog
    Swal.fire({
      title: "Are you sure?",
      text: "Do you want to do this?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, do it",
      cancelButtonText: "No, cancell it",
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirms, proceed with the AJAX request

        // Prepare form data for request
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let headers = new Headers();

        // Validate that the action URL is defined
        if (!action) {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Form action is not defined.",
          });
          return;
        }

        // Configure the AJAX request
        const config = {
          method: method.toUpperCase(),
          headers: headers,
          mode: "cors",
          cache: "no-cache",
          body: data,
        };

        // Execute the AJAX request using the Fetch API
        fetch(action, config)
          .then((response) => {
            if(!response.ok){
              throw new Error("HTTP error! Status: ${response.status}");
            }
            return response.json();
          })
          .then((response) => {
            alerts_ajax(response); // Pass the response to alert handler
          })
          .catch((error)=>{
            console.error("Fetch error: ", error);
            Swal.fire({
              icon: "error",
              title: "Request Failed",
              text: "An unexpected error occurred. Please try again later.",
            });
          });
      }
    });
  });

  function alerts_ajax(alert) {
    if (alert.type == "simple") {
      Swal.fire({
        icon: alert.icon,
        title: alert.title,
        text: alert.text,
        confirmButtonText: "Ok",
      });
    } else if (alert.type == "reload") {
      Swal.fire({
        icon: alert.icon,
        title: alert.title,
        text: alert.text,
        confirmButtonText: "Ok",
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
    } else if (alert.type == "clean") {
      Swal.fire({
        icon: alert.icon,
        title: alert.title,
        text: alert.text,
        confirmButtonText: "Ok",
      }).then((result) => {
        if (result.isConfirmed) {
          document.querySelector(".FormAjax").reset();
        }
      });
    } else if (alert.type == "redirect") {
      window.location.href = alert.url;
    }
  }
});
