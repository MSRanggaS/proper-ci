const steps = Array.from(document.querySelectorAll(".step"));
const bullet = Array.from(document.querySelectorAll(".bullet"));
const nextBtn = document.querySelectorAll(".next-btn");
const prevBtn = document.querySelectorAll(".previous-btn");

nextBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("next");
  });
});
prevBtn.forEach((button) => {
  button.addEventListener("click", () => {
    changeStep("prev");
  });
});

function changeStep(btn) {
  let index = 0;
  const active = document.querySelector(".active");
  const prog = document.querySelector(".prog");
  index = steps.indexOf(active);
  steps[index].classList.remove("active");
  if (btn === "next") {
    index++;
		bullet[index].classList.add("done");
  } else if (btn === "prev") {
    index--;
  }
  steps[index].classList.add("active");
}