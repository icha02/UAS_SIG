fetch('/json/bali.json')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log(data);

        const outputElement = document.getElementById('output');
        if (outputElement) {
            outputElement.innerHTML = JSON.stringify(data, null, 2);
        }
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
