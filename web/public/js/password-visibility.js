function passwordVisibility(indeks) {
	const field = document.getElementById("password" + indeks);
	const showPass = document.getElementById("showPass" + indeks);
	const hidePass = document.getElementById("hidePass" + indeks);

	hidePass.classList.remove("d-none");

	if (field.type === "password") {
		field.type = "text";
		showPass.style.display = "none";
		hidePass.style.display = "block";
	} else {
		field.type = "password";
		showPass.style.display = "block";
		hidePass.style.display = "none";
	}
}