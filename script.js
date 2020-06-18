let rate = document.querySelector("#rate");
let product = document.querySelector('#package');
const form = document.querySelector('form');
let productError = document.querySelector('#product-error');
let capitalError = document.querySelector('#capital-error');
let monthError = document.querySelector('#month-error');
const calculateButton = document.querySelector('#calculate-btn');

let validateUserInput = () => {
  let month= document.querySelector('#month').value
  let userCapital = document.querySelector('#capital').value;
  let selectedProduct = document.querySelector('#package').value;
  let formValid = form.checkValidity();
  if (formValid) {
    form.submit();
  }
  else {
    console.log('please enter necessary field');
    console.log(product.value);
    if (userCapital.length === 0) {
      capitalError.textContent = 'Please Enter a Valid Capital'
    }
    if (selectedProduct === 'Select Package') {
      productError.textContent = 'Please Select from the Available Product';
    }
    if(month.length===0){
      monthError.textContent='Please enter a valid month'
    }
  }
  console.log(formValid);
}

calculateButton.addEventListener('click', () => {
  validateUserInput();
})