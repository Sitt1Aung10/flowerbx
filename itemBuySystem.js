// Select all buttons with the class 'linkForSliderSection'
const linkForSliderSections = document.querySelectorAll(".linkForSliderSection");
 // Create a popup container

     

linkForSliderSections.forEach(button => {
    button.addEventListener('click', function() {
        const popupContainer = document.querySelector('.popupContainer');
        // Find the nearest parent 'post' container
        const postContainer = this.closest('.post');
        
        // Grab the value of the <h6> tag inside this specific post
        const productName = document.querySelector(".productName");
        productName.innerHTML = postContainer.querySelector('h6').innerText;

        const productImage = document.querySelector("productImage");
        productImage.src = postContainer.querySelector('img').src;

        const productPrice = document.querySelector(".price");
        productPrice.innerHTML = postContainer.querySelector('p').innerText;

        const userAddress = document.createElement("input");
        userAddress.value = "Address";

        const userPhone = document.createElement("input");
        userPhone.value = 'phone';

        popupContainer.append(productImage,productPrice,userAddress,userPhone)
        popupContainer.style.display = "block";
    })
})