const ctx = document.getElementById('line').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Profit of Sales',
            data: [120, 190, 10, 505, 200, 199, 101],
            backgroundColor: [
                'rgb(69, 154, 125)'
            ],
            borderColor: [
               ' rgb(69, 154, 125)'
            ],
            borderWidth: 2
        }]
    },
    options: {
      responsive: true
    }

    
});


const data = {
    labels: ['Vegetables', 'Fruits', 'Meat', 'Dairy', 'Free Space'],
    datasets: [{
        data: [30, 20, 25, 15, 10], // These are the percentages for each category and free space.
        backgroundColor: ['#4CAF50', '#FF9800', '#FF5722', '#00BCD4', '#E0E0E0'], // Colors for each segment
        borderColor: ['#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'], // Border color for each segment
        borderWidth: 2
    }]
};

const options = {
    responsive: true,
    plugins: {
        legend: {
            position: 'top',
        },
        tooltip: {
            callbacks: {
                label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                }
            }
        }
    },
    cutout: '70%', // Creates the doughnut shape by cutting out the center
};

const myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});


/* form for add product*/
document.getElementById('addProductForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get form values
    const productName = document.getElementById('productName').value;
    const productCategory = document.getElementById('productCategory').value;
    const productQty = document.getElementById('productQty').value;
    const productImage = document.getElementById('productImage').files[0];

    if (!productName || !productCategory || !productQty || !productImage) {
        alert("Please fill in all fields.");
        return;
    }

    // Create a product item
    const productItem = document.createElement('li');
    const productImageUrl = URL.createObjectURL(productImage);

    productItem.innerHTML = `
        <strong>${productName}</strong> - ${productCategory}<br>
        Quantity: ${productQty}<br>
        <img src="${productImageUrl}" alt="${productName}" style="width: 100px; height: auto; margin-top: 10px;">
    `;

    // Add the product to the list
    document.getElementById('productItems').appendChild(productItem);

    // Clear form fields
    document.getElementById('addProductForm').reset();
});


