let style = document.createElement("style");
style.innerHTML = ".d-none { display: none; }";
document.getElementsByTagName("head")[0].appendChild(style);

const select = document.querySelector("select[name='type_val']");

const inputAll = document.querySelectorAll("input");

select.addEventListener("change", function (e) {
  hideExtraInputs(e.target.value);
});

hideExtraInputs(select.value);

function hideExtraInputs(selectValue) {
  inputAll.forEach((input) => {
    input.parentElement.classList.add("d-none");
  });

  const inputAllBySelection = document.querySelectorAll(
    `input[name*='${selectValue}']`
  );

  inputAllBySelection.forEach((input) => {
    input.parentElement.classList.remove("d-none");
  });
}
