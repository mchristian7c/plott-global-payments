document.addEventListener("DOMContentLoaded", (event) => {
  document
    .querySelector('input[name="billing_copy"]')
    .addEventListener("change", (event) => {
      document.querySelector(".billing-details").classList.toggle("hidden");

      let optionallyRequired = document.querySelectorAll(".optionallyRequired");
      optionallyRequired.forEach((elem) => {
        elem.required = !document
          .querySelector(".billing-details")
          .classList.contains("hidden");
      });
    });
});
