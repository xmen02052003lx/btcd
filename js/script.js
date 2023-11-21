// function getSuggestions() {
//   var keyword = document.getElementById("keyword").value

//   if (keyword.length === 0) {
//     document.getElementById("suggestions").innerHTML = ""
//     return
//   }

//   var xhr = new XMLHttpRequest()
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       document.getElementById("suggestions").innerHTML = xhr.responseText
//     }
//   }

//   xhr.open(
//     "GET",
//     "suggestions.php?keyword=" + encodeURIComponent(keyword),
//     true
//   )
//   xhr.send()
// }

// function searchPosts() {
//   var keyword = document.getElementById("keyword").value

//   var xhr = new XMLHttpRequest()
//   xhr.onreadystatechange = function () {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       document.getElementById("searchResults").innerHTML = xhr.responseText
//     }
//   }

//   xhr.open("POST", "search.php", true)
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
//   xhr.send("keyword=" + encodeURIComponent(keyword))
// }
function getSuggestions() {
  var keyword = document.getElementById("keyword").value

  if (keyword.length === 0) {
    document.getElementById("suggestions").innerHTML = ""
    return
  }

  var xhr = new XMLHttpRequest()
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("suggestions").innerHTML = xhr.responseText

      // Add event listener for suggestion item links
      var suggestionLinks = document.querySelectorAll(".suggestion-item a")
      suggestionLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
          event.preventDefault()
          document.getElementById("keyword").value = link.textContent
          document.getElementById("suggestions").innerHTML = "" // Clear suggestions
          searchPosts() // Trigger search
        })
      })
    }
  }

  xhr.open(
    "GET",
    "suggestions.php?keyword=" + encodeURIComponent(keyword),
    true
  )
  xhr.send()
}

function searchPosts() {
  var keyword = document.getElementById("keyword").value

  var xhr = new XMLHttpRequest()
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.getElementById("searchResults").innerHTML = xhr.responseText
    }
  }

  xhr.open("POST", "search.php", true)
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("keyword=" + encodeURIComponent(keyword))
}
