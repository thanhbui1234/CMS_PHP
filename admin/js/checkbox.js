// select all checkboxes

const selectAllBoxes = document.querySelector("#selectAllBoxes");

const selectAllBoxesChild = document.querySelectorAll(".selectAllBoxesChild");

selectAllBoxes.addEventListener("click", function () {
  if (this.checked) {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = true;
    });
  } else {
    selectAllBoxesChild.forEach((checkbox) => {
      checkbox.checked = false;
    });
  }
});
