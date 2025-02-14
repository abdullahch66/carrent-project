document.getElementById('starRating').addEventListener('click', function(e) {
    if (e.target.classList.contains('star')) {
        const ratingValue = e.target.getAttribute('data-value');
        document.getElementById('ratingValue').value = ratingValue;

        // Highlight selected stars
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            star.style.color = index < ratingValue ? '#ffd700' : '#ccc';
        });
    }
});

document.getElementById('submitReview').addEventListener('click', function() {
    const reviewText = document.getElementById('reviewText').value;
    const ratingValue = document.getElementById('ratingValue').value;

    if (reviewText && ratingValue > 0) {
        const reviewList = document.getElementById('reviews');
        const newReview = document.createElement('li');
        newReview.innerHTML = `<strong>Rating: ${ratingValue} Stars</strong><p>${reviewText}</p>`;
        reviewList.appendChild(newReview);

        // Clear the form
        document.getElementById('reviewText').value = '';
        document.getElementById('ratingValue').value = '0';
        document.querySelectorAll('.star').forEach(star => star.style.color = '#ccc');
    } else {
        alert('Please enter a review and select a rating.');
    }
});
