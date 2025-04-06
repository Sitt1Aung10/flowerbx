//for login page
const login_container = document.querySelector(".login-container");
// console.log(login_container)
const loginBtn = document.querySelector("#loginBtn")
loginBtn.addEventListener('click', function () {
    login_container.classList.toggle("toggleDisplayLoginPage");
    // Toggle the color of the button
    loginBtn.classList.toggle("active-btn");
});


// Select the dropdown table
const dropdownTable = document.querySelector('.dropdownTable');

// Add event listener to the dropdown table
dropdownTable.addEventListener('click', function (event) {
    // Check if the click is on the ::before pseudo-element
    const pseudoElementStyle = window.getComputedStyle(dropdownTable, '::before');
    if (pseudoElementStyle.content) {
        // Hide the dropdown table
        dropdownTable.style.display = 'none';
    }
});

//creating nav lists
const lists = [
    {
        id: 1,
        name: "flowers",
    },
    {
        id: 2,
        name: "espress",
    },
    {
        id: 3,
        name: "peonies",
    },
    {
        id: 4,
        name: "flowers",
    },
    {
        id: 5,
        name: "gift sets",
    },
    {
        id: 6,
        name: "occassions",
    },
    {
        id: 7,
        name: "vase and accessories",
    },
    {
        id: 8,
        name: "subscription",
    },
];
const nav = document.querySelector("nav");

let unorderList = document.createElement("ul");
for (var i = 0; i < lists.length; i++) {

    nav.classList.add("nav");

    const listItemContainer = document.createElement("li");
    listItemContainer.classList.add("listItemContainer")
    listItemContainer.innerText = lists[i].name;

    unorderList.append(listItemContainer);
    unorderList.classList.add("unorderList");

    nav.prepend(unorderList);

}
let listItemContainer = document.querySelector(".unorderList");
const firstChild = listItemContainer.firstElementChild;

//selecting first child of nav
firstChild.addEventListener('mouseover', function () {
    // Display the table you created earlier
    const table = document.querySelector('.dropdownTable');
    table.style.display = 'block';
});

const bar_icon = document.querySelector(".fa-bars");
bar_icon.onclick = () => {
    nav.classList.toggle("showAndHide");
    bar_icon.classList.toggle("fa-xmark");
}

// Activate search box on button click
const searchBoxButton = document.querySelector("#searchBoxButton");
const searchBox = document.querySelector("#searchBox");
const productlist = document.querySelector("#productList");
searchBoxButton.onclick = () => {
    searchBox.classList.add("activesearchBox");
    productlist.classList.toggle("increasezIndex")
};

// Function to fetch and display products
function fetchAndDisplayProducts(searchText = '') {
    fetch('fetch_products.php')
        .then(response => response.json())
        .then(products => {
            // Filter products based on the search input
            const filteredProducts = products.filter(product =>
                product.title.toLowerCase().includes(searchText.toLowerCase())
            );

            // Display the filtered products
            const productList = document.querySelector('#productList');
            productList.innerHTML = ''; // Clear previous results

            if (searchText.length === 0) {
                productList.style.display = 'none';
                return;
            }

            if (filteredProducts.length === 0) {
                productList.innerHTML = '<li>No matching products found</li>';
            } else {
                filteredProducts.slice(0, 4).forEach(product => {
                    const filteredProductLink = document.createElement('a');
                    filteredProductLink.href = product.link;

                    const filteredProductImg = document.createElement('img');
                    filteredProductImg.src = product.image;
                    filteredProductImg.classList.add('filteredProductImg');

                    filteredProductLink.appendChild(filteredProductImg);

                    const filteredProductName = document.createElement('p');
                    filteredProductName.textContent = product.title;

                    const filteredProductContainer = document.createElement('div');
                    filteredProductContainer.style.textAlign = 'center';
                    filteredProductContainer.appendChild(filteredProductLink);
                    filteredProductContainer.appendChild(filteredProductName);

                    productList.appendChild(filteredProductContainer);
                    productList.style.backgroundColor = '#fff';
                });

                if (filteredProducts.length > 4) {
                    const text = "Showing First 4 of matches Items";
                    const style = document.createElement('style');
                    style.innerHTML = `
                        #productList::before {
                            content: "${text}";
                        }
                    `;
                    productList.appendChild(style);
                }
            }
        })
        .catch(error => console.error('Error fetching products:', error));
}

// Add event listener for the search button click
document.querySelector('#searchButton').addEventListener('click', () => {
    const searchText = document.querySelector('#searchInput').value;
    fetchAndDisplayProducts(searchText);
});

// Add event listener for the search box keypress (Enter key)
document.querySelector('#searchBox').addEventListener('keypress', event => {
    if (event.key === 'Enter') {
        const searchText = document.querySelector('#searchInput').value;
        fetchAndDisplayProducts(searchText);
    }
});

// Remove search box when clicking outside
document.addEventListener('mouseup', event => {
    if (!searchBox.contains(event.target)) {
        searchBox.classList.remove('activesearchBox');
        document.querySelector('#productList').innerHTML = '';
    }
});

//looping through php table to shown products by js
// window.onload = function () {
//     const mainContainer = document.querySelector('.mainContainer'); // Ensure this is the correct parent element

//     // Fetch products and create elements dynamically
//     fetch('fetch_products.php')
//         .then(response => response.json())
//         .then(products => {
//             for (let i = 0; i < products.length; i++) {
//                 let currentProducts = products[i];

//                 const productItemContainer = document.createElement("div");
//                 productItemContainer.id = currentProducts.id;
//                 productItemContainer.classList.add("productItemContainer");

//                 const productName = document.createElement("div");
//                 productName.classList.add("productName");
//                 productName.append(currentProducts.title);

//                 const links = document.createElement("a");
//                 links.innerHTML = "Buy Flower";
//                 links.classList.add("linkForSliderSection");
//                 links.href = currentProducts.link;

//                 const addToCart = document.createElement("button");
//                 addToCart.innerHTML = "Add To Cart";
//                 addToCart.classList.add("addToCart");

//                 //for pop up card
//                 links.dataset.title = currentProducts.title;
//                 links.dataset.image = currentProducts.image;
//                 links.dataset.price = currentProducts.price;
//                 links.dataset.description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
//                 //

//                 const productImage = document.createElement("img");
//                 productImage.classList.add("productImage");
//                 productImage.src = currentProducts.image;

//                 productItemContainer.append(productName, productImage, links,addToCart);
//                 mainContainer.append(productItemContainer);

//                 console.log(productItemContainer);

//                 // Initialize slider after products are added
//                 initializeSlider();
//             }
//         })
//         .catch(error => console.error('Error fetching products:', error));

//     function initializeSlider() {
//         const productItemContainers = document.querySelectorAll(".productItemContainer");
//         console.log("Found", productItemContainers.length, "productItemContainer elements");

//         //slider btns
//         if (productItemContainers.length > 0) {
//             const leftBtn = document.getElementById("leftBtn");
//             const rightBtn = document.getElementById("rightBtn");
//             const slideWidth = productItemContainers[0].offsetWidth + 20;
//             let currentIndex = 0;
//             const slideCount = productItemContainers.length;

//             rightBtn.addEventListener("click", function () {
//                 // console.log("Right button clicked");
//                 if (window.innerWidth <= 992) {
//                     if (currentIndex < slideCount - 4) {
//                         currentIndex++;
//                     } else {
//                         currentIndex = 0;
//                     }
//                 } else {
//                     if (currentIndex < slideCount - 4) {
//                         currentIndex++;
//                     } else {
//                         currentIndex = 0;
//                     }
//                 }
//                 updateSlider();
//             });

//             leftBtn.addEventListener("click", function () {
//                 // console.log("Left button clicked");
//                 if (currentIndex > 0) {
//                     currentIndex--;
//                 } else {
//                     currentIndex = 0;
//                 }
//                 updateSlider();
//             });

//             function updateSlider() {
//                 const translateValue = -currentIndex * slideWidth;
//                 console.log("Updating slider, translate value:", translateValue);
//                 productItemContainers.forEach(item => {
//                     item.style.transform = `translateX(${translateValue}px)`;
//                 });
//             }
//         } else {
//             console.error("No elements found with the class 'productItemContainer'");
//         }
//     };

//     // Function to load cart from localStorage
//     function loadCart() {
//         const storedCart = localStorage.getItem('cart');
//         if (storedCart) {
//             cart = JSON.parse(storedCart);
//         }
//     }

//     // Function to save cart to localStorage
//     function saveCart() {
//         localStorage.setItem('cart', JSON.stringify(cart));
//     }

//     // Function to update the cart display
//     function updateCartDisplay() {
//         const cartContainer = document.querySelector('.cart-container');

//         // Clear previous content
//         cartContainer.innerHTML = '';

//         // Add cart items to the display
//         cart.forEach(product => {
//             const productElement = document.createElement('div');
//             productElement.textContent = `${product.title} - Quantity: ${product.quantity}`;
//             cartContainer.appendChild(productElement);
//         });

//         // Save the cart to localStorage after updating the display
//         saveCart();
//     }

//     // Function to add a product to the cart
//     function addToCart(product) {
//         cart.push(product);
//         updateCartDisplay(); // Update the cart display after adding
//     }

//     // Function to remove all products from the cart
//     function removeAllProducts() {
//         cart = []; // Clear the cart array
//         updateCartDisplay(); // Update the cart display after removing
//     }

//     // Load the cart when the page loads
//     loadCart();

//     // Popup functionality
//     const popupContainer = document.getElementById('popupContainer');
//     const popupProductName = document.getElementById('popupProductName');
//     const popupProductImage = document.getElementById('popupProductImage');
//     const popupProductLink = document.getElementById('popupProductLink');
//     const popupProductDescription = document.getElementById('popupProductDescription');
//     const closeBtn = document.querySelector('.close-btn');

//     // Quantity box
//     const decreaseButton = document.querySelector(".decreaseBtn");
//     const quantityDisplay = document.querySelector(".quantityDisplay");
//     const increaseButton = document.querySelector(".increaseBtn");

//     // Event listeners for quantity buttons
//     decreaseButton.addEventListener('click', function () {
//         if (quantityDisplay.value > 1) {
//             quantityDisplay.value = parseInt(quantityDisplay.value) - 1;
//         }
//     });

//     increaseButton.addEventListener('click', function () {
//         quantityDisplay.value = parseInt(quantityDisplay.value) + 1;
//     });
const mainContainer = document.querySelector(".mainContainer")
    mainContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('linkForSliderSection')) {
            event.preventDefault();
            const link = event.target;
            popupProductName.textContent = link.dataset.title;
            popupProductImage.src = link.dataset.image;
            popupProductLink.href = link.href;
            popupProductDescription.textContent = link.dataset.description;

            popupContainer.style.display = 'block';

            // Event listener for the Buy Flower button
            popupProductLink.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default link behavior

                // Add visual feedback for the click
                popupProductLink.style.backgroundColor = '#3B1500'; // Change background color to green
                popupProductLink.style.color = '#fff'; // Optionally, change text color to white

                setTimeout(() => {
                    popupProductLink.style.backgroundColor = ''; // Revert to original background color
                    popupProductLink.style.color = ''; // Revert to original text color
                }, 100); // The color will revert back after 100ms
                const popupNote = document.querySelector(".popupNote");
                popupNote.style.display = "block";

                // Add the product to the cart
                addToCart({
                    id: link.parentElement.id,
                    title: link.dataset.title,
                    image: link.dataset.image,
                    price: link.dataset.price,
                    quantity: quantityDisplay.value
                });
            });
        }
    });

    const closeBtn = document.querySelector(".close-btn")
    closeBtn.addEventListener('click', function () {
        popupContainer.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target === popupContainer) {
            popupContainer.style.display = 'none';
        }
    });

//     // Add click event listener to the cart container
//     const cartContainer = document.querySelector('.cart-container');
//     cartContainer.addEventListener('click', function (event) {
//         // Check if the click is within the bounds of the pseudo-element
//         const rect = cartContainer.getBoundingClientRect();
//         const isClickOnRemoveAll = event.clientY >= rect.bottom - 30; // Adjust based on your padding and height

//         if (isClickOnRemoveAll) {
//             removeAllProducts();
//         }
//     });






const cartContainer = document.querySelector('.cart-container');
const cart_container_before = window.getComputedStyle(cartContainer, '::before');

const cart_open_container = document.querySelector(".fa-bag-shopping");
cart_open_container.onclick = () => {
    cartContainer.classList.remove("closeTheCart");
    cartContainer.classList.add("active_cart_container");
}

cartContainer.addEventListener('click', function () {
    const cart_container_before = window.getComputedStyle(cartContainer, '::before');

    if (cart_container_before.content) {
        // Hide the dropdown table
        cartContainer.classList.remove("active_cart_container");
        cartContainer.classList.add("closeTheCart");
    }
});

// Add product to localStorage
function addToCart(product) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let existingProduct = cart.find(item => item.id === product.id);

    if (existingProduct) {
        existingProduct.quantity = parseInt(existingProduct.quantity) + parseInt(product.quantity);
    } else {
        cart.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    displayCartItems();
}

// Display cart items from localStorage
function displayCartItems() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cartContainer.innerHTML = '<h1>My Cart</h1><hr>';

    if (cart.length > 0) {
        cart.forEach(item => {
            let cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.title}" class="cart-item-image">
                <div class="cart-item-details">
                    <h3>${item.title}</h3>
                    <p>Price: $${item.price}</p>
                    <p>Quantity: ${item.quantity}</p>
                </div>
            `;
            cartContainer.appendChild(cartItem);
        });
    } else {
        cartContainer.innerHTML += '<p>No items in cart</p>';
    }
}

// Display cart items on page load
displayCartItems();

//decorative shop section
const productsForShop = [
    {
        id: 1,
        image: "img/Group_487.jpg",
        link: "https://www.flowerbx.com/flowers/peonies",
    },
    {
        id: 2,
        image: "img/Group_488.jpg",
        link: "https://www.flowerbx.com/flowers/peonies",
    },
    {
        id: 3,
        image: "img/Group_489.jpg",
        link: "https://www.flowerbx.com/flowers/peonies",
    }
]
for (var i = 0; i < productsForShop.length; i++) {
    let currentImg = productsForShop[i];
    let shop = document.querySelector(".shop");

    const linkForImg = document.createElement("a");
    linkForImg.href = currentImg.link;

    const imgContainer = document.createElement("img");
    imgContainer.classList.add("decorativeImg");

    imgContainer.id = currentImg.id;
    imgContainer.src = currentImg.image;
    imgContainer.append(currentImg.id, currentImg.image, currentImg.link);

    linkForImg.append(imgContainer)

    shop.classList.add("decorativeShop")
    shop.append(linkForImg);
}

//popular shortcut section
const popular_shortcut_section = document.querySelector(".popular_shortcut_section");
const popular_shortcut = [
    {
        title: "about us",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "how to start your gift subscription",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "wedding by flowerbx",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "editorial",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "our mission",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "contact us",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "faqs",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "delivery",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "terms & conditions",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "privacy & cookies",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "corporate & events",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "refer a friend",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
    {
        title: "carrers",
        href: "https://www.flowerbx.com/start-your-subscription",
    },
]
const unorderListForShortcut = document.createElement("ul");

unorderListForShortcut.classList.add("unorderListForShortcut")
for (let i = 0; i < popular_shortcut.length; i++) {
    const linkForShortcut = document.createElement("a");
    linkForShortcut.href = popular_shortcut[i].href;

    const listForShortcut = document.createElement("li");
    listForShortcut.innerHTML = popular_shortcut[i].title;
    listForShortcut.append(linkForShortcut);

    unorderListForShortcut.append(listForShortcut);

    popular_shortcut_section.append(unorderListForShortcut)
}