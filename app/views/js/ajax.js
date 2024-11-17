/* Send forms via AJAX */
const forms_ajax = document.querySelectorAll(".FormAjax");

forms_ajax.forEach((forms) => {
  forms.addEventListener("submit", function (e) {
    e.preventDefault();

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
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let headers = new Headers();

        let config = {
          method: method,
          headers: headers,
          mode: "cors",
          cache: "no-cache",
          body: data,
        };

        fetch(action, config)
          .then((response) => response.json())
          .then((response) => {
            return alertas_ajax(response);
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
