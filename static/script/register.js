window.addEventListener("load", function() {
	document.getElementById("registerButton").addEventListener("click", function() {
		var inputs = ["firstName", "lastName", "password", "email", "age", "lookingFor"]
		var formData = new FormData()
		var xhttp = new XMLHttpRequest()

		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
				var resp = JSON.parse(xhttp.responseText)

				if (resp.succes) {
					window.location.href = "/profile.php?id=" + resp.id
				}
				else {
					alert(resp.error)
				}
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
			}

			reader.readAsDataURL(input.files[0]);
		}
	})
})
