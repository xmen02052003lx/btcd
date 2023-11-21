<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #searchResults {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Simple Search</h1>
    
    <form id="searchForm">
        <label for="keyword">Keyword:</label>
        <input type="text" id="keyword" name="keyword">
        <button type="button" onclick="searchPosts()">Search</button>
    </form>

    <div id="searchResults"></div>

    <script src="js/script.js"></script>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google-Like Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #searchResults {
            margin-top: 20px;
        }
        h1 {
    text-align: center;
    color: #4285f4;
}

form {
    text-align: center;
    margin-top: 30px;
}

label {
    font-size: 18px;
    margin-right: 10px;
}

#keyword {
    font-size: 16px;
    padding: 8px;
}

.suggestions-container {
    position: absolute;
    margin: 0 auto;
    width: 25%;
    max-height: 150px;
    overflow-y: auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    z-index: 1;
    /* margin-bottom: 5rem; */
    left: 40%;
}

.suggestion {
    padding: 10px;
    cursor: pointer;
}

.suggestion:hover {
    background-color: #f4f4f4;
}

/* ... (previous styles) */

.suggestion-list {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.suggestion-item {
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #ddd;
    transition: background-color 0.3s;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover {
    background-color: #f4f4f4;
}

.no-results {
    padding: 10px;
    text-align: center;
    color: #888;
}
    </style>
</head>
<body>
    <h1>Google-Like Search</h1>
    
    <form id="searchForm position-relative">
        <label for="keyword">Search:</label>
        <input type="text" id="keyword" name="keyword" oninput="getSuggestions()">
        <button type="button" onclick="searchPosts()">Search</button>
       
        <div id="suggestions" class="suggestions-container position-absolute"></div>
    </form>

    <div id="searchResults"></div>

    <script src="js/script.js"></script>
</body>
</html>
