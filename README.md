# Annadaya: Food Waste Management System


<p>Annadaya, meaning "Gift of Food," is a platform designed to collect excess/leftover food from donors such as hotels, restaurants, and marriage halls, and redistribute it to those in need. This system directly addresses the challenges of hunger and food wastage while promoting sustainability.</p>

## Tools and Technologies
<ul>
  <li>Frontend: HTML, CSS, JavaScript</li>
  <li>Backend: PHP</li>
  <li>Web Server: XAMPP Server</li>
  <li>Database: MySQL</li>
</ul>

## System Modules
<h2>The system consists of three core modules:</h2>
<ul>
  <li>User</li>
  <li>Admin</li>
  <li>Delivery</li>
</ul>

### 1. User Module
<p>
The User module is designed for individuals or organizations who wish to donate excess food to help reduce wastage. This module allows:
</p>
<ul>
  <li>Registration and Login: Secure access for donors.</li>
  <li>Donation Management: Donors can specify the type and quantity of food to donate.</li>
  <li>Geolocation Matching: Matches donations with the nearest needy people or organizations.</li>
  <li>Donation Tracking: View donation history and status.</li>
</ul>

### 2. Admin Module
<p>
The Administrator module is designed for system administrators (NGOs, trusts, or charities) to manage food donations and distributions. It includes:
</p>
<ul>
  <li>Donation Listing: Receives donation details from the User module.</li>
  <li>Request Management: NGOs and charities can request food donations.</li>
  <li>Tracking: Tracks which organizations have received which donations.</li>
</ul>

### 3. Delivery Module
<p>
The Delivery Person module facilitates the pickup and drop-off of food donations. Features include:
</p>
<ul>
  <li>Registration and Login: Secure access for delivery personnel.</li>
  <li>Pickup and Delivery Coordination: Displays pickup and drop-off locations.</li>
  <li>Status Updates: Real-time updates on delivery progress.</li>
</ul>

## Features
<ul>
  <li>Mobile-Friendly Design: A responsive layout for seamless access across devices.</li>
  <li>Chatbot Support: An integrated chatbot to assist users with queries.</li>
  <li>Secure Login: Implements robust authentication for all users.</li>
</ul>



## How to Run
<ol>
  <li>Download the project ZIP file.</li>
  <li>Extract the file and copy the folder.</li>
  <li>Paste the folder inside the root directory:
    <ul>
      <li>XAMPP: `xampp/htdocs`</li>
      <li>WAMP: `wamp/www`</li>
      <li>LAMP: `/var/www/html`</li>
    </ul>
  </li>
  <li>Open PHPMyAdmin (`http://localhost/phpmyadmin`).</li>
  <li>Create a new database.</li>
  <li>Import the `demo.sql` file located in the `database` folder.</li>
  <li>Run the script: `http://localhost/folderName`.</li>
</ol>


