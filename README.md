### **Safe Sips 🍸**  
*Find bars and breweries with safety-oriented reviews – written by women, for women.*  
By: Lily Comeau(<a href= "https://github.com/lcomeau01">@lcomeau01</a>), Elizabeth Cucuzzella (<a href="https://github.com/ecucuzzella">@ecucuzzella</a>), and Rachel Dakermanji (<a href="https://github.com/rdakermanji">@rdakermanji</a>). 


### Overview
Safe Sips is a web application that helps users find bars and breweries based on keywords, city, postcode, or university location. It allows users to read and submit safety-focused reviews to create a safer nightlife experience. It is targeted towards young women in University, allowing them to find a safe bar within walking distance. 

Key Features:   <br>
- Search by **Keyword, University, or Location**  <br>
- Displays bars and breweries near you  <br>
- Provides **directions & reviews** for each bar   <br>
- Mobile-responsive up to **550px**, clean UI <br>
<br>


### Screenshots

<div style="display: flex; flex-wrap: wrap; gap: 10px; max-width: 900px;">
  <img src="https://github.com/user-attachments/assets/9bd0c6f3-6584-4d1a-a6db-89a6bfe36082" alt="image1" style="width: 48%; object-fit: contain;" />
  <img src="https://github.com/user-attachments/assets/d1e30627-8259-4309-a6cf-70419fb1502f" alt="image2" style="width: 48%; object-fit: contain;" /> 
  <img src="https://github.com/user-attachments/assets/0d3e3e7f-97d5-428d-8b2d-39bac03ceaaa" alt="image3" style="width: 48%; object-fit: contain;" />
  <img src="https://github.com/user-attachments/assets/b63e6966-9522-42de-8a82-91ab50a4d84d" alt="image4" style="width: 48%; object-fit: contain;" />
  <img src="https://github.com/user-attachments/assets/875631d3-d7cb-43cb-98c3-e0c6445c3f30" alt="image5" style="width: 48%; object-fit: contain;" />
  <img src="https://github.com/user-attachments/assets/c7acda50-e872-4809-b8d7-efd8eb6789fd" alt="image6" style="width: 48%; object-fit: contain;" />
  <img src="https://github.com/user-attachments/assets/1a3b2b42-5657-40ef-b1f1-84fb4324456b" alt="image7" style="width: 48%; object-fit: contain;" />
</div>



<br>

### Tech Stack
- **Frontend**: HTML, CSS, JavaScript  
- **APIs**: [OpenBreweryDB](https://www.openbrewerydb.org/), [Mapbox Geocoding API](https://docs.mapbox.com/api/search/geocoding/)  
- **Backend**: PHP (for handling user authentication, user databases, and reviews databases), SQL (Hosted Databases)

## File Overview

| File Name                 | Description |
|--------------------------|-------------|
| `brewery_search.html`    | The main interface for searching and viewing brewery/bar reviews. Includes dynamic elements and links to review forms. |
| `login.php`              | Login page with frontend form validation using JavaScript. Calls `loginformvalidation.php` to authenticate users. |
| `loginformvalidation.php`| Validates user credentials against the database and redirects based on success or failure. |
| `signup.php`             | User signup form with client-side JavaScript validation. Sends input to `formvalidation.php`. |
| `formvalidation.php`     | Handles signup logic, creates a new user in the `useraccounts` table, and a user-specific reviews table. |
| `leaveReview.php`        | Accepts and stores user reviews for a specific bar, creating entries in both bar-specific and user-specific tables. |
| `cache_header.php`       | PHP include used to disable browser caching for pages like login or signup. |


### Credits: 
- Icons by Font Awesome
