<?php

include('submit_review.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Review and Ratings</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #b69ef9;
      margin: 0;
      padding: 0;
    }
    header {
      background-color:  #af4c57;
      color: white;
      text-align: center;
      padding: 15px 0;
    }
    .container {
      width: 80%;
      margin: auto;
      overflow: hidden;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      background-color: white;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    table th, table td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }
    table th {
      background-color: #af4c57;
      color: white;
    }
    .form-container {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }
    .form-container label {
      display: block;
      margin-bottom: 8px;
    }
    .form-container input, .form-container select, .form-container textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-container button {
      background-color: #af4c57;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .form-container button:hover {
      background-color: #af4c57;
    }
    .error-message {
      color: red;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .success-message {
      color: green;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
  <script>
    function submitReview() {
      let name = document.getElementById('name').value.trim();
      let rating = document.getElementById('rating').value;
      let review = document.getElementById('review').value.trim();

      if (!name || !rating || !review) {
        document.getElementById('error-message').textContent = 'All fields are required.';
        return;
      } else {
        document.getElementById('error-message').textContent = '';
      }

      let xhttp = new XMLHttpRequest();
      xhttp.open('POST', 'submit_review.php', true);
      xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhttp.send(`name=${encodeURIComponent(name)}&rating=${encodeURIComponent(rating)}&review=${encodeURIComponent(review)}`);

      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          let response = JSON.parse(this.responseText);
          if (response.success) {
            document.getElementById('success-message').textContent = 'Review submitted successfully!';
            document.getElementById('review-form').reset(); 
            fetchReviews(); 
          } else {
            document.getElementById('error-message').textContent = response.error || 'An error occurred.';
          }
        }
      };
    }

    function fetchReviews() {
      let xhttp = new XMLHttpRequest();
      xhttp.open('GET', 'fetch_reviews.php', true);
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('reviews-container').innerHTML = this.responseText;
        }
      };
      xhttp.send();
    }

    document.addEventListener('DOMContentLoaded', function () {
      fetchReviews(); 
    });
  </script>
</head>
<body>
  <header>
    <h1>Event Review and Ratings</h1>
    <p>We value your feedback! Please leave a review and rate the event below.</p>
  </header>

  <div class="container">
    <div class="form-container">
      <h2>Submit Your Review</h2>
      <div id="error-message" class="error-message"></div>
      <div id="success-message" class="success-message"></div>
      <form id="review-form" onsubmit="event.preventDefault(); submitReview();">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name">

        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
          <option value="">Select a rating</option>
          <option value="1">1 - Poor</option>
          <option value="2">2 - Fair</option>
          <option value="3">3 - Good</option>
          <option value="4">4 - Very Good</option>
          <option value="5">5 - Excellent</option>
        </select>

        <label for="review">Your Review:</label>
        <textarea id="review" name="review" rows="4" placeholder="Write your review here"></textarea>

        <button type="submit">Submit Review</button>
      </form>
    </div>

    
    <h2>Reviews List</h2>
    <div id="reviews-container">
      
    </div>
  </div>
</body>
</html>
