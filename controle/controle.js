const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");

modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal() {
  modalContainer.classList.toggle("active")
}
const modalContainer1 = document.querySelector(".modal-container1");
const modalTriggers1 = document.querySelectorAll(".modal-trigger1");

modalTriggers1.forEach(trigger => trigger.addEventListener("click", toggleModal1))

function toggleModal1() {
  modalContainer1.classList.toggle("active")
}