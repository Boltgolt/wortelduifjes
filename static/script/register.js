window.addEventListener("load", function() {
	var busy = false
	document.getElementById("registerButton").addEventListener("click", function() {
		var inputs = ["firstName", "lastName", "password", "email", "age", "lookingFor", "captcha"]
		var formData = new FormData()
		var xhttp = new XMLHttpRequest()

		if (busy) {
			return
		}


		document.getElementById("registerButton").innerHTML = "<i class='fa fa-circle-o-notch fa-spin'></i>"
		busy = true

		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var resp = JSON.parse(xhttp.responseText)

				if (resp.succes) {
					document.getElementById("registerButton").innerHTML = "<i class='fa fa-check'></i>"
					window.location.href = "/profile.php?id=" + resp.id
				}
				else {
					document.getElementById("registerButton").innerHTML = "Registreer"
					document.getElementById("captchaImg").src = "/securimage/securimage_show.php?noCache=" + new Date().getTime();
					alert(resp.error)
				}

				busy = false
			}
		}

		for (var i = 0; i < inputs.length; i++) {
			formData.append(inputs[i], document.getElementById(inputs[i]).value)
		}

		formData.append("description", document.getElementById("description").value)
		formData.append("photo", document.getElementById("photo").files[0])

		xhttp.open("POST", "actions/register.php", true)
		xhttp.send(formData)
	})

	document.getElementById("photo").addEventListener("change", function() {
		var input = document.getElementById("photo")

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (event) {
				document.getElementById("photoPre").src = event.target.result
				document.getElementById("photoContainer").className = "chosen"
			}

			reader.readAsDataURL(input.files[0]);
		}
	})
})
