function edit(changeField) {
	var value = prompt("Waar wil je het naar veranderen?")

	if (!value) {
		return
	}

	var formData = new FormData()
	var xhttp = new XMLHttpRequest()

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			if (xhttp.responseText == "OK") {
				window.location.reload()
			}
			else {
				alert("Er ging iets mis...")
			}
		}
	}

	formData.append("changeField", changeField)
	formData.append("value", value)

	xhttp.open("POST", "actions/change.php", true)
	xhttp.send(formData)
}
