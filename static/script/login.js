window.addEventListener("load", function() {
	var working = false
	document.getElementById("loginButton").disabled = false

	document.getElementById("loginButton").addEventListener("click", function() {
		if (working) {
			return
		}
		else {
			working = true
		}

		document.getElementById("loginButton").disabled = true
		document.getElementById("loginButton").innerHTML = "<i class='fa fa-circle-o-notch fa-spin'></i>"

		var formData = new FormData()
		var xhttp = new XMLHttpRequest()

		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				if (xhttp.responseText.substring(0, 2) == "ok") {
					document.getElementById("loginButton").innerHTML = "<i class='fa fa-check'></i>"
					window.location.href = "/profile.php?id=" + xhttp.responseText.split(":")[1]
				}
				else {
					document.getElementById("loginButton").disabled = false
					alert("Incorrecte email/wachtwoord combinatie")
					document.getElementById("loginButton").innerHTML = "Log in"
				}

				working = false
			}
		}

		formData.append("email", document.getElementById("email").value)
		formData.append("password", document.getElementById("password").value)

		xhttp.open("POST", "actions/login.php", true)
		xhttp.send(formData)
	})
})
