<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main-container">
        <form class="wrapper main-form" action="HandleCart.php" method="post">
        <div class="products-container">
            <div class="product">
                <img src="assets/16gb_RAM.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>16GB RAM</h2>
                        <h2>PHP 2000</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"16GB RAM", "value":2000}' name="16gbram">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"16GB RAM", "value":2000}' name="16gbram">REMOVE</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <img src="assets/500gb_SSD.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>500GB SSD</h2>
                        <h2>PHP 2500</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"500GB SSD", "value":2500}' name="500gbssd">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"500GB SSD", "value":2500}' name="500gbssd">REMOVE</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <img src="assets/motherboard.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>EX-A320M MOBO</h2>
                        <h2>PHP 3000</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"EX-A320M MOBO", "value":3000}' name="mobo">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"EX-A320M MOBO", "value":3000}' name="mobo">REMOVE</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <img src="assets/mouse.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>Gaming Mouse</h2>
                        <h2>PHP 2750</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"Gaming Mouse", "value":2750}' name="mouse">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"Gaming Mouse", "value":2750}' name="mouse">REMOVE</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <img src="assets/pc_case.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>Computer Case</h2>
                        <h2>PHP 11500</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"Computer Case", "value":11500}' name="pccase">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"Computer Case", "value":11500}' name="pccase">REMOVE</div>
                    </div>
                </div>
            </div>
            <div class="product">
                <img src="assets/RTX_3080TI.png">
                <div class="product-desc">
                    <div class="descs">
                        <h2>RTX 3080TI</h2>
                        <h2>PHP 45550</h2>
                    </div>
                    <div class="buttons">
                        <div class="btn buy-btn" data-value='{"name":"RTX 3080TI", "value":45550}' name="rtx">ADD</div>
                        <div class="btn remove-btn" data-value='{"name":"RTX 3080TI", "value":45550}' name="rtx">REMOVE</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-btn-container">
            <div class="total">
                PHP&nbsp;<span id="total-num">0</span>
            </div>
            <input type="hidden" name="allProducts" id="allProducts" value=""/>
            <button class="checkout-btn" type="submit">
                Checkout
            </button>
        </div>
    </form>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
            let products = {
            "16gbram": [],
            "mouse": [],
            "rtx": [],
            "pccase": [],
            "500gbssd": [],
            "mobo": []
        };
        let totalCost = 0;
        const totalNumDisplay = document.querySelector("#total-num");
        const buyButtons = document.querySelectorAll(".buy-btn");
        buyButtons.forEach((element) => {
            
            element.addEventListener('click', () => {
                const productArray = products[element.getAttribute("name")];
                productArray.push((JSON.parse(element.getAttribute("data-value"))));
                totalCost += (JSON.parse(element.getAttribute("data-value")))['value'];
                totalNumDisplay.textContent = totalCost;
            })
        })

        const removeButtons = document.querySelectorAll(".remove-btn");
        removeButtons.forEach((element) => {
            
            element.addEventListener('click', () => {
                const productArray = products[element.getAttribute("name")];
                if (productArray.length > 0) {
                    productArray.pop()
                    totalCost -= (JSON.parse(element.getAttribute("data-value")))['value'];
                    totalNumDisplay.textContent = totalCost;
                }
            })
        })

        const mainForm = document.querySelector('.main-form');
        const hiddenForm = document.querySelector("#allProducts");
        mainForm.addEventListener("submit", (e) => {
            let productsArray = products;
            for (let key in productsArray) {
                if (productsArray.hasOwnProperty(key)) {
                    if (productsArray[key].length < 1) {
                        delete productsArray[key];
                    }
                }
            }
            hiddenForm.value = JSON.stringify(productsArray);

            // e.preventDefault();
            // location.href='HandleCart.php';
        })
    })
   
</script>

</html>